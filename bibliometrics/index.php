<!-- WARNING -->
<!-- This page has been generated in "vibe-coding" using ChatGPT Plus. -->
<!DOCTYPE html>
<html lang="en">
  <!-- -->
  <!-- HEADER -->
  <!-- -->
  <head>
    <title>Bibliometrics | Antonio Michele Miti</title>
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../src/style.css">
    <link rel="stylesheet" href="../src/darkmode.css"><!-- override darkmode-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">

    <style>
      /*
       * Page-specific CSS rules.
       *
       * The general layout, colors, typography, and dark-mode overrides are
       * inherited from ../src/style.css and ../src/darkmode.css. The rules
       * below are intentionally local: they only adjust the citation list and
       * the bibliometric indicators table on this page.
       */

      /*
       * Self-counted citation list.
       *
       * The citation record is rendered as a nested ordered list rather than
       * as a table: first-level entries are my cited articles, second-level
       * entries are the papers citing them. The font is slightly smaller than
       * the surrounding text so that long titles remain readable without
       * dominating the page.
       */
      .citations-list {
        font-size: 0.92em;
        line-height: 1.45em;
        margin: 10px 0 0 25px;
        padding-left: 20px;
      }

      /* Add vertical separation between different cited articles. */
      .citations-list > li {
        margin-bottom: 1.2em;
      }

      /* Keep a small gap between a cited article and its list of citations. */
      .cited-article-main {
        margin-bottom: 0.4em;
      }

      /*
       * Nested list of citing papers.
       *
       * This is slightly smaller than the first-level list, since these items
       * are secondary information attached to the corresponding cited article.
       */
      .citing-papers {
        font-size: 0.95em;
        margin: 0.5em 0 0 25px;
        padding-left: 18px;
      }

      /* Add modest spacing between citing papers. */
      .citing-papers > li {
        margin-bottom: 0.6em;
      }

      /*
       * Bibliometric indicators table.
       *
       * The first column contains the names of the indicators and is therefore
       * styled in italics. The remaining columns contain numerical values and
       * are centered for easier comparison across databases.
       */
      .bibliometrics-table td:first-child {
        font-style: italic;
      }

      .bibliometrics-table td:not(:first-child) {
        text-align: center;
      }

      .bibliometrics-warning {
        color: #b00020;
        font-size: 0.92em;
        line-height: 1.45;
        margin: 0.5em 0 1em 0;
      }

      .bibliometrics-note {
        font-size: 0.95em;
        line-height: 1.45;
        margin: 0.5em 0 1em 0;
      }


      /*
       * Responsive wrapper for the indicators table.
       *
       * The global stylesheet sets overflow-x: hidden on generic div elements.
       * That rule prevents horizontal scrolling on mobile, so it must be
       * explicitly overridden here for this wrapper.
       */
      .table-scroll {
        display: block;
        width: 100%;
        max-width: 100%;
        overflow-x: auto !important;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
      }

      /*
       * Keep the indicators table as an actual table on every screen size.
       * The external mobile CSS turns .left and .right cells into block
       * elements below 520px; the more specific rules below undo that only
       * for this table.
       */
      .bibliometrics-table {
        width: 100%;
        min-width: 960px;
        border-collapse: collapse;
        table-layout: auto;
      }

      .bibliometrics-table td {
        display: table-cell !important;
        vertical-align: middle;
        white-space: nowrap;
      }

      .bibliometrics-table .left {
        width: auto;
        min-width: 130px;
        text-align: right;
      }

      .bibliometrics-table .right {
        width: auto;
        text-align: center;
      }

      /*
       * Mobile adjustment for the nested citation lists.
       *
       * On small screens, reduce indentation so that long titles have more
       * horizontal space. The bibliometric table itself is handled by the
       * table-specific responsive rules in the external stylesheet, when used.
       */
      @media screen and (max-width: 520px) {
        .citations-list,
        .citing-papers {
          margin-left: 15px;
          padding-left: 15px;
          text-align: left;
        }

        /*
         * Mobile override for the indicators table.
         * This keeps the row/column structure intact and relies on
         * horizontal scrolling instead of stacking cells vertically.
         */
        .table-scroll {
          margin-left: 0;
          margin-right: 0;
          padding-bottom: 0.4em;
          overflow-x: auto !important;
        }

        .bibliometrics-table {
          width: max-content;
          min-width: 960px;
          font-size: 0.9em;
        }

        .bibliometrics-table .left,
        .bibliometrics-table .right {
          display: table-cell !important;
          width: auto !important;
          min-width: unset !important;
          padding: 5px 10px !important;
        }

        .bibliometrics-table .left {
          text-align: right !important;
        }

        .bibliometrics-table .right {
          text-align: center !important;
        }
      }
    </style>
  </head>
  <body>
    <header>
      <div id="header-container">
        <label for="nav"></label>
        <input id="nav" type="checkbox"><a id="logo" href="../">Antonio Michele MITI</a>
        <nav>
          <ul>
            <li><a href="../research/">RESEARCH</a></li>
            <li><a href="../teaching/">TEACHING</a></li>
            <li><a href="../#contacts">CONTACTS</a></li>
            <!-- li-->
            <!--     a(href='#') MISC-->
          </ul>
        </nav>
      </div>
    </header>

    <!-- ================================================= -->
    <!-- Contents -->
    <!-- ================================================= -->
    <div id="content">
      <div id="content-container">

        <!-- --------------------------------------------- -->
        <!-- Title -->
        <!-- --------------------------------------------- -->
        <div id="subpage-title">
          <h1>Bibliometrics</h1>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Introduction -->
        <!-- --------------------------------------------- -->
        <div id="introduction">
          <div id="desc">
            <p class="lead">
              I do not particularly believe in bibliometric indicators, nor in the comforting idea that the value of a mathematical argument can be compressed into a small table of numbers. Nevertheless, the Italian ministerial system has decided that these numbers matter for the national scientific qualification, so here they are, duly collected and displayed. Apparently, it is not enough to keep up with the philosophy of publish-or-perish: one must also take care of the accounting produced by private entities.
            </p>
          </div>
          <div id="photo">
            <img src="../img/pop-ai-slop.png" alt="Publish-or-perish Bibliometrics">
          </div>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Links -->
        <!-- --------------------------------------------- -->        
        <div class="sec">
          <div class="sec-title">Links</div>
          <ul>
            <li>
              To know more about the Italian National Scientific Habilitation, see the official ministerial portal:
              <a href="https://abilitazione.mur.gov.it/public/index.php" target="_blank" rel="noopener noreferrer">Abilitazione Scientifica Nazionale</a>.
            </li>
            <li>
              If you believe that Science is a <b>collaborative effort</b> rather than a <b>competitive</b> one, you may start to consider opposing all of this.
              See:
              <a href="https://www.slow-science.com/" target="_blank" rel="noopener noreferrer">The Slow Science Manifesto</a>.
            </li>
          </ul>
        </div>


        <!-- --------------------------------------------- -->
        <!-- PHP: citation data loading, self-counted bibliometrics, and indicator data -->
        <!-- --------------------------------------------- -->
        <?php
          /* ---------- Configuration ---------- */

          /*
           * The page data are loaded from two PHP configuration files.
           *
           * - citation-data.php contains the local self-assessed citation database;
           * - bibliometric-data.php contains the manually checked external bibliometric indicators.
           */
          $citation_config_path = __DIR__ . "/citation-data.php";
          $bibliometric_config_path = __DIR__ . "/bibliometric-data.php";


          /* ---------- Helpers ---------- */

          /*
           * Escape arbitrary text before printing it in HTML.
           *
           * This prevents malformed output and protects the page from accidental
           * HTML injection if a title, author field, or DOI contains special
           * characters such as <, >, &, or quotes.
           */
          function html($string) {
            return htmlspecialchars((string) $string, ENT_QUOTES, "UTF-8");
          }

          /*
           * Convert a DOI string into a clickable DOI URL.
           *
           * Only strings matching the usual DOI prefix pattern "10...." are
           * converted. Empty values and non-DOI status labels such as
           * "accepted" are deliberately left unlinked.
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
           * Print a bibliometric table value.
           *
           * Null or empty values are displayed as n/a. This is useful for
           * databases that do not expose a given indicator, such as the h-index.
           */
          function print_bibliometric_value($value) {
            if ($value === null || $value === "") {
              echo "n/a";
              return;
            }

            echo html($value);
          }

          /*
           * Print a DOI field.
           *
           * If the DOI is valid, it is rendered as a link to https://doi.org/...
           * If the field is empty or explicitly null, it prints "No DOI".
           * If the field contains a non-DOI note, it is printed as plain text.
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
           * Determine whether a DOI field looks like a genuine DOI.
           *
           * This is used to decide whether an entry should be included in the
           * self-counted number of articles. Manuscripts without a DOI, or
           * entries marked as submitted/accepted, are not counted as published
           * DOI-indexable articles here.
           */
          function valid_doi($doi) {
            $doi = trim((string) $doi);

            if ($doi === "") {
              return false;
            }

            /*
             * Accept both bare DOI strings and DOI resolver URLs, but evaluate
             * the normalized DOI value. This is needed because some local data
             * may contain entries such as https://doi.org/10.xxxx/...
             */
            $doi = preg_replace("#^https?://(?:dx\.)?doi\.org/#i", "", $doi);
            $doi = trim($doi);

            if (preg_match("/^10\.\S+$/", $doi) !== 1) {
              return false;
            }

            /*
             * Exclude non-publisher DOI namespaces used by ResearchGate and arXiv.
             * Examples:
             * - ResearchGate: 10.13140/RG.2.2.21307.13603
             * - arXiv:        10.48550/arXiv.2105.05645
             */
            if (preg_match("#^10\.13140/RG#i", $doi) === 1) {
              return false;
            }

            if (preg_match("#^10\.48550/arxiv#i", $doi) === 1) {
              return false;
            }

            return true;
          }

          /*
           * Decide whether an article contributes to the self-assessed article
           * count.
           *
           * Current convention: only entries with a valid DOI are counted. This
           * keeps submitted manuscripts or placeholder records in the local data
           * file without letting them affect the displayed bibliometric indicators.
           */
          function article_is_countable($article) {
            return valid_doi(data_text($article, "doi"));
          }

          /*
           * Count all published/indexable articles in the local citation data.
           */
          function count_articles($articles) {
            $count = 0;

            foreach ($articles as $article) {
              if (article_is_countable($article)) {
                $count++;
              }
            }

            return $count;
          }

          /*
           * Count all self-recorded citations to countable articles.
           *
           * Citations to non-countable article entries are ignored for the
           * numerical summary, although those entries can still remain in the
           * data file for documentation.
           */
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
           * Compute the h-index from the citation lists stored in the PHP data.
           *
           * Procedure:
           * 1. Build the list of citation counts, one count for each countable
           *    article.
           * 2. Sort these counts in descending order.
           * 3. The h-index is the largest integer h such that at least h papers
           *    have at least h citations each.
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


          /* ---------- Load local PHP data ---------- */

          $articles = [];
          $articles_with_citations = [];
          $data_errors = [];
          $external_bibliometric_data = [];

          if (!file_exists($citation_config_path)) {
            $data_errors[] = "Citation data file not found.";
          } else {
            $loaded_citation_data = require $citation_config_path;

            if (!is_array($loaded_citation_data)) {
              $data_errors[] = "Invalid citation data file.";
            } elseif (
              isset($loaded_citation_data["articles"]) &&
              is_array($loaded_citation_data["articles"])
            ) {
              $articles = $loaded_citation_data["articles"];
            } else {
              $data_errors[] = "Invalid self-assessed citation data structure.";
            }
          }

          if (!file_exists($bibliometric_config_path)) {
            $data_errors[] = "Bibliometric data file not found.";
          } else {
            $loaded_bibliometric_data = require $bibliometric_config_path;

            if (is_array($loaded_bibliometric_data)) {
              $external_bibliometric_data = $loaded_bibliometric_data;
            } else {
              $data_errors[] = "Invalid bibliometric data file.";
            }
          }

          $data_error = implode(" ", $data_errors);

          foreach ($articles as $article) {
            if (article_has_citations($article)) {
              $articles_with_citations[] = $article;
            }
          }

          /*
           * Sort the visible citation record from the most cited article to the
           * least cited article. Articles without recorded citations are omitted
           * from the visible list, but they still contribute to the self-assessed
           * article count if they have a valid DOI.
           */
          usort($articles_with_citations, function ($left, $right) {
            return count($right["citations"]) <=> count($left["citations"]);
          });

          /*
           * Compute the values shown in the Self-assessed column of the
           * indicators table. These values are derived exclusively from the
           * local citation data stored in citation-data.php.
           */
          $self_assessed_articles  = count_articles($articles);
          $self_assessed_citations = count_citations($articles);
          $self_assessed_hindex    = calculate_hindex($articles);

          /*
           * This array is the single source for the displayed indicators table.
           *
           * - The self-assessed column is computed from citation-data.php.
           * - The external profiles are manually entered in bibliometric-data.php.
           */
          $bibliometric_data = array_merge(
            [
              'self-assessed' => [
                'label'     => 'Self-assessed',
                'articles'  => $self_assessed_articles,
                'citations' => $self_assessed_citations,
                'hindex'    => $self_assessed_hindex,
                'url'       => '#self-counted-citations',
                'icon'      => 'ai ai-open-data ai-fw',
              ],
            ],
            $external_bibliometric_data
          );
        ?>

        <!-- --------------------------------------------- -->
        <!-- Indicators Table -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="indicators">
          <div class="big-title shaded">Indicators</div>

          <p class="bibliometrics-warning">
            <b>Warning:</b> <em>Current state of this page is very tentative. Data are updated as of June 2026.</em>
          </p>

          <!--
            The wrapper below allows horizontal scrolling on small screens.
            This keeps the table layout intact on mobile devices instead of
            forcing each cell to break into a vertical block.
          -->
          <div class="table-scroll">
            <table class="list bibliometrics-table">
              <tbody>
                <tr>
                  <td class="left"><b> </b></td>
                  <?php foreach ($bibliometric_data as $source): ?>
                    <?php
                      $source_url = $source["url"] ?? "#";
                      $source_icon = $source["icon"] ?? "";
                      $source_label = $source["label"] ?? "";
                      $source_is_external = preg_match("/^https?:\/\//", $source_url) === 1;
                    ?>
                    <td class="right">
                      <a href="<?php echo html($source_url); ?>"<?php if ($source_is_external): ?> target="_blank" rel="noopener"<?php endif; ?>>
                        <?php if ($source_icon !== ""): ?>
                          <i class="<?php echo html($source_icon); ?>"></i>
                        <?php endif; ?>
                        <b><?php echo html($source_label); ?></b>
                      </a>
                    </td>
                  <?php endforeach; ?>
                </tr>

                <tr>
                  <td class="left"><b>Articles</b></td>
                  <?php foreach ($bibliometric_data as $source): ?>
                    <td class="right"><?php print_bibliometric_value($source["articles"] ?? null); ?></td>
                  <?php endforeach; ?>
                </tr>

                <tr>
                  <td class="left"><b>Citations</b></td>
                  <?php foreach ($bibliometric_data as $source): ?>
                    <td class="right"><?php print_bibliometric_value($source["citations"] ?? null); ?></td>
                  <?php endforeach; ?>
                </tr>

                <tr>
                  <td class="left">
                    <a href="https://en.wikipedia.org/wiki/H-index" target="_blank" rel="noopener">
                      <b>H-index</b>
                    </a>
                  </td>
                  <?php foreach ($bibliometric_data as $source): ?>
                    <td class="right"><?php print_bibliometric_value($source["hindex"] ?? null); ?></td>
                  <?php endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="sec" id="issues">
            <div class="sec-title">Known issues</div>

            <ul>
              <li>
                <b>ASN relevance:</b> for the Italian National Scientific Habilitation, the relevant databases are Scopus and Web of Science. The other sources are displayed only for context.
              </li>
              <li>
                <b>Preprint citations:</b> Scopus and WoS do not seem to count citations to an arXiv preprint after the final paper has appeared, even when arXiv links to the published version.
              </li>
              <li>
                <b>Broader sources:</b> Google Scholar also tracks theses, reports, presentations, posters, and other web documents; ResearchGate similarly includes uploaded or automatically detected material.
              </li>
              <li>
                <b>Pending clarification:</b> I still need to understand more carefully how zbMATH and MathSciNet compute citation indicators.
              </li>
              <li>
                <b>Scopus support:</b> an anonymized plain-text copy of the relevant exchange is available here:
                <a href="./scopus-email-exchange.txt" target="_blank" rel="noopener">Scopus support email exchange</a>.
              </li>
              <li>
                <b>Manual data:</b> external indicators are not web-scraped. Some databases lack a convenient public API, or use access restrictions and anti-bot systems. Values are therefore checked by hand and inserted in <code>bibliometric-data.php</code>.
              </li>
            </ul>

            <p class="bibliometrics-warning">
              <b>Web scraping test:</b>
                <a href="./google-scholar-scraper.php" target="_blank" rel="noopener">Scholar</a>,
                <a href="./scopus-scraper.php" target="_blank" rel="noopener">Scopus</a>.
            </p>    
          </div>

        <!-- --------------------------------------------- -->
        <!-- Self-counted citations from PHP data -->
        <!-- --------------------------------------------- -->
        <!--
          The citations list below uses the local PHP citation data loaded above.
          It prints only articles with a non-empty citations array.
          Articles without recorded citations are omitted from the visible list,
          but they still contribute to the self-assessed article count if they
          have a valid DOI.
        -->

        <!-- --------------------------------------------- -->
        <!-- Citation record -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="self-counted-citations">
          <div class="big-title shaded" id="self-assessed-citation-record">Citation record</div>

          <div class="sec-title">How do I assess my own citations?</div>

          <ul>
              <li>The self-assessed column is computed from <code>citation-data.php</code>.</li>
              <li>The convention is conservative and is meant to mimic Scopus as far as possible.</li>
              <li>Articles and citations are counted only when they have a DOI.</li>
              <li>arXiv DOIs and ResearchGate DOIs are discarded.</li>
              <li>The working assumption is that the remaining DOI-bearing articles have passed peer review.</li>
              <li>The article count, citation count, and h-index are computed automatically from the local citation database.</li>
            </ul>    



          <?php if ($data_error !== ""): ?>
            <table class="list">
              <tr>
                <td class="left"><b>Error</b></td>
                <td class="right"><?php echo html($data_error); ?></td>
              </tr>
            </table>
          <?php endif; ?>

          <?php if (file_exists($citation_config_path) || file_exists($bibliometric_config_path)): ?>
            <?php
              $data_file_timestamps = [];

              if (file_exists($citation_config_path)) {
                $data_file_timestamps[] = filemtime($citation_config_path);
              }

              if (file_exists($bibliometric_config_path)) {
                $data_file_timestamps[] = filemtime($bibliometric_config_path);
              }

              $last_data_update = max($data_file_timestamps);
            ?>
            <table class="list">
              <tr>
                <td class="left"><b>Last data update</b></td>
                <td class="right"><?php echo date("F d Y H:i:s.", $last_data_update); ?></td>
              </tr>
            </table>
          <?php endif; ?>

          <?php if (count($articles_with_citations) > 0): ?>

            <!--
              Main numbered list: each item is one of my cited articles.
              Nested numbered lists contain the papers citing that article.
            -->
            <ol class="citations-list">

              <?php foreach ($articles_with_citations as $article): ?>

                <li class="cited-article">
                  <div class="cited-article-main">
                    <b><?php echo html(data_text($article, "title", "Untitled")); ?></b>
                    <br>
                    <?php echo html(data_text($article, "authors")); ?>
                    <br>
                    DOI:
                    <?php print_doi(data_text($article, "doi")); ?>
                  </div>

                  <ol class="citing-papers">
                    <?php foreach ($article["citations"] as $citation): ?>
                      <li>
                        <b><?php echo html(data_text($citation, "title", "Untitled")); ?></b>
                        <br>
                        <?php echo html(data_text($citation, "authors")); ?>
                        <br>
                        DOI:
                        <?php print_doi(data_text($citation, "doi")); ?>
                      </li>
                    <?php endforeach; ?>
                  </ol>
                </li>

              <?php endforeach; ?>

            </ol>

          <?php else: ?>

            <table class="list">
              <tr>
                <td class="left"><b>-</b></td>
                <td class="right">No self-counted citations inserted.</td>
              </tr>
            </table>

          <?php endif; ?>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Disclaimer -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="disclaimer">
          <div style="font-size: xx-small; opacity: 0.75; line-height: 1.45; margin-top: 1.5em;">
            <b>Disclaimer.</b>
            These data are provided only for administrative purposes.
            They should not be read as a mathematical, scientific, or human evaluation
            of the work listed elsewhere on this website.
            Bibliometric values may differ across databases, update schedules,
            author-profile mergers, indexing choices, and the general mood
            of the algorithmic bureaucracy involved.
          </div>
        </div>

    <!-- --------------------------------------------- -->
    <!-- Footer -->
    <!-- --------------------------------------------- -->
    <footer>
      <br>
      <br>
      <br>
      <div style="text-align:right;font-size: xx-small;opacity: 0.6;" class="poweredby">
        <?php
          /*
           * Footer timestamp.
           *
           * The footer reports the most recent modification time among the
           * PHP data file and the PHP page itself. This is separate from the
           * citations-section timestamp, which reports only the data file date.
           */
          $files = array($bibliometric_config_path ?? null, __FILE__);
          $times = array();

          foreach ($files as $file) {
            if (!empty($file) && file_exists($file)) {
              array_push($times, filemtime($file));
            }
          }

          if (count($times) > 0) {
            echo "Last update: " . date("F d Y H:i:s.", max($times));
          }
        ?>
        <br>

        Copyright &copy;2016<script>new Date().getFullYear()>2016&&document.write("-"+new Date().getFullYear());</script>,
        &emsp; Italsing srl. &emsp; All Rights Reserved.
      </div>
    </footer>

        </div>
      </div>
    </div>

  </body>
</html>

