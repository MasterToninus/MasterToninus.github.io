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
            <img src="../img/underconstruction-bg.jpg" alt="Bibliometrics">
          </div>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Links -->
        <!-- --------------------------------------------- -->        
        <div class="sec">
          <div class="sec-title"> ! </div>
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
          *///=============================================================
          function html_escape($string) {
            return htmlspecialchars((string) $string, ENT_QUOTES, 'UTF-8');
          }

          /* ---------- Profile links ---------- */
          $bibliometric_profiles = [
            'self-assessed' => [
              'label' => 'self-assessed',
              'icon'  => 'ai ai-user ai-fw',
              'url'   => null,
            ],

            'scopus' => [
              'label' => 'Scopus',
              'icon'  => 'ai ai-scopus ai-fw',
              'url'   => 'https://www.scopus.com/authid/detail.uri?authorId=YOUR_SCOPUS_ID',
            ],

            'wos' => [
              'label' => 'WoS',
              'icon'  => 'ai ai-clarivate ai-fw',
              'url'   => 'https://www.webofscience.com/wos/author/record/YOUR_WOS_ID',
            ],

            'gscholar' => [
              'label' => 'GScholar',
              'icon'  => 'ai ai-google-scholar ai-fw',
              'url'   => 'https://scholar.google.com/citations?user=YOUR_GOOGLE_SCHOLAR_ID&hl=en',
            ],
          ];

          /* ---------- Bibliometric data ---------- */
          // Temporary workaround: the data are manually compiled below. 
          // In the future, they will be automatically collected from the main bibliometric databases using web scraping and/or API calls.
          //


          $bibliometric_data = [
            'self' => [
              'label'     => 'Self-assessed',
              'articles'  => 7,
              'citations' => 10,
              'hindex'    => 2,
            ],

            'scopus' => [
              'label'     => 'Scopus',
              'articles'  => 7,
              'citations' => 1,
              'hindex'    => 1,
            ],

            'wos' => [
              'label'     => 'WoS',
              'articles'  => 7,
              'citations' => 1,
              'hindex'    => 1,
            ],

            'gscholar' => [
              'label'     => 'GScholar',
              'articles'  => 7,
              'citations' => 41,
              'hindex'    => 4,
            ],
          ];

          /* ---------- Table rows ---------- */
          $bibliometric_rows = [
            'articles' => [
              'label' => 'Articles',
              'url'   => null,
            ],

            'citations' => [
              'label' => 'Number of citations',
              'url'   => null,
            ],

            'hindex' => [
              'label' => 'h-index',
              'url'   => 'https://en.wikipedia.org/wiki/H-index',
            ],
          ];
        ?>

        <!-- --------------------------------------------- -->
        <!-- Indicators Data Table -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="indicators">
          <div class="sec-title">Indicators</div>
          <table class="list">
            <tr>
              <td class="left"><b>ORCID</b></td>
              <td class="right">
                <a href="https://orcid.org/" target="_blank" rel="noopener">
                  <i class="ai ai-orcid ai-fw"></i> ORCID profile
                </a>
              </td>
            </tr>
            <tr>
              <td class="left"><b>Google Scholar</b></td>
              <td class="right">
                <a href="https://scholar.google.com/" target="_blank" rel="noopener">
                  <i class="ai ai-google-scholar ai-fw"></i> Google Scholar profile
                </a>
              </td>
            </tr>
            <tr>
              <td class="left"><b>Scopus</b></td>
              <td class="right">
                <a href="https://www.scopus.com/" target="_blank" rel="noopener">
                  <i class="ai ai-scopus ai-fw"></i> Scopus author profile
                </a>
              </td>
            </tr>
            <tr>
              <td class="left"><b>Web of Science</b></td>
              <td class="right">
                <a href="https://www.webofscience.com/" target="_blank" rel="noopener">
                  <i class="ai ai-clarivate ai-fw"></i> Web of Science researcher profile
                </a>
              </td>
            </tr>
          </table>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Indicators -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="indicators">
          <div class="sec-title">Indicators</div>

          <?php if (count($bibliometrics) > 0): ?>
            <table class="list">
              <tbody>
                <?php foreach ($bibliometrics as $row): ?>
                  <tr>
                    <td class="left">
                      <b><?php echo html($row["Indicator"]); ?></b>
                    </td>
                    <td class="right">
                      <?php
                        $url = safe_url($row["Url"]);
                        if ($url !== "") {
                          echo '<b><a href="' . html($url) . '" target="_blank" rel="noopener">' . html($row["Value"]) . '</a></b>';
                        } else {
                          echo '<b>' . html($row["Value"]) . '</b>';
                        }

                        if (trim($row["Source"]) !== "") {
                          echo '<br>Source: ' . html($row["Source"]);
                        }

                        if (trim($row["Last_update"]) !== "") {
                          echo ' | Last update: ' . html($row["Last_update"]);
                        }

                        if (trim($row["Notes"]) !== "") {
                          echo '<br><em>' . html($row["Notes"]) . '</em>';
                        }
                      ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <table class="list">
              <tr>
                <td class="left"><b>-</b></td>
                <td class="right">Bibliometric indicators to be inserted.</td>
              </tr>
            </table>
          <?php endif; ?>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Disclaimer -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="disclaimer">
          <div class="sec-title">Disclaimer</div>
          <table class="list">
            <tr>
              <td class="left"><b>Use</b></td>
              <td class="right">
                These data are provided only for administrative purposes. They should not be read as a mathematical, scientific, or human evaluation of the work listed elsewhere on this website.
              </td>
            </tr>
            <tr>
              <td class="left"><b>Sources</b></td>
              <td class="right">
                Bibliometric values may differ across databases, update schedules, author-profile mergers, indexing choices, and the general mood of the algorithmic bureaucracy involved.
              </td>
            </tr>
          </table>
        </div>

      </div>
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
              &emsp; Italsing srl. &emsp;  All Rights Reserved.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
