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
            <h1>Meteo</h1>
            Dashboard dei dati misurati con il mio arduino oplà.            
        </div>

        <!-- ================================================= -->
        <!-- Contents -->
        <!-- ================================================= -->  
        <div class="row tall-row">
            <div class="col-lg-12">
                <h1>TODO</h1>
                <hr>
                Attualmente non c'e' modo di farlo. 
                L'idea piu' accreditata era di usare google script per leggere il webhook di arduino iot e scrivere i dati in un google sheet,
                poi embed del google sheet
                <br>
                il problema è che la guida per il primo passo non funziona! 
                <a href="https://create.arduino.cc/projecthub/Arduino_Genuino/arduino-iot-cloud-google-sheets-integration-71b6bc">(link)</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h1>Heading 1</h1>
                <h2>Heading 2</h2>
                <h3>Heading 3</h3>
                <h4>Heading 4</h4>
                <h5>idea</h5>
                <ol type = "1">
                    <li><strong>Arduino:</strong>
                        Creare uno sketch di arduino con una sola variable "cloud" contentente la stringa dei valori "ext,int,hum,pres"
                    </li>
                    <li>
                        <strong>IFTT:</strong>
                        Creare un job che prende il webhook di arduino e aggiorna la prima cella della tabella Rawdata (appende all'inizio anche la data associata)
                    </li>
                    <li><strong>Google sheet script:</strong>
                        doGet della prima cella in html (magari cambia formato della data?)
                        , deploy come webapp
                    </li>
                    <li><strong>Webpage PHP:</strong>
                        legge l'indirizzo associato al deployment come un file, parsa il csv e  lo mostra in una tabella
                    </li>
                </ol>

                <h6>Primo Test</h6>
                <?php
                    $url = 'https://script.google.com/macros/s/AKfycbz3fBg448sdNGt4EtQ-t4J9wds2h62Pk_l558-KyAAzCcrxN8M/exec';
                    $csv = file_get_contents($url);
                    $data = str_getcsv($csv);
                    
                    echo "Date = ".$data[0]."<br>";
                    echo "Year = ".$data[1]."<br>";
                    echo "Time = ".$data[2]."<br>";
                    echo "External Temperature = ".$data[3]." °C <br>";
                    echo "Internal Temperature  = ".$data[4]." °C<br>";
                    echo "Humidity = ".$data[5]." % <br>";                    
                    echo "Pression = ".$data[6]." mBar <br>";
                ?>


            </div>
        </div>        


        <!-- ================================================= -->
        <!-- Footer -->
        <!-- ================================================= -->            
        <div class="row tall-row">
            <div class="col-md-12">
                <p>Powered by <a href="//github.com/Bachittarjeet/Hacker-Bootstrap-Template/" role="button">Hacker-Bootstrap-Template</a>. &copy; 2019</p>
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
