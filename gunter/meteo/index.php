<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="../../img/terminal.ico" type="image/x-icon">
<link rel="icon" href="../../img/terminal.ico" type="image/x-icon">
<head>
    <title>34st3r-3ggs</title>
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
                <a class="navbar-brand" href="../../">M4st3r-T0n1nus</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">CLICK ME!!!<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../eliminata.html">Eliminata</a></li>
                            <li><a href="../h4x0rs.html">Template</a></li>
                            <li><a href="../facciata.php">Protocollo Facciata</a></li>
                            <li><a href="./">Meteo</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Photo Gallery</li>
                            <li><a href="../gallery.php#fototrappla">Fototrappola</a></li>
                            <li><a href="../gallery.php#gamingrig">Gaming rig</a></li>
                            <li><a href="../gallery.php#maker">Maker</a></li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="../"><i class="fa fa-1x fa-terminal"></i></a>
                    </li>
                    <li>
                        <a href="../../"><i class="fa fa-1x fa-home"></i></a>
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
                <h1>Stazioni</h1>
                <hr>
            </div>
        </div>
   
        <div class="row">
            <div class="col-md-12">
                <h3>Stazione Meteo 1</h3>
                <ul class="nav nav-tabs">
                    <li class="active"><a aria-expanded="true" href="#home" data-toggle="tab">Home</a></li>
                    <li class=""><a aria-expanded="false" href="#dati" data-toggle="tab">Dati</a></li>
                    <li class="dropdown">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">Funzionamento <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#dropdown1" data-toggle="tab">Arduino</a></li>
                            <li class="divider"></li>
                            <li><a href="#dropdown2" data-toggle="tab">IFTT</a></li>
                            <li class="divider"></li>
                            <li><a href="#dropdown3" data-toggle="tab">Google Sheet</a></li>
                            <li class="divider"></li>
                            <li><a href="#dropdown4" data-toggle="tab">Php</a></li>                    
                            <li><a href="#dropdown5" data-toggle="tab">Upgrade</a></li>       
                        </ul>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <p>
                            Stazione 1, posizione e immagini
                        </p>
                    </div>
                    <div class="tab-pane fade" id="dati">
                        <table class="table table-striped table-hover ">
                            <tbody>
                                <?php
                                $url = 'https://script.google.com/macros/s/AKfycbz3fBg448sdNGt4EtQ-t4J9wds2h62Pk_l558-KyAAzCcrxN8M/exec';
                                $csv = file_get_contents($url);
                                $data = str_getcsv($csv);
                                echo "<tr>";
                                echo "<td>Date</td><td>".$data[0]."</td>";
                                echo "<td>Year</td><td>".$data[1]."</td>";
                                echo "<td>Time</td><td>".$data[2]."</td>";
                                echo "<td>External Temperature</td><td>".$data[3]." °C</td>";
                                echo "<td>Internal Temperature</td><td>".$data[4]." °C</td>";
                                echo "<td>Humidity</td><td>".$data[5]." %</td>";                    
                                echo "<td>Pression</td><td>".$data[6]." mBar</td>";
                                echo "</tr>";
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="dropdown1">
                        <p>
                            <strong>Arduino:</strong>
                                Creare uno sketch di arduino con una sola variable "cloud" contentente la stringa dei valori "ext,int,hum,pres"
                        </p>
                    </div>
                    <div class="tab-pane fade" id="dropdown2">
                        <p>
                            <strong>IFTT:</strong>
                                Creare un job che prende il webhook di arduino e aggiorna la prima cella della tabella Rawdata (appende all'inizio anche la data associata)
                        </p>
                    </div>
                    <div class="tab-pane fade" id="dropdown3">
                        <p>
                            <strong>Google sheet script:</strong>
                                doGet della prima cella in html (magari cambia formato della data?)
                                , deploy come webapp
                        </p>
                    </div>
                    <div class="tab-pane fade" id="dropdown4">
                        <p>
                            <strong>Webpage PHP:</strong>
                                legge l'indirizzo associato al deployment come un file, parsa il csv e  lo mostra in una tabella
                        </p>
                    </div>
                    <div class="tab-pane fade" id="dropdown5">
                        <p>
                            <strong>Todo:</strong>
                            Attualmente non c'e' modo di farlo senza IFTT. 
                            L'idea piu' accreditata era di usare google script per leggere il webhook di arduino iot e scrivere i dati in un google sheet,
                            poi embed del google sheet
                            <br>
                            il problema è che la guida per il primo passo non funziona! 
                            <a href="https://create.arduino.cc/projecthub/Arduino_Genuino/arduino-iot-cloud-google-sheets-integration-71b6bc">(link)</a>
                        </p>
                    </div>
                </div>
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
