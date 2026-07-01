<!-- WARNING -->
<!-- This page has been generated in "wibe-coding" using chatgpt Plus (...) -->
<!-- TODO :
      * scrape data from Scopus, WoS, and Google Scholar to automatically update the data using api call
      * self-assessment data computed from a local database of citations (xml file or mysql database provided by Aruba hosting)
      * add a "last update" timestamp to the page footer
      * move style to a separate dedicated css file
      * move php code to a separate dedicated php file
-->
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
        min-width: 660px;
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
          min-width: 660px;
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
          <div class="sec-title"></div>
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
        <!-- PHP: XML data loading, self-counted bibliometrics, and indicator data -->
        <!-- --------------------------------------------- -->
        <?php
          /* ---------- Configuration ---------- */

          /*
           * Absolute path to the XML file containing the citation data.
           *
           * __DIR__ is the directory of the current PHP file. The path below
           * assumes the current page is stored in a subdirectory, while the
           * XML file is stored in ../data/citations.xml relative to this page.
           */
          $xml_path = __DIR__ . "/../data/citations.xml";


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
           * converted. Empty values, XML null values, and non-DOI status labels
           * such as "accepted" are deliberately left unlinked.
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
           * Safely extract a textual child field from a SimpleXML node.
           *
           * Example: xml_text($article, "title") returns the text inside
           * <title>...</title>. If the field is missing, the function returns
           * the supplied default value instead of raising a notice.
           */
          function xml_text($node, $field, $default = "") {
            if (isset($node->{$field})) {
              return trim((string) $node->{$field});
            }

            return $default;
          }

          /*
           * Check whether an article has at least one nested citing paper.
           *
           * The expected XML shape is:
           * <article>
           *   ...
           *   <citations>
           *     <citation>...</citation>
           *   </citations>
           * </article>
           */
          function xml_article_has_citations($article) {
            return (
              isset($article->citations) &&
              isset($article->citations->citation) &&
              count($article->citations->citation) > 0
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
          function xml_valid_doi($doi) {
            return preg_match("/^10\.\S+$/", trim((string) $doi)) === 1;
          }

          /*
           * Decide whether an article contributes to the self-assessed article
           * count.
           *
           * Current convention: only entries with a valid DOI are counted. This
           * keeps submitted manuscripts or placeholder records in the XML file
           * without letting them affect the displayed bibliometric indicators.
           */
          function xml_article_is_countable($article) {
            return xml_valid_doi(xml_text($article, "doi"));
          }

          /*
           * Count all published/indexable articles in the XML file according
           * to xml_article_is_countable().
           */
          function count_xml_articles($articles) {
            $count = 0;

            foreach ($articles as $article) {
              if (xml_article_is_countable($article)) {
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
           * XML file for documentation.
           */
          function count_xml_citations($articles) {
            $count = 0;

            foreach ($articles as $article) {
              if (xml_article_is_countable($article) && xml_article_has_citations($article)) {
                $count += count($article->citations->citation);
              }
            }

            return $count;
          }

          /*
           * Compute the h-index from the citation lists stored in the XML file.
           *
           * Procedure:
           * 1. Build the list of citation counts, one count for each countable
           *    article.
           * 2. Sort these counts in descending order.
           * 3. The h-index is the largest integer h such that at least h papers
           *    have at least h citations each.
           */
          function calculate_xml_hindex($articles) {
            // Collect the number of citations received by each countable article.
            $citation_counts = [];

            foreach ($articles as $article) {
              // Ignore entries that should not contribute to bibliometric indicators.
              if (xml_article_is_countable($article)) {
                $citation_counts[] = xml_article_has_citations($article)
                ? count($article->citations->citation)
                : 0;
              }
            }

            // Sort citation counts in decreasing order.
            rsort($citation_counts, SORT_NUMERIC);

            // Compute the largest h such that at least h articles have at least h citations.
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


          /* ---------- Load XML ---------- */

          /*
           * The following variables are initialized before attempting to read
           * the XML file so that the rest of the page can still render even if
           * the file is missing, malformed, or SimpleXML is unavailable.
           */
          $articles = [];
          $articles_with_citations = [];
          $xml_error = "";

          if (!function_exists("simplexml_load_file")) {
            $xml_error = "SimpleXML is not available on this server.";
          } elseif (!file_exists($xml_path)) {
            $xml_error = "XML file not found.";
          } else {
            /*
             * Keep XML parsing errors internal. This avoids raw warnings being
             * printed into the public page. A cleaner error message is stored
             * in $xml_error and displayed later in the citations section.
             */
            libxml_use_internal_errors(true);

            $data = simplexml_load_file($xml_path);

            if ($data === false) {
              $xml_error = "Unable to parse XML file.";
              libxml_clear_errors();
            } elseif (!isset($data->articles) || !isset($data->articles->article)) {
              $xml_error = "Invalid XML structure.";
            } else {
              /*
               * Store all article nodes in $articles for the numerical counts.
               * Store only cited articles in $articles_with_citations for the
               * visible self-counted citations list.
               */
              foreach ($data->articles->article as $article) {
                $articles[] = $article;

                if (xml_article_has_citations($article)) {
                  $articles_with_citations[] = $article;
                }
              }
            }
          }

          /*
           * Compute the values shown in the Self-assessed column of the
           * indicators table. These values are derived exclusively from the XML
           * file, not from Scopus, Web of Science, or Google Scholar.
           */
          $self_assessed_articles  = count_xml_articles($articles);
          $self_assessed_citations = count_xml_citations($articles);
          $self_assessed_hindex    = calculate_xml_hindex($articles);


          /* ---------- Bibliometric data ---------- */
          /*
           * This array is the single source for the displayed indicators table.
           *
           * - The self-assessed column is computed from citations.xml above.
           * - The Scopus, WoS, and Google Scholar columns remain manually
           *   compiled because those platforms do not expose reliable public
           *   HTML/API data for this lightweight static PHP page.
           * - Each source also stores its profile URL, used in the table header.
           */

          $bibliometric_data = [
            'self-assessed' => [
              'label'     => 'Self-assessed',
              'articles'  => $self_assessed_articles,
              'citations' => $self_assessed_citations,
              'hindex'    => $self_assessed_hindex,
              'url'       => '#self-counted-citations',
            ],

            'scopus' => [
              'label'     => 'Scopus',
              'articles'  => 7,
              'citations' => 1,
              'hindex'    => 1,
              'url'       => 'https://www.scopus.com/authid/detail.uri?authorId=57218509273',
            ],

            'wos' => [
              'label'     => 'WoS',
              'articles'  => 7,
              'citations' => 1,
              'hindex'    => 1,
              'url'       => 'https://www.webofscience.com/wos/author/record/JNS-8304-2023',
            ],

            'gscholar' => [
              'label'     => 'GScholar',
              'articles'  => 7,
              'citations' => 41,
              'hindex'    => 4,
              'url'       => 'https://scholar.google.com/citations?user=DWKPuJYAAAAJ&amp;hl=en',
            ],
          ];
        ?>

        <!-- --------------------------------------------- -->
        <!-- Indicators Table -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="indicators">
          <div class="sec-title">Indicators</div>
            
          <p class="bibliometrics-warning">
            <b>Warning:</b> <em>Current state of this page is very tentative. Data are updated as of June 2026.</em>
          </p>
          <br>
             
          <p class="bibliometrics-warning">
            <b>Web scraping test:</b>
              <a href="./google-scholar-scraper.php" target="_blank" rel="noopener">Scholar</a>,
              <a href="./scopus-scraper.php" target="_blank" rel="noopener">Scopus</a>,
              <a href="./xml-citations-scraper.php" target="_blank" rel="noopener">XML</a>.
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
                  <td class="right">
                    <a href="#self-counted-citations">
                      <i class="ai ai-open-data ai-fw"></i>
                      <b>Self-assessed</b>
                    </a>
                  </td>

                  <td class="right">
                  <a href="https://www.scopus.com/authid/detail.uri?authorId=57218509273" target="_blank" rel="noopener">
                    <i class="ai ai-scopus ai-fw"></i>
                    <b>Scopus</b>
                  </a>
                </td>

                <td class="right">
                  <a href="https://www.webofscience.com/wos/author/record/JNS-8304-2023" target="_blank" rel="noopener">
                    <i class="ai ai-clarivate ai-fw"></i>
                    <b>WoS</b>
                  </a>
                </td>

                <td class="right">
                  <a href="https://scholar.google.com/citations?user=DWKPuJYAAAAJ&amp;hl=en" target="_blank" rel="noopener">
                    <i class="ai ai-google-scholar ai-fw"></i>
                    <b>GScholar</b>
                  </a>
                </td>
              </tr>

              <tr>
                <td class="left"><b>Articles</b></td>
                <td class="right"><?php echo html($bibliometric_data["self-assessed"]["articles"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["scopus"]["articles"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["wos"]["articles"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["gscholar"]["articles"]); ?></td>
              </tr>

              <tr>
                <td class="left"><b>Citations</b></td>
                <td class="right"><?php echo html($bibliometric_data["self-assessed"]["citations"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["scopus"]["citations"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["wos"]["citations"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["gscholar"]["citations"]); ?></td>
              </tr>

              <tr>
                <td class="left">
                  <a href="https://en.wikipedia.org/wiki/H-index" target="_blank" rel="noopener">
                    <b>H-index</b>
                  </a>
                </td>
                <td class="right"><?php echo html($bibliometric_data["self-assessed"]["hindex"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["scopus"]["hindex"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["wos"]["hindex"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["gscholar"]["hindex"]); ?></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>


        <!-- --------------------------------------------- -->
        <!-- Self-counted citations from XML -->
        <!-- --------------------------------------------- -->
        <!--
          The citations list below reuses the same XML data loaded above.
          It prints only articles with a non-empty <citations> block.
          Articles without recorded citations are omitted from the visible list,
          but they still contribute to the self-assessed article count if they
          have a valid DOI.
        -->

        <!-- --------------------------------------------- -->
        <!-- Citation record -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="self-counted-citations">
          <div class="big-title shaded" id="self-assessed-citation-record">Citation record</div>

          <?php if ($xml_error !== ""): ?>
            <table class="list">
              <tr>
                <td class="left"><b>Error</b></td>
                <td class="right"><?php echo html($xml_error); ?></td>
              </tr>
            </table>
          <?php endif; ?>

          <?php if (file_exists($xml_path)): ?>
            <table class="list">
              <tr>
                <td class="left"><b>Last update</b></td>
                <td class="right"><?php echo date("F d Y H:i:s.", filemtime($xml_path)); ?></td>
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
                    <b><?php echo html(xml_text($article, "title", "Untitled")); ?></b>
                    <br>
                    <?php echo html(xml_text($article, "authors")); ?>
                    <br>
                    DOI:
                    <?php print_doi(xml_text($article, "doi")); ?>
                  </div>

                  <ol class="citing-papers">
                    <?php foreach ($article->citations->citation as $citation): ?>
                      <li>
                        <b><?php echo html(xml_text($citation, "title", "Untitled")); ?></b>
                        <br>
                        <?php echo html(xml_text($citation, "authors")); ?>
                        <br>
                        DOI:
                        <?php print_doi(xml_text($citation, "doi")); ?>
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
      </div>
    </div>

    <!-- --------------------------------------------- -->
    <!-- Footer -->
    <!-- --------------------------------------------- -->
    <footer>
      <div id="content">
        <div id="content-container">
          <br>
          <br>
          <br>
          <div style="text-align:right;font-size: xx-small;opacity: 0.6;" class="poweredby">

            <?php
              /*
               * Footer timestamp.
               *
               * The footer reports the most recent modification time among the
               * XML data file and the PHP page itself. This is separate from the
               * citations-section timestamp, which reports only the XML file date.
               */
              $files = array($xml_path ?? null, __FILE__);
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
        </div>
      </div>
    </footer>
  </body>
</html>

