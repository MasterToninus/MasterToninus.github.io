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
          <h1>Resume</h1> 
        </div>




        <!-- --------------------------------------------- -->
        <!-- Resume -->
        <!-- --------------------------------------------- -->
        <div id="introduction">
          <div id="desc">   
            <p class="lead">
              Autogenerated list of scientific activities.

              (<a href="https://www.dropbox.com/scl/fi/fy1xy3re0xixm8ejwhitt/cv.pdf?rlkey=jtdw6jw8bmh3ctr7u0xwj0kzh&dl=0" class="btn btn-default btn-lg"><i class="fa fa-file-pdf-o fa-fw"></i> <span class="network-name">CV</span></a>)
            </p>          
          </div>          
          <div id="photo">
            <img src="../img/underconstruction-bg.jpg" alt="Work in progress">
          </div>          
        </div>

        <!-- --------------------------------------------- -->
        <!-- Work Experiences -->
        <!-- --------------------------------------------- -->        
        <div class="sec" id="cv">
          <div class="sec-title">Academic resume </div>
          <table class="list">
          <tr>
              <td class="left"> <b>2022 - 2024</b></td>
              <td class="right">Postdoctoral fellow @ <a href="https://dipartimenti.unicatt.it/dmf">UCSC</a></td>
            </tr>            
            <tr>
              <td class="left"> <b>2021 - 2022</b></td>
              <td class="right">Postdoctoral fellow @ <a href="https://www.mpim-bonn.mpg.de/">MPIM</a></td>
            </tr>
            <tr>
              <td class="left"> <b>2017 - 2021</b></td>
              <td class="right">Ph.D. in Science: Mathematics @ <a href="http://scuoledidottorato.unicatt.it/phdschools/science-home#content">UCSC Brescia</a> & <a target="_blank" href="https://wis.kuleuven.be/english">KU Leuven</a></td>
            </tr>
            <tr>
              <td class="left"> <b>2013 - 2015</b></td>
              <td class="right">M.Sc. in Theoretical Physics @ <a href="https://www.unimi.it/en/education/physics-0">UNIMI</a></td>
            </tr>
            <tr>
              <td class="left"> <b>2010 - 2013</b></td>
              <td class="right">Master's student in Physics @ <a href="http://www.unimib.it/go/102/Home/English">UNIMIB</a></td>
            </tr>
            <tr>
              <td class="left"> <b>2005 - 2010</b></td>
              <td class="right">B.Sc. in Physics @ <a href="http://www.unimib.it/go/102/Home/English">UNIMIB</a></td>
            </tr>       
          </table>
        </div>

        <div class="sec" id="cv">
          <div class="sec-title">Work experiences </div>
          <table class="list">     
            <tr>
              <td class="left"> <b>Mar 2016 - Jul 2016</b></td>
              <td class="right">Internship in Java Programming @ <a href="http://www.csttech.it/">CST</a></td>       
            </tr>
            <tr>            
              <td class="left"> <b>May 2014 - Feb 2015</b></td>
              <td class="right">Student collaboration @ <a href="https://lcm.mi.infn.it/">LCM</a></td>    
            </tr>            
          </table>
        </div>    
 

        <!-- --------------------------------------------- -->
        <!-- PhP: Activities Lists-->
        <!-- --------------------------------------------- -->
            <?php
                  //Generate a table of all activities
                  $confereces_types = array('Workshop', 'Conference','School','Seminars');
                  $conferences = array();             
                  $course_types = array('Training Course', 'Ph.D. Course', 'Master Course','Reading Course','Industry Course');
                  $course = array();
                  $talk_types = array('Contributed Talk', 'Invited Talk','Poster');
                  $talk = array();
                  $teaching = array();
                  $misc = array();
                  if (($handle = fopen("../data/activities.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                        //Create Record
                        $record = array(
                          "Event_Title" => $data[1],
                          "Type" => $data[2],
                          "Organization" => $data[3],
                          "Location" => $data[4],
                          "Country" => $data[5],
                          "Approx_Date" => $data[6],
                          "End_Date" => $data[8],
                          "Url" => $data[10],
                          "Tbc" => $data[11]
                        );
                        if (in_array($data[2], $confereces_types))
                          array_push($conferences,$record);
                        else if (in_array($data[2], $talk_types))
                          array_push($talk,$record);
                        else if (in_array($data[2], $course_types))
                          array_push($course,$record); 
                        else if ($data[2]=='Teaching')
                          array_push($teaching,$record);                                                
                        else
                          if ($data[1]!=="Event_Title")
                            array_push($misc,$record);                    
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
            $dates = array_column($MyList, 'End_Date');
            array_walk_recursive($dates, function(&$element) {
              // notice: this will use the date of today and add the time to it.
              $element= str_replace('/', '-',$element);
              $element = strtotime($element);
              // $element = strtotime($element, 0); // use 1.1.1970 as current date
            });
            array_multisort($dates, SORT_DESC, $MyList);
            return $MyList;
          }

          $teaching=myReordering($teaching);
          $conferences=myReordering($conferences);
          $course=myReordering($course);
          $talk=myReordering($talk);          
          $misc=myReordering($misc);
        ?>

          <!-- --------------------------------------------- -->
          <!-- Teaching -->
          <!-- --------------------------------------------- -->          
          <div class="sec">  
            <div class="sec-title">Teaching</div>
            <?php if (count($talk) > 0): ?>
              <table class="list">
                <tbody>
                <?php foreach ($teaching as $row): array_map('htmlentities', $row); ?>
                  <tr>
                    <?php
                      if($row["Tbc"]==1){
                        echo '<td class="left"> <font color="gray"><em><b>' .  $row["Approx_Date"] . "</b></em></font></td>";
                        echo '<td class="right">';
                        echo '<em><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>';
                        echo '&emsp; &emsp; <a href="https://en.wikipedia.org/wiki/To_be_announced">(tbc)</a><br>';
                        echo ' <font color="gray">'.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.</font>';
                      }
                      else {
                        echo '<td class="left"> <b>' .  $row["Approx_Date"] . "</b></td>";
                        echo '<td class="right">';
                        echo '<b><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>.</b><br>';
                        echo ' '.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.';  
                      }
                    ?>
                    </tr>                        
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php else:?>
                <tr>
                    <td class="left"> <b> - </b></td>
                    <td>
                    <td>
                    <td class="right">TBA</td>   
                </tr>
            <?php endif;?>
            </table>
          </div>

          <!-- --------------------------------------------- -->
          <!-- Talks -->
          <!-- --------------------------------------------- -->          
          <div class="sec"> 
            <div class="sec-title">Talks</div>
            <?php if (count($talk) > 0): ?>
              <table class="list">
                <tbody>
                <?php foreach ($talk as $row): array_map('htmlentities', $row); ?>
                  <tr>
                    <?php
                      if($row["Tbc"]==1){
                        echo '<td class="left"> <font color="gray"><em><b>' .  $row["Approx_Date"] . "</b></em></font></td>";
                        echo '<td class="right">';
                        echo '<em><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>';
                        echo '&emsp; &emsp; <a href="https://en.wikipedia.org/wiki/To_be_announced">(tbc)</a><br>';
                        echo ' <font color="gray">'.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.</font>';
                      }
                      else {
                        echo '<td class="left"> <b>' .  $row["Approx_Date"] . "</b></td>";
                        echo '<td class="right">';
                        echo '<b><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>.</b><br>';
                        echo ' '.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.';  
                      }
                    ?>
                    </tr>                        
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php else:?>
                <tr>
                    <td class="left"> <b> - </b></td>
                    <td>
                    <td>
                    <td class="right">TBA</td>   
                </tr>
              <?php endif;?>
            </table>
          </div>



          <!-- --------------------------------------------- -->
          <!-- Courses -->
          <!-- --------------------------------------------- -->    
          <div class="sec">       
            <div class="sec-title">Training Courses</div>
            <?php if (count($course) > 0): ?>
              <table class="list">
                <tbody>
                <?php foreach ($course as $row): array_map('htmlentities', $row); ?>
                  <tr>
                    <?php
                      if($row["Tbc"]==1){
                        echo '<td class="left"> <font color="gray"><em><b>' .  $row["Approx_Date"] . "</b></em></font></td>";
                        echo '<td class="right">';
                        echo '<em><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>';
                        echo '&emsp; &emsp; <a href="https://en.wikipedia.org/wiki/To_be_announced">(tbc)</a><br>';
                        echo ' <font color="gray">'.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.</font>';
                      }
                      else {
                        echo '<td class="left"> <b>' .  $row["Approx_Date"] . "</b></td>";
                        echo '<td class="right">';
                        echo '<b><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>.</b><br>';
                        echo ' '.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.';  
                      }
                    ?>
                    </tr>                        
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php else:?>
                <tr>
                    <td class="left"> <b> - </b></td>
                    <td>
                    <td>
                    <td class="right">TBA</td>   
                </tr>
              <?php endif;?>
            </table>
          </div>


          <!-- --------------------------------------------- -->
          <!-- Conferences -->
          <!-- --------------------------------------------- -->          
          <div class="sec"> 
            <div class="sec-title">School and Conferences</div>
              <?php if (count($conferences) > 0): ?>
                <table class="list">
                  <tbody>
                  <?php foreach ($conferences as $row): array_map('htmlentities', $row); ?>
                    <tr>
                      <?php
                        if($row["Tbc"]==1){
                          echo '<td class="left"> <font color="gray"><em><b>' .  $row["Approx_Date"] . "</b></em></font></td>";
                          echo '<td class="right">';
                          echo '<em><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>';
                          echo '&emsp; &emsp; <a href="https://en.wikipedia.org/wiki/To_be_announced">(tbc)</a><br>';
                          echo ' <font color="gray">'.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.</font>';
                        }
                        else {
                          echo '<td class="left"> <b>' .  $row["Approx_Date"] . "</b></td>";
                          echo '<td class="right">';
                          echo '<b><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>.</b><br>';
                          echo ' '.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.';  
                        }
                      ?>
                      </tr>                        
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  <?php else:?>
                  <tr>
                      <td class="left"> <b> - </b></td>
                      <td>
                      <td>
                      <td class="right">TBA</td>   
                  </tr>
                <?php endif;?>
              </table>
          </div>

          <!-- --------------------------------------------- -->
          <!-- Misc -->
          <!-- --------------------------------------------- -->          
          <div class="sec"> 
            <div class="sec-title">Uncategorized</div>
              <?php if (count($misc) > 0): ?>
              <table class="list">
                  <tbody>
                  <?php foreach ($misc as $row): array_map('htmlentities', $row); ?>
                    <tr>
                      <?php
                        if($row["Tbc"]==1){
                          echo '<td class="left"> <font color="gray"><em><b>' .  $row["Approx_Date"] . "</b></em></font></td>";
                          echo '<td class="right">';
                          echo '<em><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>';
                          echo '&emsp; &emsp; <a href="https://en.wikipedia.org/wiki/To_be_announced">(tbc)</a><br>';
                          echo ' <font color="gray">'.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.</font>';
                        }
                        else {
                          echo '<td class="left"> <b>' .  $row["Approx_Date"] . "</b></td>";
                          echo '<td class="right">';
                          echo '<b><a href=' . $row["Url"] . ">" . $row["Event_Title"] . '</a>.</b><br>';
                          echo ' '.$row["Type"]." @ ". $row["Organization"].', '. $row["Location"].'.';  
                        }
                      ?>
                      </tr>                        
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  <?php else:?>
                  <tr>
                      <td class="left"> <b> - </b></td>
                      <td>
                      <td>
                      <td class="right">TBA</td>   
                  </tr>
                <?php endif;?>
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
              $val = max(filemtime("data/activities.csv"),filemtime("data/material.csv"),filemtime("index.php"),filemtime("stuff/index.php"));
              echo "Last update: ".date("F d Y H:i:s.",$val); 
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