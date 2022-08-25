<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="../../img/terminal.ico" type="image/x-icon">
<link rel="icon" href="../../img/terminal.ico" type="image/x-icon">
<head>
    <title>34st3r-3ggs: Foglie Sparse</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../src/hacker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/bitwise" rel="stylesheet">

    <style>
    .tall-row {
        margin-top: 40px;
    }
    .modal {
        position: relative;
        top: auto;
        right: auto;
        left: auto;
        bottom: auto;
        z-index: 1;
        display: block;
    }
    </style>
</head>

<body>

<!-- ================================================= -->
<!-- TITLE - NAVABAR -->
<!-- ================================================= -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../">
                    <i class="fa fa-1x fa-terminal"></i> 
                    M4st3r-T0n1nus
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../eliminata.html">Eliminata</a></li>
                            <li><a href="../h4x0rs.html">Template</a></li>
                            <li><a href="../facciata.php">Protocollo Facciata</a></li>
                            <li><a href="../meteo">Meteo</a></li>
                            <li><a href="../gallery/index.html#fototrappla">Photo Gallery</a></li>            
                        </ul>
                    </li>
                    <li>
                        <a href="../"><i class="fa fa-1x fa-home"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<!-- ================================================= -->
<!-- Contents -->
<!-- ================================================= -->    
    <div class="container">

        <!-- ================================================= -->
        <!-- JUMBOTRON -->
        <!-- ================================================= -->  
        <div class="jumbotron">
            <h1>Foglie Sparse</h1>
            Conversione del libro di nonno Michele.
        </div>


        <?php
            $fileArray = array();
            foreach (new DirectoryIterator('./Capitoli') as $fileInfo) {
                if($fileInfo->isDot()) continue;
                $fileName = $fileInfo->getFilename();
                $fileName = substr($fileName, 0, strpos($fileName, "."));
                $fileKey = substr($fileName, 0, strpos($fileName, "_"));
                $fileName = substr($fileName, strpos($fileName, "_") + 1); 
                $fileArray[$fileKey] = $fileName;
            }
        ?>

        <!-- ================================================= -->
        <!-- Index -->
        <!-- ================================================= -->  

        <div class="row">
            <div class="col-lg-6">
                <video width="320" height="240" controls>
                    <source src="movie.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-lg-6">
                
                <?php
                    ksort($fileArray);
                    foreach ($fileArray as $key => $val) {
                        echo '<a href="#Cap_'.$key.'">';
                        echo "$key = $val";
                        echo '</a><br>';
                    }
                ?>            
            </div>
        </div>        

        <!-- ================================================= -->
        <!-- Contents -->
        <!-- ================================================= -->         
        <?php
            require_once('../Parsedown.php');
            foreach ($fileArray as $key => $val) {
                $filename = $key.'_'.$val.'.md';
                echo '<div class="row tall-row">';
                echo '<a name="Cap_'.$key.'">'; 
                echo '</a>';
                echo '<div class="-lg-12">';    
                $file = file_get_contents('./Capitoli/'.$filename);
                $Parsedown = new Parsedown();
                echo $Parsedown->text($file); 
                echo '</div>'; 
                echo '</div>';
            }
        ?>




        <!-- ================================================= -->
        <!-- Footer -->
        <!-- ================================================= -->            
        <div class="row tall-row">
            <div class="col-md-12">
                <p>Powered by <a href="https://github.com/Bachittarjeet/Hacker-Bootstrap-Template/" role="button">Hacker-Bootstrap-Template</a>. &copy; 2019</p>
                <p>Powered by <a href="https://github.com/erusev/parsedown" role="button">Parsedown</a>. &copy; 2021</p>
            </div>
        </div>

    </div>


    <!-- ================================================= -->
    <!-- ??? -->
    <!-- ================================================= -->            
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Github stars script -->
    <script>
    $(document).ready(function(){
        $.getJSON("https://api.github.com/repos/Bachittarjeet/Hacker-Bootstrap-Template/", function(data){
            var stars = data['stargazers_count'];
            $("#stars").text(stars + " stars");
        });
    });
    </script>

    
</body>
</html>