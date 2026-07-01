<!-- WARNING -->
<!-- This page has been generated in "wibe-coding" using chatgpt Plus (...) -->
<!-- TODO :
      * scrape data from Scopus, WoS, and Google Scholar to automatically update the data using api call
      * self-assessment data computed from a local database of citations (xml file or mysql database provided by Aruba hosting)
      * add a "last update" timestamp to the page footer
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
      /* Self-counted citations list */
      .citations-list {
        font-size: 0.92em;
        line-height: 1.45em;
        margin: 10px 0 0 25px;
        padding-left: 20px;
      }

      .citations-list > li {
        margin-bottom: 1.2em;
      }

      .cited-article-main {
        margin-bottom: 0.4em;
      }

      .citing-papers {
        font-size: 0.95em;
        margin: 0.5em 0 0 25px;
        padding-left: 18px;
      }

      .citing-papers > li {
        margin-bottom: 0.6em;
      }

      /* Bibliometric indicators table */
      .bibliometrics-table td:first-child {
        font-style: italic;
      }

      .bibliometrics-table td:not(:first-child) {
        text-align: center;
      }

      @media screen and (max-width: 520px) {
        .citations-list,
        .citing-papers {
          margin-left: 15px;
          padding-left: 15px;
          text-align: left;
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
        <!-- PHP: XML data and bibliometric indicators -->
        <!-- --------------------------------------------- -->
        <?php
          /* ---------- Configuration ---------- */

          $xml_path = __DIR__ . "/../data/citations.xml";


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

          function xml_text($node, $field, $default = "") {
            if (isset($node->{$field})) {
              return trim((string) $node->{$field});
            }

            return $default;
          }

          function xml_article_has_citations($article) {
            return (
              isset($article->citations) &&
              isset($article->citations->citation) &&
              count($article->citations->citation) > 0
            );
          }

          function xml_valid_doi($doi) {
            return preg_match("/^10\.\S+$/", trim((string) $doi)) === 1;
          }

          function xml_article_is_countable($article) {
            /*
             * Count only published/indexable articles, identified here by a
             * genuine DOI. This excludes entries such as submitted manuscripts
             * with <doi nil="true"/>.
             */
            return xml_valid_doi(xml_text($article, "doi"));
          }

          function count_xml_articles($articles) {
            $count = 0;

            foreach ($articles as $article) {
              if (xml_article_is_countable($article)) {
                $count++;
              }
            }

            return $count;
          }

          function count_xml_citations($articles) {
            $count = 0;

            foreach ($articles as $article) {
              if (xml_article_is_countable($article) && xml_article_has_citations($article)) {
                $count += count($article->citations->citation);
              }
            }

            return $count;
          }

          function calculate_xml_hindex($articles) {
            $citation_counts = [];

            foreach ($articles as $article) {
              if (xml_article_is_countable($article)) {
                $citation_counts[] = xml_article_has_citations($article)
                  ? count($article->citations->citation)
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


          /* ---------- Load XML ---------- */

          $articles = [];
          $articles_with_citations = [];
          $xml_error = "";

          if (!function_exists("simplexml_load_file")) {
            $xml_error = "SimpleXML is not available on this server.";
          } elseif (!file_exists($xml_path)) {
            $xml_error = "XML file not found.";
          } else {
            libxml_use_internal_errors(true);

            $data = simplexml_load_file($xml_path);

            if ($data === false) {
              $xml_error = "Unable to parse XML file.";
              libxml_clear_errors();
            } elseif (!isset($data->articles) || !isset($data->articles->article)) {
              $xml_error = "Invalid XML structure.";
            } else {
              foreach ($data->articles->article as $article) {
                $articles[] = $article;

                if (xml_article_has_citations($article)) {
                  $articles_with_citations[] = $article;
                }
              }
            }
          }

          $self_assessed_articles  = count_xml_articles($articles);
          $self_assessed_citations = count_xml_citations($articles);
          $self_assessed_hindex    = calculate_xml_hindex($articles);


          /* ---------- Bibliometric data ---------- */
          /*
           * Self-assessed data are computed from citations.xml.
           * Scopus, WoS, and Google Scholar values are still manually compiled.
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
          <!-- <div class="sec-title">Indicators</div> -->
          <div class="sec-title">  </div>

          <div class="table-scroll">
            <table class="list bibliometrics-table">
              <tbody>
                <tr>
                  <td class="left"><b>Indicators</b></td>
                  <td class="right">
                    <a href="#self-counted-citations">
                      <i class="ai ai-user ai-fw"></i>
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
                <td class="left"><b>Number of citations</b></td>
                <td class="right"><?php echo html($bibliometric_data["self-assessed"]["citations"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["scopus"]["citations"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["wos"]["citations"]); ?></td>
                <td class="right"><?php echo html($bibliometric_data["gscholar"]["citations"]); ?></td>
              </tr>

              <tr>
                <td class="left">
                  <a href="https://en.wikipedia.org/wiki/H-index" target="_blank" rel="noopener">
                    <b>h-index</b>
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
          Reads citations.xml and prints only articles having a non-empty
          citations list. The same XML file is also used above to compute
          the self-assessed number of articles, citations, and h-index.
        -->

        <p>
          Current state of this page is very tentative.
          Data are updated as of June 2026.
        </p>

        <!-- --------------------------------------------- -->
        <!-- Self-counted citations -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="self-counted-citations">
          <div class="sec-title">Self-counted citations</div>

          <?php if ($xml_error !== ""): ?>
            <p><b>Error:</b> <?php echo html($xml_error); ?></p>
          <?php endif; ?>

          <?php if (file_exists($xml_path)): ?>
            <p>
              Last update: <?php echo date("F d Y H:i:s.", filemtime($xml_path)); ?>
              <br>
            </p>
          <?php endif; ?>

          <?php if (count($articles_with_citations) > 0): ?>

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
      </div>
    </div>

    <!-- --------------------------------------------- -->
    <!-- Footer -->
    <!-- --------------------------------------------- -->
    <footer>
      <div id="footer">
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
    </footer>
  </body>
</html>