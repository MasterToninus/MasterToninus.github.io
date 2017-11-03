<!DOCTYPE html>
<html lang="en">

<!-- My first, rudimental Homepage
a mere personalization of a bootstrap template http://startbootstrap.com/template-categories/landing-pages/
a poor attempt to give a better impression of myself
How to describe my company? I'm the company!
-->
<link rel="shortcut icon" href="../img/mario_favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Complete Resume">
    <meta name="author" content="Antonio M. Miti">

    <title>Research Activities</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/landing-page.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../#">Tony</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../#about">About Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../#research">Research Interests</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../stuff">My Stuff</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <!-- Put your page content here! -->
    <div class="underconstruction-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="underconstruction-message">
                        <h1>Under Construction</h1>
                    </div>
                </div>
            </div>

        </div>
     </div>

     <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Curiculum Vitae</h2>
                    <p class="lead">
			Php generated Resume.
					          </p>


                    <?php
                      $table = array();

                      if (($handle = fopen("../data/activities.csv", "r")) !== FALSE) {

                        while (($record = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    	       array_push($table,$record);
                          }
                      }
                      fclose($handle);
                    ?>

                    <?php if (count($table) > 0): ?>
                    <table>
                      <thead>
                        <tr>
                          <th><?php echo implode('</th><th>', array_keys(current($table))); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php foreach ($table as $row): array_map('htmlentities', $row); ?>
                        <tr>
                          <td><?php echo implode('</td><td>', $row); ?></td>
                        </tr>
                    <?php endforeach; ?>
                      </tbody>
                    </table>
                    <?php endif; ?>


                </div>
                <div class="col-xs-6 col-md-4 Col-lg-offset-2">
					<br>
                </div>
            </div>        <!-- /.row -->
        </div>        <!-- /.container -->
    </div>     <!-- /.content-section-a -->


    <!-- Footer -->
    <footer>
      <div class="container">
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="../#">Home</a>
          </li>
          <li class="footer-menu-divider list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="../#about">About</a>
          </li>
          <li class="footer-menu-divider list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="../#research">Research</a>
          </li>
          <li class="footer-menu-divider list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="../stuff">Stuff</a>
          </li>
          <li class="footer-menu-divider list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="../#contact">Contact</a>
          </li>
        </ul>
        <p class="lastupdate text-muted small">
          <script language="javascript">
            document.write("<i><a href=\"https://github.com/MasterToninus/MasterToninus.github.io/commits/master\">Last Edit<\/a> "+document.lastModified+"<\/i>");
          </script>
        <p class="copyright text-muted small">
          Copyright &copy;2016<script>new Date().getFullYear()>2016&&document.write("-"+new Date().getFullYear());</script>,
          &emsp; Italsing srl. &emsp;  All Rights Reserved.
        </p>
        </p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
