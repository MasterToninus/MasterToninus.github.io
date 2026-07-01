<?php
/*
 * =============================================================
 * Google Scholar metrics scraper
 * =============================================================
 *
 * Created in "vibe coding" with ChatGPT.
 *
 * Simple scraper for a public Google Scholar profile.
 * It tries to extract:
 * - number of visible articles
 * - total citations
 * - h-index
 *
 * Warning:
 * Google Scholar has no official public API. Scraping may fail if
 * the HTML changes, if requests are blocked, or if the profile uses
 * pagination/lazy loading. Manual fallback values are therefore kept.
 *
 * Intended use in the main page:
 *
 *   require_once __DIR__ . "/google_scholar_scraper.php";
 *   $bibliometric_data["gscholar"] = get_google_scholar_metrics();
 *
 * =============================================================
 */


function get_google_scholar_metrics() {
  $url = "https://scholar.google.com/citations?user=DWKPuJYAAAAJ&hl=en";

  // Fallback values used when scraping fails.
  $data = [
    "label"     => "GScholar",
    "articles"  => 7,
    "citations" => 41,
    "hindex"    => 4,
    "url"       => $url,
  ];

  // Cache avoids querying Google Scholar at every page load.
  $cache_file = __DIR__ . "/cache/google_scholar.html";
  $cache_ttl  = 60 * 60 * 24; // 24 hours

  if (!is_dir(dirname($cache_file))) {
    mkdir(dirname($cache_file), 0755, true);
  }

  if (file_exists($cache_file) && time() - filemtime($cache_file) < $cache_ttl) {
    $html = file_get_contents($cache_file);
  } else {
    $context = stream_context_create([
      "http" => [
        "timeout" => 10,
        "header"  =>
          "User-Agent: Mozilla/5.0\r\n" .
          "Accept-Language: en-US,en;q=0.9\r\n",
      ],
    ]);

    $html = @file_get_contents($url, false, $context);

    if ($html !== false && strlen($html) > 1000) {
      file_put_contents($cache_file, $html);
    }
  }

  if (empty($html)) {
    return $data;
  }

  // Extract citations and h-index from the Google Scholar stats table.
  if (preg_match_all('/<td[^>]*class="gsc_rsb_std"[^>]*>\s*([0-9,]+)\s*<\/td>/i', $html, $matches)) {
    $data["citations"] = isset($matches[1][0])
      ? (int) str_replace(",", "", $matches[1][0])
      : $data["citations"];

    $data["hindex"] = isset($matches[1][2])
      ? (int) str_replace(",", "", $matches[1][2])
      : $data["hindex"];
  }

  // Count visible article rows.
  if (preg_match_all('/<tr[^>]*class="gsc_a_tr"[^>]*>/i', $html, $rows)) {
    $data["articles"] = count($rows[0]);
  }

  return $data;
}


// Minimal test rendering when this file is opened directly.
if (basename(__FILE__) === basename($_SERVER["SCRIPT_FILENAME"])) {
  $m = get_google_scholar_metrics();

  echo "<pre>";
  echo "Source: " . htmlspecialchars($m["label"]) . "\n";
  echo "Articles: " . htmlspecialchars($m["articles"]) . "\n";
  echo "Citations: " . htmlspecialchars($m["citations"]) . "\n";
  echo "h-index: " . htmlspecialchars($m["hindex"]) . "\n";
  echo "URL: " . htmlspecialchars($m["url"]) . "\n";
  echo "</pre>";
}
?>