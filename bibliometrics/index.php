<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <!-- -->
  <!-- HEADER -->
  <!-- -->
  <head>
    <title>Bibliometrics | Antonio Michele Miti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../src/style.css">
    <link rel="stylesheet" href="../src/darkmode.css"><!-- override darkmode-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">
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
        <!-- PhP: Bibliometric data -->
        <!-- --------------------------------------------- -->
        <?php
          /*// =============================================================
            - Bibliometric indicators
            - Data are manually compiled below.

            TODO
              - web scraping of Scopus, WoS, and Google Scholar to automatically update the data using api call
              - self-assessment data compoutet from a local database of citations (csv file or maybe is better something tree-like like yaml)
              - 
          *///=============================================================

          /* ---------- Bibliometric data ---------- */
          // Temporary workaround: the data are manually compiled below. 
          // In the future, they will be automatically collected from the main bibliometric databases using web scraping and/or API calls.
          //
          $bibliometric_data = [
            'self-assessed' => [
              'label'     => 'Self-assessed',
              'articles'  => 7,
              'citations' => 10,
              'hindex'    => 2,
              'url'       => null,
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
              'url'       => 'https://scholar.google.com/citations?user=DWKPuJYAAAAJ&hl=en',
            ],
          ];
        ?>

<!-- --------------------------------------------- -->
        <!-- Indicators Table -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="indicators">
          <!-- <div class="sec-title">Indicators</div> -->
          <div class="sec-title">  </div>

          <table class="list">
            <tbody>
              <tr>
                <td class="left"><b> Indicators </b></td>
                <td class="right">
                  <i class="ai ai-user ai-fw"></i>
                  <b>Self-assessed</b>
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
                  <a href="https://scholar.google.com/citations?user=DWKPuJYAAAAJ&hl=en" target="_blank" rel="noopener">
                    <i class="ai ai-google-scholar ai-fw"></i>
                    <b>GScholar</b>
                  </a>
                </td>
              </tr>

              <tr>
                <td class="left"><b>Articles</b></td>
                <td class="right">7</td>
                <td class="right">7</td>
                <td class="right">7</td>
                <td class="right">7</td>
              </tr>

              <tr>
                <td class="left"><b>Number of citations</b></td>
                <td class="right">10</td>
                <td class="right">1</td>
                <td class="right">1</td>
                <td class="right">41</td>
              </tr>

              <tr>
                <td class="left">
                  <a href="https://en.wikipedia.org/wiki/H-index" target="_blank" rel="noopener">
                    <b>h-index</b>
                  </a>
                </td>
                <td class="right">2</td>
                <td class="right">1</td>
                <td class="right">1</td>
                <td class="right">4</td>
              </tr>
            </tbody>
          </table>
        </div>


        <!--
          =============================================================
          * Self-counted citations from YAML
          * -------------------------------------------------------------
          * Reads a YAML file and prints only articles having a non-empty
          * citations list. For each such article, it prints:
          * - title
          * - authors
          * - linkable DOI, when available
          * - the same data for each citing paper
          *
          * Requires the PHP YAML extension:
          * https://www.php.net/manual/en/book.yaml.php

          * ATTENzione: non posso installare l'estensione YAML su questo server, quindi non posso usare questa funzione.
          * =============================================================
        -->

        <p>
          Current state of this page is very tentative.
          Data are updated as of June 2026.
        </p>
        <?php


          /* ---------- Configuration ---------- */

          $yaml_path = __DIR__ . "../data/citations.yaml";



          /* ---------- Helpers ---------- */

          function html($string) {
            return htmlspecialchars((string) $string, ENT_QUOTES, "UTF-8");
          }

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

          function has_non_empty_citations($article) {
            return (
              isset($article["citations"]) &&
              is_array($article["citations"]) &&
              count($article["citations"]) > 0
            );
          }


          /* ---------- Load YAML ---------- */

          if (!function_exists("yaml_parse_file")) {
            echo "<p><b>Error:</b> the PHP YAML extension is not installed.</p>";
            return;
          }

          if (!file_exists($yaml_path)) {
            echo "<p><b>Error:</b> YAML file not found.</p>";
            return;
          }

          $data = yaml_parse_file($yaml_path);

          if (
            !is_array($data) ||
            !isset($data["articles"]) ||
            !is_array($data["articles"])
          ) {
            echo "<p><b>Error:</b> invalid YAML structure.</p>";
            return;
          }

          $articles_with_citations = array_filter($data["articles"], "has_non_empty_citations");
        ?>


        <!-- --------------------------------------------- -->
        <!-- Self-counted citations -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="self-counted-citations">
          <div class="sec-title">Self-counted citations</div>
          <p>
            Last update: <?php echo date("F d Y H:i:s.", filemtime($yaml_path)); ?>
            <br>
          </p>

          <?php if (count($articles_with_citations) > 0): ?>

            <table class="list">
              <tbody>

                <?php foreach ($articles_with_citations as $article): ?>

                  <!-- Cited article -->
                  <tr>
                    <td class="left">
                      <b>Cited article</b>
                    </td>

                    <td class="right">
                      <b><?php echo html($article["title"] ?? "Untitled"); ?></b>
                      <br>
                      <?php echo html($article["authors"] ?? ""); ?>
                      <br>
                      DOI:
                      <?php print_doi($article["doi"] ?? ""); ?>
                    </td>
                  </tr>

                  <!-- Citing papers -->
                  <tr>
                    <td class="left">
                      <b>Citing papers</b>
                    </td>

                    <td class="right">
                      <table class="list">
                        <tbody>
                          <?php foreach ($article["citations"] as $citation): ?>
                            <tr>
                              <td class="left">
                                <b><?php echo html($citation["title"] ?? "Untitled"); ?></b>
                              </td>

                              <td class="right">
                                <?php echo html($citation["authors"] ?? ""); ?>
                                <br>
                                DOI:
                                <?php print_doi($citation["doi"] ?? ""); ?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </td>
                  </tr>

                <?php endforeach; ?>

              </tbody>
            </table>

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
        <!-- Footer -->
        <!-- --------------------------------------------- -->
        <footer>
          <div id="content">
            <div id="content-container">
              <div id="footer">
                <br>
                <br>
                <br>

                <div style="text-align:right;font-size: xx-small;opacity: 0.6;" class="poweredby">

                  <div style="margin-bottom: 0.8em;">
                    <b>Disclaimer.</b>
                    These data are provided only for administrative purposes.
                    They should not be read as a mathematical, scientific, or human evaluation
                    of the work listed elsewhere on this website.
                    Bibliometric values may differ across databases, update schedules,
                    author-profile mergers, indexing choices, and the general mood
                    of the algorithmic bureaucracy involved.
                  </div>

                  <?php
                    $files = array($csv_path, "index.php");
                    $times = array();

                    foreach ($files as $file) {
                      if (file_exists($file)) {
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
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>