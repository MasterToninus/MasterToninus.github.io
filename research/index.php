<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">  
  <!-- -->
  <!-- HEADER -->
  <!-- -->
  <head>
    <title>Antonio Michele Miti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../src/style.css">
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
            <li><a href="#">RESEARCH</a></li>
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
          <h1>Research</h1> 
          &emsp;
          <a href="https://scholar.google.com/citations?hl=en&user=DWKPuJYAAAAJ"><i class="ai ai-lg ai-google-scholar"></i></a> 
          &emsp;
          <a href="https://www.scopus.com/authid/detail.uri?authorId=57218509273"><i class="ai ai-lg ai-scopus"></i></a> 
          &emsp;
          <a href="https://arxiv.org/search/?searchtype=author&query=Miti%2C+A+M"><i class="ai ai-lg ai-arxiv"></i></a> 
          &emsp;
          <a href="https://orcid.org/0000-0002-8829-1943"><i class="ai ai-lg ai-orcid"></i></a>
        </div>




        <!-- --------------------------------------------- -->
        <!-- Research Intersts -->
        <!-- --------------------------------------------- -->
        <div id="introduction">
          <div id="desc">
          <div class="big-title shaded" id="research">Interests</div>               
          <p class="lead">
            Broadly speaking, my research interests lie in the field of differential geometry and its interplay with mathematical physics.
          </p>
          <p class="lead">
            I work with higher geometry methods in multisymplectic geometry and, most of all, I am interested in structures “up to homotopies” inspired by geometry and mechanics.
          </p>          
          </div>          
          <div id="photo">
            <img src="../img/Iamp.png" alt="Physically inspired mathematics">
          </div>          
        </div>

        <!-- --------------------------------------------- -->
        <!-- Research Program -->
        <!-- --------------------------------------------- -->
        <div id="introduction">
          <div id="desc">
          <div class="sec-title">Research Program</div>                 
          <p class="lead">
            My research project focuses on the notions of L<sub>∞</sub> algebra of observables and homotopy comomentum maps. These are the higher analogues of smooth observables and the ordinary comoment map in the context of n-plectic geometry.

            My key results are related to the explicit construction of non-trivial instances of these objects with possible application in different areas of mathematics (e.g. knot theory) and physics (e.g. hydrodynamics).
          </p>                         
            <p class="lead">
              Nowadays, I am investigating the notion of gauge transformations and (symplectic) reduction in the context of multisymplectic geometry.
            </p>       
            <p class="lead">
              A deep motivation for pursuing this line of research can be tracked in my interest in understanding the axiomatic and geometric foundation of classical field theories (i.e. mechanical systems with infinite and continuous degrees of freedom).
              In this perspective, I am always interested in expanding my knowledge both in the pure direction (homotopical algebra, higher categories) than in the applied direction (symplectic integrators, numerical simulations).
            </p>        
          </div>
          <div id="photo">
                <img src="../img/saggiatore_Crop.jpg" alt="Typical academic picture">
          </div>          
        </div>        


        <!-- --------------------------------------------- -->
        <!-- Keywords -->
        <!-- --------------------------------------------- -->        
        <div class="sec">
          <div class="sec-title">Keywords</div>
            <ul>
              <li> Multi-symplectic geometry and L<sub>∞</sub>-Algebras</li>
              <li> Higher structures and Homotopy structures</li>
              <li> Axiomatization and mathematical foundations of classical and quantum field theories</li>
              <li> Geometric Mechanics of Field Systems</li>
              <li> Geometric and Algebraic Quantization</li>
              <!--<li> Secondary calculus and cohomological physics</li>-->
              <!--<li> Categories, Topos and Gauge Theories</li>-->
            </ul>          
        </div>

        <!-- --------------------------------------------- -->
        <!-- PhP: Generate db from bib file                 -->
        <!-- --------------------------------------------- -->  
        <?php
            $_GET['library']=1;
            define('BIBTEXBROWSER_BIBTEX_LINKS',false); // no [bibtex] link by default
            //configurations
            @define('USE_INITIALS_FOR_NAMES',true);
            require_once('bibtexbrowser.php');
            global $db;
            $db = new BibDataBase();
            $db->load('../data/publications.bib');

            // can also be $query = array('year'=>'.*');
            $query = array('year'=>'.*');
            $entries=$db->multisearch($query);
            uasort($entries, 'compare_bib_entry_by_mtime');
            $publications = array();
            $theses = array();

            foreach ($entries as $bibentry) {
              if ($bibentry->getType() == 'article' || $bibentry->getType() =='unpublished'){
                array_push($publications,$bibentry);
              }
              elseif ($bibentry->getType() == 'phdthesis'){
                array_push($theses,$bibentry);
              }
            }
          ?>




        <!-- --------------------------------------------- -->
        <!-- Publications -->
        <!-- --------------------------------------------- -->        
        <div class="sec">
          <div class="big-title shaded" id="publications">Publications</div> 
          <table class="list">
          <?php
            foreach ($publications as $bibentry) {
              echo '<tr>';
              if ($bibentry->getType() =='unpublished')
                echo '<td class="left"><b>(expected) '.$bibentry->getYear().'</b></td>';              
              else
                echo '<td class="left"><b>'.$bibentry->getField('month').' '.$bibentry->getYear().'</b></td>';
              echo '<td class="right">';
              echo '<b>'.$bibentry->getTitle().'.</b><br>';
              echo ' '.$bibentry->getFormattedAuthorsString().";";
              echo ' <a href="'.$bibentry->getField('url').'">'.$bibentry->getField('journal').'</a>.<br/>';
              echo ' '.$bibentry->getBibLink().' '.$bibentry->getArxivLink()."<br/>";
              //echo $bibentry->toHTML()."<br/>";
              echo '</td>';
              echo '</tr>';
            }
          ?>
          </table>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Theses -->
        <!-- --------------------------------------------- -->        
        <div class="sec">
          <div class="sec-title">Theses 
          </div>
          <table class="list">
          <?php
            foreach ($theses as $bibentry) {
              echo '<tr>';
              echo '<td class="left"><b>'.$bibentry->getField('month').' '.$bibentry->getYear().'</b></td>';
              echo '<td class="right">';
              echo '<b>'.$bibentry->getTitle().'.</b><br>';
              echo ' '.$bibentry->getField('type')." @ ".$bibentry->getField('school').";<br/>";
              echo ' Advisors: '.$bibentry->getField('advisors').'.<br/>';
              echo ' '.$bibentry->getBibLink();
              echo ' <a href="'.$bibentry->getField('url').'"> [file] </a><br/>';
              echo '</td>';
              echo '</tr>';
            }
          ?>
          </table>
        </div>        

        <!-- --------------------------------------------- -->
        <!-- PhP: Generate Files array from material.csv -->
        <!-- --------------------------------------------- -->     
        <?php
          $presentations = array();
          $miscs = array();
          if (($handle = fopen("../data/material.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
              $record = array(
              "Category" => $data[0],
              "Title" => $data[1],
              "Type" => $data[2],
              "ShortDesc" => $data[3],
              "Date" => $data[4],
              "Wip" => $data[5],
              "Conference" => $data[6],
              "Place" => $data[7],
              "UrlFile" => $data[8],
              "UrlPlace" => $data[9],            
              );
            if(strcmp($record["Category"],"Presentation")==0)
              array_push($presentations,$record);
            else if(strcmp($record["Category"],"Misc")==0)
              array_push($miscs,$record);
          }
          fclose($handle);
        }
        ?>

        <!-- --------------------------------------------- -->
        <!-- PhP: Antichronological reordering             -->
        <!-- --------------------------------------------- -->     
        <?php
          // Antichronological Reorder - sloppy solution
          // Reordering functions (expect an array of arrays of maps with the key "Date")
          function myReordering($MyList) {
            $dates = array_column($MyList, 'Date');
            array_walk_recursive($dates, function(&$element) {
              // notice: this will use the date of today and add the time to it.
              $element= str_replace('/', '-',$element);
              $element = strtotime($element);
              // $element = strtotime($element, 0); // use 1.1.1970 as current date
            });
            array_multisort($dates, SORT_DESC, $MyList);
            return $MyList;
          }

          $presentations=myReordering($presentations);
          $miscs=myReordering($miscs);
        ?>


        <!-- --------------------------------------------- -->
        <!-- Slides and Posters -->
        <!-- --------------------------------------------- -->        
        <div class="sec">
          <div class="sec-title">Presentations</div>
           <table class="list">
		        <tbody>
              <?php if (count($presentations) > 0): ?>
                <?php foreach ($presentations as $row): array_map('htmlentities', $row); ?>
                  <tr>
                  <?php
                    echo '<td class="left"><b>'.date('M Y',strtotime(str_replace('/', '-',$row["Date"]))).'</b></td>';
                    echo '<td class="right">';
                    echo '<b>'.$row["Title"].'.</b><br>';
                    echo ' '.$row["Type"]." @ ";
                    echo ' <a href="'.$row["UrlPlace"].'">'.$row["Conference"].', '.$row["Place"].'</a>.';
                    echo '&emsp; <a href="'.$row["UrlFile"].'"> [<i class="fa fa-file-pdf-o fa-fw"></i>Slides]</a><br/>';
                    echo '</td>';
                  ?>
                  </tr>
                <?php endforeach; ?>
              <?php endif;?>
            </tbody>
	        </table>
        </div>

        <!-- --------------------------------------------- -->
        <!-- Notes Codes and Misc -->
        <!-- --------------------------------------------- -->       
        <div class="sec">
          <div class="sec-title">Miscs</div>
          <table class="list">
		        <tbody>
              <?php if (count($miscs) > 0): ?>
                <?php foreach ($miscs as $row): array_map('htmlentities', $row); ?>
                  <tr>
                  <?php
                    echo '<td class="left"><b>'.date('M Y',strtotime(str_replace('/', '-',$row["Date"]))).'</b></td>';
                    echo '<td class="right">';
                    echo '<b>'.$row["Title"].'.</b>';
                    if ($row["Wip"]==1)
                      echo " (WIP)";
                    echo "<br>";
                    echo ' '.$row["ShortDesc"].". ";
                    echo '&emsp; <a href="'.$row["UrlFile"].'"> [<i class="fa fa-book fa-fw"></i>'.$row["Type"].']</a><br/>';
                    echo '</td>';
                  ?>
                  </tr>
                <?php endforeach; ?>
              <?php endif;?>
            </tbody>
	        </table>
        </div>

    <!-- --------------------------------------------- -->
    <!-- Footer -->
    <!-- --------------------------------------------- -->          
    <footer>
      <br>
      <br>
      <br>      
      <div style="text-align:right;font-size: xx-small;opacity: 0.6;" class="poweredby">
        <!-- If you like bibtexbrowser, thanks to keep the link :-) -->
        Powered by <a href="http://www.monperrus.net/martin/bibtexbrowser/">bibtexbrowser</a><br>

        <?php
          $val = max(filemtime("data/activities.csv"),filemtime("data/material.csv"),filemtime("index.php"),filemtime("stuff/index.php"));
          echo "Last update: ".date("F d Y H:i:s.",$val); 
        ?>
        <br>

        Copyright &copy;2016<script>new Date().getFullYear()>2016&&document.write("-"+new Date().getFullYear());</script>,
        &emsp; Italsing srl. &emsp;  All Rights Reserved.
      </div>

    </footer>
  </body>
</html>