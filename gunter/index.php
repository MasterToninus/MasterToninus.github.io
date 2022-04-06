<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="../img/terminal.ico" type="image/x-icon">
<link rel="icon" href="../img/terminal.ico" type="image/x-icon">
<head>
    <title>34st3r-3ggs</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../src/hacker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/bitwise" rel="stylesheet">    
    <!-- Font: revenge of the nerds -->

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
                <a class="navbar-brand" href="../">M4st3r-T0n1nus</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">CLICK ME!!!<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="./eliminata.html">Eliminata</a></li>
                            <li><a href="./h4x0rs.html">Template</a></li>
                            <li><a href="./facciata.php">Protocollo Facciata</a></li>
                            <li><a href="./meteo/">Meteo</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Photo Gallery</li>
                            <li><a href="./gallery.php#fototrappla">Fototrappola</a></li>
                            <li><a href="./gallery.php#gamingrig">Gaming rig</a></li>
                            <li><a href="./gallery.php#maker">Maker</a></li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="./"><i class="fa fa-1x fa-terminal"></i></a>
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
            <h1>
                <a href="https://en.wikipedia.org/wiki/Easter_egg_(media)">34ST3r-3GGS</a>
            </h1>
            <h3>
              Welcome <a href="https://readyplayerone.fandom.com/wiki/Gunter ">Gunt3r</a>
            </h3>
            <p>
              Contenuti e funzionalità non adatti ad essere facilmente reperibili dal mio sito internet "accademico".
            </p>            
        </div>


        <!-- ================================================= -->
        <!-- MEnu -->
        <!-- ================================================= -->         
        <div class="row tall-row">
            <div class="col-lg-12">
                <h1>Menu</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="list-group">
                    <a href="./eliminata.html" class="list-group-item">
                        <h4 class="list-group-item-heading">3l1m1n4t4</h4>
                        <p class="list-group-item-text">
                            Sezioni eliminate dalla vecchia versione del sito    
                        </p>
                    </a>
                    <a href="../data/" class="list-group-item">
                        <h4 class="list-group-item-heading">Php generated Resume</h4>
                        <p class="list-group-item-text">
                        - CSV Viewer -       
                        </p>
                    </a>
                    <a href="./facciata.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Protocollo facciata</h4>
                        <p class="list-group-item-text">
                         Cosa fare per aggiornare in modo consistente tutti i profili?
                        </p>
                    </a>                    
                    <a href="./meteo/" class="list-group-item">
                        <h4 class="list-group-item-heading">Centraline Meteo</h4>
                        <p class="list-group-item-text">
                            Dati diretti dai miei sensori       
                        </p>
                    </a>
                    <a href="./gallery.php" class="list-group-item">
                        <h4 class="list-group-item-heading">Photo gallery</h4>
                        <p class="list-group-item-text">
                            Raccolta foto Varie                            
                        </p>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-responsive" src="https://darrenkearney.me/wp-content/uploads/2015/07/example_use4.gif" alt="Picture, work in progress.">
            </div>
        </div>

        
        <!-- ================================================= -->
        <!-- TEMPLATE -->
        <!-- ================================================= -->         

        <!-- ================================================= -->
        <!-- Contents -->
        <!-- ================================================= -->         
        <div class="row tall-row">
            

        <?php 
            require_once('Parsedown.php');
            $file = file_get_contents('link-utili.md');
            $Parsedown = new Parsedown();
            echo '<div class="col-md-5">';        
            echo $Parsedown->text($file); 
            echo '</div>';
            echo '<div class="col-md-1"></div>';
            $file = file_get_contents('todo-facciata.md');
            echo '<div class="col-md-6">';        
            /*echo $Parsedown->text($file); */
            echo '</div>';                             
        ?>
            
        </div>


       


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
