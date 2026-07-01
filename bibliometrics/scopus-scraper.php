<?php
/*
 * =============================================================
 * Scopus metrics scraper
 * =============================================================
 *
 * Created in "vibe coding" with ChatGPT.
 *
 * Simple scraper for a public Scopus author profile.
 * It tries to extract:
 * - number of articles/documents
 * - total citations
 * - h-index
 *
 * Warning:
 * Scopus pages are often dynamically rendered, may require cookies,
 * and may change their HTML structure without notice. Scraping may
 * therefore fail. Manual fallback values are kept for this reason.
 *
 * Intended use in the main page:
 *
 *   require_once __DIR__ . "/scopus_scraper.php";
 *   $bibliometric_data["scopus"] = get_scopus_metrics();
 *
 * =============================================================
 */


function get_scopus_metrics() {
  $url = "https://www.scopus.com/authid/detail.uri?authorId=57218509273";

  // Fallback values used when scraping fails.
  $data = [
    "label"     => "Scopus",
    "articles"  => 7,
    "citations" => 1,
    "hindex"    => 1,
    "url"       => $url,
  ];

  // Cache avoids querying Scopus at every page load.
  $cache_file = __DIR__ . "/cache/scopus_author.html";
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

  /*
   * Scopus pages may expose data in different ways:
   * - visible text labels;
   * - embedded JSON;
   * - dynamically loaded blocks.
   *
   * These regexes are intentionally broad and conservative.
   */

  // Try to extract number of documents/articles.
  if (preg_match('/Documents[^0-9]*([0-9,]+)/i', $html, $m) ||
      preg_match('/document-count[^0-9]*([0-9,]+)/i', $html, $m) ||
      preg_match('/"documentCount"\s*:\s*([0-9]+)/i', $html, $m)) {
    $data["articles"] = (int) str_replace(",", "", $m[1]);
  }

  // Try to extract citation count.
  if (preg_match('/Citations[^0-9]*([0-9,]+)/i', $html, $m) ||
      preg_match('/citation-count[^0-9]*([0-9,]+)/i', $html, $m) ||
      preg_match('/"citationCount"\s*:\s*([0-9]+)/i', $html, $m)) {
    $data["citations"] = (int) str_replace(",", "", $m[1]);
  }

  // Try to extract h-index.
  if (preg_match('/h-index[^0-9]*([0-9,]+)/i', $html, $m) ||
      preg_match('/"hIndex"\s*:\s*([0-9]+)/i', $html, $m)) {
    $data["hindex"] = (int) str_replace(",", "", $m[1]);
  }

  return $data;
}


// Minimal test rendering when this file is opened directly.
if (basename(__FILE__) === basename($_SERVER["SCRIPT_FILENAME"])) {
  $m = get_scopus_metrics();

  echo "<pre>";
  echo "Source: " . htmlspecialchars($m["label"]) . "\n";
  echo "Articles: " . htmlspecialchars($m["articles"]) . "\n";
  echo "Citations: " . htmlspecialchars($m["citations"]) . "\n";
  echo "h-index: " . htmlspecialchars($m["hindex"]) . "\n";
  echo "URL: " . htmlspecialchars($m["url"]) . "\n";
  echo "</pre>";
}
?>