<!DOCTYPE html>
<html lang="en">

<!--
	Material page
-->
<link rel="shortcut icon" href="../img/mario_favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="My stuff">
    <meta name="author" content="Antonio M. Miti">

    <title>Material</title>

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
              <a class="nav-link" href="#">My Stuff</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="intro-header">
      <div class="container">
        <div class="intro-message">
          <h1>Working Material</h1>
          <hr class="intro-divider">
          <ul class="list-inline intro-social-buttons">
            <li class="list-inline-item">
              <a href="#Teaching" class="btn btn-default btn-lg">
                <i class="fa fa-book fa-fw"></i>
                <span class="network-name">teaching</span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#Publications" class="btn btn-default btn-lg">
                <i class="fa fa-flask fa-fw"></i>
                <span class="network-name">Publications</span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#PostGrad" class="btn btn-default btn-lg">
                <i class="fa fa-graduation-cap fa-fw"></i>
                <span class="network-name">PostGrad</span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#UnderGrad" class="btn btn-default btn-lg">
                <i class="fa fa-eraser fa-fw"></i>
                <span class="network-name">UnderGrad</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </header>



    <!-- Put your page content here! -->

     <!-- Generate Files array -->
	<?php
	  $papers = array();
	  $teaching = array();
	  $postgrad = array();

	  if (($handle = fopen("../data/material.csv", "r")) !== FALSE) {

	    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		$record = array(
		  "Category" => $data[0],
		  "Title" => $data[1],
		  "Type" => $data[2],
		  "Language" => $data[3],
		  "Date" => $data[4],
		  "Url" => $data[5],
		  "Wip" => $data[6],
		  "Authors" => $data[7],
		);
		if(strcmp($record["Category"],"Teaching")==0)
		  array_push($teaching,$record);
		else if(strcmp($record["Category"],"Paper")==0)
		  array_push($papers,$record);
		else if($record["Category"]=="Postgraduate")
		  array_push($postgrad,$record);

	  }
	  fclose($handle);
	}
	?>



     <!-- Type B -->
     <a  name="Teaching"></a>
     <section class="content-section-b">
       <div class="container">
         <div class="row">
           <div class="col-lg-5 mr-auto order-lg-2">
             <hr class="section-heading-spacer">
             <div class="clearfix"></div>
             <h2 class="section-heading">Teaching<br></h2>
             <p class="lead">
               My lecture notes:
             </p>
		<?php if (count($teaching) > 0): ?>
		<table>
		  <tbody>
		    <?php foreach ($teaching as $row): array_map('htmlentities', $row); ?>
		    <tr>
		      <?php
			echo "<td><a href=" . $row["Url"] . ">" . $row["Title"] . "</a></td>";
			echo "<td>" . $row["Type"] . "</td>";
			if ($row["Wip"]==1)
			 echo "<td> WIP </td>";
		      ?>
		    </tr>
		<?php endforeach; ?>
		  </tbody>
		</table>
		<?php endif;?>
           </div>
           <div class="col-lg-5 ml-auto order-lg-1">
		<br>
                <img class="img-fluid center-block" src="../img/serious-man.jpg" alt="Typical academic picture">
           </div>
         </div>
       </div>
       <!-- /.container -->
     </section>
     <!-- /.content-section-b -->


     <!-- Type A -->
     <a  name="Publications"></a>
     <section class="content-section-a">
       <div class="container">
         <div class="row">
           <div class="col-lg-8 ml-auto">
             <hr class="section-heading-spacer">
             <div class="clearfix"></div>
             <h2 class="section-heading">Publications<br></h2>
               <p class="lead">
                 An hopefully growing list of my papers.
               </p>
		<?php if (count($papers) > 0): ?>
		<table>
		  <tbody>
		<?php foreach ($papers as $row): array_map('htmlentities', $row); ?>
		    <tr>
		      <?php
			echo "<td><a href=" . $row["Url"] . ">" . $row["Title"] . "</a> ;</td>";
			echo "<td>" . $row["Authors"] . "</td>";
			if ($row["Wip"]==1)
			 echo "<td> WIP </td>";
		      ?>
		    </tr>
		<?php endforeach; ?>
		  </tbody>
		</table>
		<?php endif;?>
           </div>
           <div class="col-lg-2 mr-auto">
		<br>
		<br>
		<img class="img-fluid" src="../img/UnderConstruction.gif" alt="Picture, work in progress.">
           </div>
         </div>
       </div>
       <!-- /.container -->
     </section>
     <!-- /.content-section-a -->


     <!-- Type B -->
     <a  name="PostGrad"></a>
     <section class="content-section-b">
       <div class="container">
         <div class="row">
           <div class="col-lg-5 mr-auto order-lg-2">
             <hr class="section-heading-spacer">
             <div class="clearfix"></div>
             <h2 class="section-heading">Post Graduate Material<br></h2>
             <p class="lead">
               Material produced during my Ph.D.
             </p>
		<?php if (count($postgrad) > 0): ?>
		<table>
		  <tbody>
		    <?php foreach ($postgrad as $row): array_map('htmlentities', $row); ?>
		      <tr>
			<?php
			  echo "<td><a href=" . $row["Url"] . ">" . $row["Title"] . "</a></td>";
			  echo "<td>" . $row["Type"] . "</td>";
			  if ($row["Wip"]==1)
			    echo "<td> WIP </td>";
			  ?>
		      </tr>
		    <?php endforeach; ?>
		  </tbody>
		</table>
		<?php endif;?>
           </div>
           <div class="col-lg-5 ml-auto order-lg-1">
		<br>
                <img class="img-fluid center-block" src="../img/Figure_ms_landscape.jpg" alt="Typical academic picture">
           </div>
         </div>
       </div>
       <!-- /.container -->
     </section>
     <!-- /.content-section-b -->



    <!-- UnderGraduate Projects-->
    <a  name="UnderGrad"></a>
    <section class="content-section-a">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 ml-auto">
            <hr class="section-heading-spacer">
            <div class="clearfix"></div>
            <h2 class="section-heading">UnderGraduate Material</h2>
            <p class="lead">
              Some of things that I produced in my years of studies.
            </p>
            <h4>Mathematical Physics</h4>
            <div class="smallerlink">
              <ul>
                <li> Master's Thesis. <a href="https://www.researchgate.net/profile/Antonio_Michele_Miti/publication/295548746_Algebraic_quantization_of_Jacobi_fields_and_geometric_approach_to_Peierls_brackets/links/56cb4a8f08ae96cdd06fab2c.pdf?origin=publication_detail&ev=pub_int_prw_xdl&msrp=ZrIIVxf31q0LNEnXEaQXzxWaSQk5ZmxceAaNUrnYxhonmlJU3CBdFdEzmd79tSXTz8IplBK9dflf_xbYaPCvIQ.1kLAB9Nma1ob41tXH00H3PIhOSjR7FYhxeqL1dwcJwbBims23-dhnGPMwx-SrXRKPWczu5cW4T5uot_NVq4FZg.mrOqvU32tPTevB0wsejm2IozZJBSZuCVF0QCi41PMJwMPHBAx0fS4gPETlFEP7JqQXAkr7_1ONVO4pzAohMOjg">(Pdf)</a> <a href="https://github.com/MasterToninus/MasterThesis">(LaTex)</a> <a href="https://github.com/MasterToninus/MasterThesis/raw/master/Slides/Presentazione.pdf">(Slides)</a></li>
                <li> (ITA) Bachelor's Thesis. <a href="https://github.com/MasterToninus/TesiTriennale/raw/master/tesi.pdf">(Pdf)</a> <a href="https://github.com/MasterToninus/TesiTriennale">(LaTex)</a> <a href="https://github.com/MasterToninus/TesiTriennale/raw/master/Presentazione/presentazione.pdf">(Slides)</a></li>
                <!-- Draft dispensarium -->
                <li> (WIP) Notes on Fiber Bundle. <a href="https://github.com/MasterToninus/Dispensarium/blob/master/Fiber-Bundles/FiberBundles.pdf" >(Pdf)</a> <a href="https://github.com/MasterToninus/Dispensarium/blob/master/Fiber-Bundles/FiberBundles.tex" >(LaTex)</a></li>
                <li> (WIP) AQFT mathematical preliminaries. <a href="https://github.com/MasterToninus/Dispensarium/blob/master/AQFT-Mathematical-Preliminaries/AQFT_Preliminaries.pdf" >(Pdf)</a> <a href="https://github.com/MasterToninus/Dispensarium/blob/master/AQFT-Mathematical-Preliminaries/AQFT_Preliminaries.tex" >(LaTex)</a></li>
                <!--<li> (WIP) Quick notes in abstract algebra. <a href="https://github.com/MasterToninus/Dispensarium/tree/master/Remarks-in-Algebra" >(Pdf)</a> <a href="https://github.com/MasterToninus/Dispensarium/blob/master/Remarks-in-Algebra/Algebraic-Structures.tex" >(LaTex)</a></li-->
              </ul>
              <h4>Computational Physics</h4>
              <ul>
                <li> (COURSE PROJECT) (ITA) Condensation algorithm in CUDA. <a href="https://github.com/MasterToninus/Computational-Physics-Exercise/raw/master/Condensation%20Algorithm%20in%20CUDA/Relazione/RelazioneAntonioMiti.pdf">(Report)</a> <a href="https://github.com/MasterToninus/Computational-Physics-Exercise/tree/master/Condensation%20Algorithm%20in%20CUDA/ProgettoFinale">(Source)</a> <a href="https://github.com/MasterToninus/Computational-Physics-Exercise/raw/master/Condensation%20Algorithm%20in%20CUDA/Presentazione/Presentazione.pdf">(Slides)</a></li>
                <li> (COURSE PROJECT) (ITA) Ising Simulation. <a href="https://github.com/MasterToninus/Computational-Physics-Exercise/raw/master/Ising%20simulation%20Metropolis%20vs%20Cluster/Report/Ising_v2.pdf">(Report)</a> <a href="https://github.com/MasterToninus/Computational-Physics-Exercise/tree/master/Ising%20simulation%20Metropolis%20vs%20Cluster/Src">(Source)</a></li>
                <li> (COURSE PROJECT) (ITA) Molecular Dynamics. <a href="https://github.com/MasterToninus/Computational-Physics-Exercise/raw/master/Molecular%20Dynamics/Report/DinamicaMolecolare.pdf">(Report)</a> <a href="https://github.com/MasterToninus/Computational-Physics-Exercise/tree/master/Molecular%20Dynamics/Src">(Source)</a></li>
                <li> (COURSE PROJECT) (ITA) Numerical Analysis Computer Lab. <a href="https://github.com/MasterToninus/Numerical-Lab">(Report+Src)</a></li>
              </ul>
              <h4>Others</h4>
              <ul>
                <!-- Onenote Notebooks -->
                <li> (COURSE NOTE) (ITA) Appunti di Fisica delle Proteine. <a href="https://onedrive.live.com/redir?page=view&resid=E27F0FE22493F47E!911&authkey=!AB2UWKYy6DV3fkU">(OneNote)</a> </li>
                <li> (COURSE NOTE) (ITA) Appunti di Elettrodinamica Classica. <a href="https://onedrive.live.com/redir?page=view&resid=E27F0FE22493F47E!664&authkey=!AKcCwRv71Q-c4kc">(OneNote)</a> </li>
              </ul>
          </div>
        </div>
          <div class="col-lg-5 mr-auto ">
            <br>
            <img class="img-fluid" src="../img/ThesisExtract.png" alt="Extract of Master Thesis">
            <br>
            <img class="img-fluid" src="../img/clusterbassaT.gif" alt="Ising Cluster Algorithm">
          </div>
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- /.content-section-a -->





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
            <a href="#">Stuff</a>
          </li>
          <li class="footer-menu-divider list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="../#contact">Contact</a>
          </li>
        </ul>
        <p class="copyright text-muted small">
          Copyright &copy;2016<script>new Date().getFullYear()>2016&&document.write("-"+new Date().getFullYear());</script>,
          &emsp; Italsing srl. &emsp;  All Rights Reserved.
	  <br>
          Credits to <a href="https://github.com/BlackrockDigital/startbootstrap-landing-page">BlackrockDigital</a> for the bootstrap template.
        </p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
