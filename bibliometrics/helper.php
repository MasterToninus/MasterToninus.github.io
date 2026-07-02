<?php
/* ======================================================
 * Bibliometrics helper functions
 * ======================================================
 * This file contains the reusable PHP logic for the bibliometrics page:
 * loading JSON data files, validating their basic structure, preparing the
 * arrays used by index.php, and computing the self-assessed indicators.
 */

/* ---------- HTML helpers ---------- */

/*
 * Escape arbitrary text before printing it in HTML.
 */
function html($string) {
  return htmlspecialchars((string) $string, ENT_QUOTES, "UTF-8");
}

/*
 * Convert a DOI string into a clickable DOI URL.
 * Non-DOI notes such as "accepted" are deliberately left unlinked.
 */
function doi_url($doi) {
  $doi = trim((string) $doi);

  if ($doi === "" || strtolower($doi) === "null") {
    return "";
  }

  if (preg_match("/^10\.\S+$/", $doi)) {
    return "https://doi.org/" . $doi;
  }

  return "";
}

/*
 * Print a bibliometric table value. Missing values are displayed as n/a.
 */
function print_bibliometric_value($value) {
  if ($value === null || $value === "") {
    echo "n/a";
    return;
  }

  echo html($value);
}

/*
 * Print a DOI field, either as a DOI link or as plain text.
 */
function print_doi($doi) {
  $doi = trim((string) $doi);
  $url = doi_url($doi);

  if ($doi === "" || strtolower($doi) === "null") {
    echo "No DOI";
    return;
  }

  if ($url !== "") {
    echo '<a href="' . html($url) . '" target="_blank" rel="noopener">' . html($doi) . '</a>';
    return;
  }

  echo html($doi);
}

/*
 * Safely extract a textual field from an associative array.
 */
function data_text($item, $field, $default = "") {
  if (is_array($item) && array_key_exists($field, $item) && $item[$field] !== null) {
    return trim((string) $item[$field]);
  }

  return $default;
}


/* ---------- JSON loading helpers ---------- */

/*
 * Load one JSON file and return its content as a PHP array.
 * Errors are collected in $data_errors so that index.php can still render
 * a readable diagnostic instead of failing silently.
 */
function load_json_file($path, $label, &$data_errors) {
  if (!file_exists($path)) {
    $data_errors[] = $label . " file not found.";
    return [];
  }

  $json_content = file_get_contents($path);

  if ($json_content === false) {
    $data_errors[] = "Unable to read " . $label . " file.";
    return [];
  }

  $loaded_data = json_decode($json_content, true);

  if (json_last_error() !== JSON_ERROR_NONE) {
    $data_errors[] = "Invalid " . $label . " JSON: " . json_last_error_msg() . ".";
    return [];
  }

  if (!is_array($loaded_data)) {
    $data_errors[] = "Invalid " . $label . " data file.";
    return [];
  }

  return $loaded_data;
}

/*
 * Load and validate the local citation database.
 * The returned array contains only the list of cited articles.
 */
function load_citation_data($path, &$data_errors) {
  $loaded_citation_data = load_json_file($path, "Citation data", $data_errors);

  if (
    isset($loaded_citation_data["articles"]) &&
    is_array($loaded_citation_data["articles"])
  ) {
    return $loaded_citation_data["articles"];
  }

  if (file_exists($path)) {
    $data_errors[] = "Invalid self-assessed citation data structure.";
  }

  return [];
}

/*
 * Load and validate the external bibliometric indicators.
 */
function load_external_bibliometric_data($path, &$data_errors) {
  return load_json_file($path, "Bibliometric data", $data_errors);
}


/* ---------- Self-assessed index helpers ---------- */

/*
 * Check whether an article has at least one nested citing paper.
 */
function article_has_citations($article) {
  return (
    is_array($article) &&
    isset($article["citations"]) &&
    is_array($article["citations"]) &&
    count($article["citations"]) > 0
  );
}

/*
 * Decide whether a DOI looks like a genuine publisher DOI.
 * arXiv and ResearchGate DOI namespaces are excluded from the count.
 */
