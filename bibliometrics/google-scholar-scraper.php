<?php
/*
 * =============================================================
 * Google Scholar metrics scraper
 * =============================================================
 *
 * Created in "vibe coding" with ChatGPT.
 *
 * Purpose:
 *   Read a public Google Scholar profile and return bibliometric
 *   data in the same array format used by the main bibliometrics page.
 *
 * Extracted fields:
 *   - articles: number of visible publication rows
 *   - citations: total citations
 *   - hindex: h-index
 *
 * Warning:
 *   Google Scholar has no official public API. Scraping can fail when
 *   the HTML changes, when requests are blocked, or when the profile is
 *   only partially loaded. For this reason, fallback values are kept.
 *
 * Intended use:
 *   require_once __DIR__ . "/google-scholar-scraper.php";
 *   $bibliometric_data["gscholar"] = get_google_scholar_metrics();
 *
 * =============================================================
 */


function get_google_scholar_metrics() {
  $url = "https://scholar.google.com/citations?user=DWKPuJYAAAAJ&hl=en";

  // Default values used when scraping is unavailable or incomplete.
  $data = [
    "label"     => "GScholar",
    "articles"  => 7,
    "citations" => 41,
    "hindex"    => 4,
    "url"       => $url,
    "fallback"  => true,
    "message"   => "Fallback values are being used.",
  ];

  // Cache the fetched profile to avoid hitting Google Scholar on every page load.
  $cache_file = __DIR__ . "/cache/google-scholar.html";
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

  // Google Scholar usually stores citation metrics in gsc_rsb_std cells.
  $has_stats = preg_match_all(
    '/<td[^>]*class="gsc_rsb_std"[^>]*>\s*([0-9,]+)\s*<\/td>/i',
    $html,
    $stats
  );

  // Publication rows are usually marked with the gsc_a_tr class.
  $has_rows = preg_match_all(
    '/<tr[^>]*class="gsc_a_tr"[^>]*>/i',
    $html,
    $rows
  );

  if ($has_stats && isset($stats[1][0], $stats[1][2])) {
    $data["citations"] = (int) str_replace(",", "", $stats[1][0]);
    $data["hindex"]    = (int) str_replace(",", "", $stats[1][2]);
  } else {
    return $data;
  }

  if ($has_rows) {
    $data["articles"] = count($rows[0]);
  } else {
    return $data;
  }

  $data["fallback"] = false;
  $data["message"]  = "Values were scraped from Google Scholar.";

  return $data;
}


function google_scholar_scraper_test_render($metrics) {
  $is_fallback = !empty($metrics["fallback"]);
  ?>
  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Google Scholar scraper test</title>
    </head>
    <body>
      <h1>Google Scholar scraper test</h1>

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

  google_scholar_scraper_test_render(get_google_scholar_metrics());
}
?>
