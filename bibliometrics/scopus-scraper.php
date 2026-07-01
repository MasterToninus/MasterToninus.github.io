<?php
/*
 * =============================================================
 * Scopus metrics scraper
 * =============================================================
 *
 * Created in "vibe coding" with ChatGPT.
 *
 * Purpose:
 *   Read a public Scopus author page and return bibliometric data
 *   in the same array format used by the main bibliometrics page.
 *
 * Extracted fields:
 *   - articles: number of documents/articles
 *   - citations: total citations
 *   - hindex: h-index
 *
 * Warning:
 *   Scopus pages are often dynamically rendered and may require
 *   cookies, JavaScript, or institutional access. Scraping is fragile.
 *   For this reason, fallback values are kept.
 *
 * Intended use:
 *   require_once __DIR__ . "/scopus-scraper.php";
 *   $bibliometric_data["scopus"] = get_scopus_metrics();
 *
 * =============================================================
 */


function get_scopus_metrics() {
  $url = "https://www.scopus.com/authid/detail.uri?authorId=57218509273";

  // Default values used when scraping is unavailable or incomplete.
  $data = [
    "label"     => "Scopus",
    "articles"  => 7,
    "citations" => 1,
    "hindex"    => 1,
    "url"       => $url,
    "fallback"  => true,
    "message"   => "Fallback values are being used.",
  ];

  // Cache the fetched page to avoid querying Scopus on every page load.
  $cache_file = __DIR__ . "/cache/scopus-author.html";
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

  // Search for document count in visible labels or embedded JSON.
  $has_articles = preg_match('/Documents[^0-9]*([0-9,]+)/i', $html, $articles) ||
                  preg_match('/document-count[^0-9]*([0-9,]+)/i', $html, $articles) ||
                  preg_match('/"documentCount"\s*:\s*([0-9]+)/i', $html, $articles);

  // Search for citation count in visible labels or embedded JSON.
  $has_citations = preg_match('/Citations[^0-9]*([0-9,]+)/i', $html, $citations) ||
                   preg_match('/citation-count[^0-9]*([0-9,]+)/i', $html, $citations) ||
                   preg_match('/"citationCount"\s*:\s*([0-9]+)/i', $html, $citations);

  // Search for h-index in visible labels or embedded JSON.
  $has_hindex = preg_match('/h-index[^0-9]*([0-9,]+)/i', $html, $hindex) ||
                preg_match('/"hIndex"\s*:\s*([0-9]+)/i', $html, $hindex);

  if (!$has_articles || !$has_citations || !$has_hindex) {
    return $data;
  }

  $data["articles"]  = (int) str_replace(",", "", $articles[1]);
  $data["citations"] = (int) str_replace(",", "", $citations[1]);
  $data["hindex"]    = (int) str_replace(",", "", $hindex[1]);
  $data["fallback"]  = false;
  $data["message"]   = "Values were scraped from Scopus.";

  return $data;
}


function scopus_scraper_test_render($metrics) {
  $is_fallback = !empty($metrics["fallback"]);
  ?>
  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Scopus scraper test</title>
    </head>
    <body>
      <h1>Scopus scraper test</h1>

      <?php if ($is_fallback): ?>
        <p style="color: #b00020; font-weight: bold;">
          Error: fallback values are being displayed.
        </p>
      <?php else: ?>
        <p style="color: #006400; font-weight: bold;">
          Scraping completed successfully.
        </p>
      <?php endif; ?>

      <pre><?php
        echo "Source: " . htmlspecialchars($metrics["label"], ENT_QUOTES, "UTF-8") . "\n";
        echo "Articles: " . htmlspecialchars($metrics["articles"], ENT_QUOTES, "UTF-8") . "\n";
        echo "Citations: " . htmlspecialchars($metrics["citations"], ENT_QUOTES, "UTF-8") . "\n";
        echo "h-index: " . htmlspecialchars($metrics["hindex"], ENT_QUOTES, "UTF-8") . "\n";
        echo "URL: " . htmlspecialchars($metrics["url"], ENT_QUOTES, "UTF-8") . "\n";
        echo "Message: " . htmlspecialchars($metrics["message"], ENT_QUOTES, "UTF-8") . "\n";
      ?></pre>
    </body>
  </html>
  <?php
}


// Run the minimal test page only when this file is opened directly.
if (basename(__FILE__) === basename($_SERVER["SCRIPT_FILENAME"])) {
  error_reporting(E_ALL);
  ini_set("display_errors", "1");
  ini_set("display_startup_errors", "1");

  scopus_scraper_test_render(get_scopus_metrics());
}
?>