function valid_doi($doi) {
  $doi = trim((string) $doi);

  if ($doi === "") {
    return false;
  }

  $doi = preg_replace("#^https?://(?:dx\.)?doi\.org/#i", "", $doi);
  $doi = trim($doi);

  if (preg_match("/^10\.\S+$/", $doi) !== 1) {
    return false;
  }

  if (preg_match("#^10\.13140/RG#i", $doi) === 1) {
    return false;
  }

  if (preg_match("#^10\.48550/arxiv#i", $doi) === 1) {
    return false;
  }

  return true;
}

/*
 * Current convention: an article contributes to the self-assessed indicators
 * only if it has a valid publisher DOI.
 */
function article_is_countable($article) {
  return valid_doi(data_text($article, "doi"));
}

function count_articles($articles) {
  $count = 0;

  foreach ($articles as $article) {
    if (article_is_countable($article)) {
      $count++;
    }
  }

  return $count;
}

function count_citations($articles) {
  $count = 0;

  foreach ($articles as $article) {
    if (article_is_countable($article) && article_has_citations($article)) {
      $count += count($article["citations"]);
    }
  }

  return $count;
}

/*
 * Compute the h-index from the self-recorded citation counts.
 */
function calculate_hindex($articles) {
  $citation_counts = [];

  foreach ($articles as $article) {
    if (article_is_countable($article)) {
      $citation_counts[] = article_has_citations($article)
        ? count($article["citations"])
        : 0;
    }
  }

  rsort($citation_counts, SORT_NUMERIC);

  $hindex = 0;

  foreach ($citation_counts as $position => $citation_count) {
    $rank = $position + 1;

    if ($citation_count >= $rank) {
      $hindex = $rank;
    } else {
      break;
    }
  }

  return $hindex;
}

/*
 * Keep only the articles that have recorded citations, then sort them from
 * the most cited to the least cited. They are used only for the visible list.
 */
function get_articles_with_citations($articles) {
  $articles_with_citations = [];

  foreach ($articles as $article) {
    if (article_has_citations($article)) {
      $articles_with_citations[] = $article;
    }
  }

  usort($articles_with_citations, function ($left, $right) {
    return count($right["citations"]) <=> count($left["citations"]);
  });

  return $articles_with_citations;
}

/*
 * Build the full bibliometric table data by adding the computed
 * self-assessed column to the manually curated external indicators.
 */
function build_bibliometric_data($articles, $external_bibliometric_data) {
  $self_assessed_articles  = count_articles($articles);
  $self_assessed_citations = count_citations($articles);
  $self_assessed_hindex    = calculate_hindex($articles);

  return array_merge(
    [
      "self-assessed" => [
        "label"     => "Self-assessed",
        "articles"  => $self_assessed_articles,
        "citations" => $self_assessed_citations,
        "hindex"    => $self_assessed_hindex,
        "url"       => "#self-counted-citations",
        "icon"      => "ai ai-open-data ai-fw",
      ],
    ],
    $external_bibliometric_data
  );
}

/*
 * Return the most recent modification time among existing files.
 */
function latest_filemtime($files) {
  $times = [];

  foreach ($files as $file) {
    if (!empty($file) && file_exists($file)) {
      array_push($times, filemtime($file));
    }
  }

  if (count($times) === 0) {
    return null;
  }

  return max($times);
}

/*
 * Prepare all variables needed by index.php.
 * The page template receives ready-to-use arrays and timestamps.
 */
function prepare_bibliometrics_page_data($citation_config_path, $bibliometric_config_path, $template_path = null, $helper_path = null) {
  $data_errors = [];

  $articles = load_citation_data($citation_config_path, $data_errors);
  $external_bibliometric_data = load_external_bibliometric_data($bibliometric_config_path, $data_errors);

  $articles_with_citations = get_articles_with_citations($articles);
  $bibliometric_data = build_bibliometric_data($articles, $external_bibliometric_data);

  $footer_files = array_filter([
    $citation_config_path,
    $bibliometric_config_path,
    $template_path,
    $helper_path,
  ]);

  return [
    "articles"                 => $articles,
    "articles_with_citations"  => $articles_with_citations,
    "bibliometric_data"        => $bibliometric_data,
    "data_error"               => implode(" ", $data_errors),
    "last_citation_update"     => file_exists($citation_config_path) ? filemtime($citation_config_path) : null,
    "last_data_update"         => file_exists($bibliometric_config_path) ? filemtime($bibliometric_config_path) : null,
    "footer_last_update"       => latest_filemtime($footer_files),
  ];
}
