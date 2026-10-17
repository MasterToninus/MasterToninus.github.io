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

              Nevertheless, the Italian National Scientific Habilitation (ASN) uses bibliometric thresholds in my disciplinary area, so here are the numbers, duly collected and displayed. <br>

              Apparently, publish or perish is not quite enough: one must also <em>keep track of the citations that commercial databases manage to overlook</em>.
            </p>
          </div>
          <div id="photo">
            <img src="../img/pop-ai-slop.png" alt="Publish-or-perish Bibliometrics">
          </div>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Responsible research assessment -->
        <!-- --------------------------------------------- -->
        <div class="sec" id="responsible-assessment">
          <div class="big-title shaded">Responsible research assessment</div>

          <p>
            Mathematical research should be assessed primarily through its content:
            correctness, originality, depth, and significance, judged by informed peers.
            Publication counts and citation statistics can supply contextual information,
            but cannot replace a qualitative assessment of the mathematics itself.
          </p>

          <p>I endorse the principles set out in the following documents:</p>
          <ul>
            <li>
              <b>IMU&ndash;ICIAM&ndash;IMS (2008),</b>
              <a href="https://www.mathunion.org/fileadmin/IMU/Report/CitationStatistics.pdf"
                 target="_blank" rel="noopener noreferrer"><em>Citation Statistics</em></a>.
              The report documents the limits and frequent misuse of citation-based
              indicators, including journal impact factors and the h-index.
            </li>
            <li>
              <b>European Mathematical Society (2025),</b>
              <a href="https://euromathsoc.org/code-of-practice"
                 target="_blank" rel="noopener noreferrer"><em>Code of Practice for Mathematical Publication</em></a>.
              The code sets out standards for research integrity, accurate attribution,
              responsible authorship, and the avoidance of citation manipulation.
            </li>
          </ul>

          <p class="bibliometrics-warning">
            <em>Accordingly, the figures below are provided for transparency and
            administrative use, not as a ranking of researchers or a measure of
            the scientific merit of their work.</em>
          </p>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Links -->
        <!-- --------------------------------------------- -->        
        <div class="sec">
          <div class="sec-title">Links</div>
          <ul>
            <li>
              For information on the Italian National Scientific Habilitation, see:
              <a href="https://abilitazione.mur.gov.it/public/index.php" target="_blank" rel="noopener noreferrer">Abilitazione Scientifica Nazionale</a>.
            </li>
            <li>
              If you consider science a <b>collaborative effort</b> rather than a <b>competitive</b> one,
              you may also be interested in:
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
            <em>A manually curated snapshot of bibliometric databases.
            Sources differ in coverage and update schedules; their figures are not directly comparable.</em>
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
                      // Rename the displayed label without changing the data file.
                      if (strcasecmp(trim((string) $source_label), "Self-assessed") === 0) {
                        $source_label = "Local record";
                      }
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
          <div class="sec-title">Known issues and data coverage</div>

          <ul>
            <li>
              <b>Coverage and discrepancies:</b>
              Database records do not always consolidate citations to an arXiv preprint
              with those to its published version. In some cases, citations visible for a
              preprint are absent from the corresponding Scopus or Web of Science record.
              Google Scholar and ResearchGate may also include theses, presentations,
              preprints, and other documents outside the scope of those databases.
            </li>
            <li>
              <b>ASN relevance:</b>
              Scopus and Web of Science are relevant to the bibliometric ASN procedures.
              The figures above are personal records, <em>not official ASN indicators</em>
              or a calculation of eligibility thresholds. For an example of the indexing
              issue, see the
              <a href="./scopus-email-exchange.txt" target="_blank" rel="noopener noreferrer">Scopus support correspondence</a>.
            </li>
            <li>
              <b>Manual updates:</b>
              Data are checked by hand and stored in <code>bibliometric-data.json</code>.
              Public APIs are limited or restricted for several of these services;
              transcription errors and incomplete coverage remain possible.
            </li>
            <li>
              <b>Experimental scraping:</b>
              Test scripts for
              <a href="./google-scholar-scraper.php" target="_blank" rel="noopener noreferrer">Google Scholar</a>
              and <a href="./scopus-scraper.php" target="_blank" rel="noopener noreferrer">Scopus</a>.
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

          <div class="sec-title">How is the local citation record compiled?</div>

          <ul>
            <li>
              <b>Method:</b>
              The local counts are calculated from <code>citation-data.json</code>,
              a manually maintained record assembled by checking the sources above.
              DOI availability is used as a practical counting filter, not as proof
              that an item has undergone peer review. Some references without a DOI
              may still appear in the descriptive list below.
            </li>
            <li>
              <b>Limitations:</b>
              The record may be incomplete, and some citing papers are co-authored
              by me or by co-authors of the cited work. Citation counts do not
              indicate whether a reference is substantive, favourable, or incidental.
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
            These records are provided for transparency and administrative reference only,
            and do not constitute an official ASN calculation or an assessment of scientific merit.
            Values depend on database coverage, indexing practices, author disambiguation,
            and update schedules. For the mathematical content, see the
            <a href="../research/">Research</a> page.
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
              <a href="../AI/" style="font-size:inherit;white-space:nowrap;">Ai Disclosure</a><br>
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

