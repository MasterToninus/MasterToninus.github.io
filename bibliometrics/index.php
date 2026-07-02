<?php
  /* ======================================================
   * Bibliometrics page setup
   * ======================================================
   * Reusable data-loading and counting logic is kept in helper.php.
   * This file only defines paths, asks the helper to prepare the data,
   * and renders the HTML template.
   */

  require_once __DIR__ . "/helper.php";

  $citation_config_path = __DIR__ . "/citation-data.json";
  $bibliometric_config_path = __DIR__ . "/bibliometric-data.json";

  $page_data = prepare_bibliometrics_page_data(
    $citation_config_path,
    $bibliometric_config_path,
    __FILE__,
    __DIR__ . "/helper.php"
  );

  $articles_with_citations = $page_data["articles_with_citations"];
  $bibliometric_data       = $page_data["bibliometric_data"];
  $data_error              = $page_data["data_error"];
  $last_citation_update    = $page_data["last_citation_update"];
  $last_data_update        = $page_data["last_data_update"];
  $footer_last_update      = $page_data["footer_last_update"];
?><!-- WARNING -->
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

    <link rel="stylesheet" href="./bibliometrics.css">
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
              I do not particularly believe in bibliometric indicators, nor in the comforting idea that the value of a mathematical argument can be compressed into a small table of numbers. <br>

              Nevertheless, the Italian ministerial system (ASN) has decided that these numbers matter for the national scientific qualification, so here they are, duly collected and displayed. <br> 

              Apparently, it is not enough to keep up with the philosophy of publish-or-perish; one must also <em>attend to all the bibliometrics that the private entities on which the system relies fail to account for</em>.
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
              To know more about the Italian National Scientific Habilitation, see :
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
        <!-- Indicators Table -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="indicators">
          <div class="big-title shaded">Indicators</div>

          <p class="bibliometrics-warning">
            <em> A manually curated list of bibliometric indicators.</em>
          </p>

          <?php if ($data_error !== ""): ?>
            <table class="list">
              <tr>
                <td class="left"><b>Error</b></td>
                <td class="right"><?php echo html($data_error); ?></td>
              </tr>
            </table>
          <?php endif; ?>

          <?php if ($last_data_update !== null): ?>
          <table class="list">
            <tr>
              <td class="left"><b>Last data update</b></td>
              <td class="right"><?php echo date("F d Y.", $last_data_update); ?></td>
            </tr>
          </table>
          <br>
          <?php endif; ?>

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
                <b>About the discrepancies in these numbers:</b>
                Scopus and WoS do not count citations to an arXiv preprint after the final paper has appeared, even when the arXiv page correctly links to the published version. 
                On the other hand, Scholar and ResearchGate also count preprints, theses, presentations, and many other web-scraped documents as publications, both as valid publications and citations.
              </li>
              <li>
                <b>ASN relevance:</b> or the Italian National Scientific Habilitation, the relevant databases are Scopus and Web of Science. Notably, Scopus refuses to correct this missing citation count on their side (see <a href="./scopus-email-exchange.txt" target="_blank" rel="noopener">Scopus support message</a>). The other sources are displayed only for context.
              </li>
              <li>
                <b>Why manually curate the data:</b>
                Most databases lack a convenient public API or use access restrictions and anti-bot systems. Values are therefore checked by hand and inserted in <code>bibliometric-data.json</code>
              </li>
              <li>
                <b>Web scraping test:</b>: 
                  <a href="./google-scholar-scraper.php" target="_blank" rel="noopener">Scholar</a>,
                  <a href="./scopus-scraper.php" target="_blank" rel="noopener">Scopus</a>.
              </li>
            </ul>
          </div>

        <!-- --------------------------------------------- -->
        <!-- Self-counted citations from JSON data -->
        <!-- --------------------------------------------- -->
        <!--
          The citations list below uses the local JSON citation data prepared by helper.php.
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
              <li>  
                Articles and citations are counted only if they have a DOI, excluding those that are attributed by arXiv and ResearchGate. The working assumption is that the remaining DOI-bearing articles have passed peer review.
            </li>
              <li>
                The self-assessed indices are automatically calculated using a local citation database, which is manually curated by merging data from all sources listed in the indicators table above.
              </li>
            </ul>    


            

          <?php if ($data_error !== ""): ?>
            <table class="list">
              <tr>
                <td class="left"><b>Error</b></td>
                <td class="right"><?php echo html($data_error); ?></td>
              </tr>
            </table>
          <?php endif; ?>

          <?php if ($last_citation_update !== null): ?>
          <table class="list">
            <tr>
              <td class="left"><b>Last citation update</b></td>
              <td class="right"><?php echo date("F d Y.", $last_citation_update); ?></td>
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
          if ($footer_last_update !== null) {
            echo "Last update: " . date("F d Y H:i:s.", $footer_last_update);
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

