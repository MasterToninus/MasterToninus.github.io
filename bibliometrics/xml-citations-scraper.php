<?php
/*
 * =============================================================
 * XML citations scraper
 * =============================================================
 *
 * Created in "vibe coding" with ChatGPT.
 *
 * This file reads a local citations.xml file and extracts
 * self-assessed bibliometric data:
 *
 * - number of countable articles
 * - number of self-counted citations
 * - self-counted h-index
 *
 * Warning:
 * The XML file is assumed to be manually curated. The computed
 * values are therefore only as reliable as the local XML data.
 *
 * Intended use in the main page:
 *
 *   require_once __DIR__ . "/xml-citations-scraper.php";
 *   $bibliometric_data["self"] = get_xml_citations_metrics();
 *
 * =============================================================
 */


function xcs_text($node, $field, $default = "") {
  return isset($node->{$field})
    ? trim((string) $node->{$field})
    : $default;
}


function xcs_has_valid_doi($article) {
  $doi = xcs_text($article, "doi");

  return (
    $doi !== "" &&
    strtolower($doi) !== "null" &&
    preg_match("/^10\.\S+$/", $doi)
  );
}


function xcs_has_citations($article) {
  return (
    isset($article->citations) &&
    isset($article->citations->citation) &&
    count($article->citations->citation) > 0
  );
}


function xcs_citation_count($article) {
  return xcs_has_citations($article)
    ? count($article->citations->citation)
    : 0;
}


function xcs_hindex($citation_counts) {
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


function get_xml_citations_metrics() {
  $xml_path = __DIR__ . "/../data/citations.xml";

  // Fallback values used if the XML file is missing or invalid.
  $data = [
    "label"     => "Self-assessed",
    "articles"  => 7,
    "citations" => 10,
    "hindex"    => 2,
    "url"       => "#self-counted-citations",
  ];

  if (!file_exists($xml_path)) {
    return $data;
  }

  libxml_use_internal_errors(true);
  $xml = simplexml_load_file($xml_path);

  if ($xml === false) {
    libxml_clear_errors();
    return $data;
  }

  // Accept both <root><articles><article>...</article></articles></root>
  // and <articles><article>...</article></articles> structures.
  if (isset($xml->articles->article)) {
    $articles = $xml->articles->article;
  } elseif (isset($xml->article)) {
    $articles = $xml->article;
  } else {
    return $data;
  }

  $article_count = 0;
  $citation_count = 0;
  $citation_counts = [];

  foreach ($articles as $article) {
    // Only entries with a valid DOI are counted as articles.
    if (!xcs_has_valid_doi($article)) {
      continue;
    }

    $article_count++;

    $article_citations = xcs_citation_count($article);
    $citation_count += $article_citations;
    $citation_counts[] = $article_citations;
  }

  $data["articles"]  = $article_count;
  $data["citations"] = $citation_count;
  $data["hindex"]    = xcs_hindex($citation_counts);

  return $data;
}


// Minimal test rendering when this file is opened directly.
if (basename(__FILE__) === basename($_SERVER["SCRIPT_FILENAME"])) {
  $m = get_xml_citations_metrics();

  echo "<pre>";
  echo "Source: " . htmlspecialchars($m["label"], ENT_QUOTES, "UTF-8") . "\n";
  echo "Articles: " . htmlspecialchars($m["articles"], ENT_QUOTES, "UTF-8") . "\n";
  echo "Citations: " . htmlspecialchars($m["citations"], ENT_QUOTES, "UTF-8") . "\n";
  echo "h-index: " . htmlspecialchars($m["hindex"], ENT_QUOTES, "UTF-8") . "\n";
  echo "URL: " . htmlspecialchars($m["url"], ENT_QUOTES, "UTF-8") . "\n";
  echo "</pre>";
}
?>
