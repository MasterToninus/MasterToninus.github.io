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
            Dashboard dei dati misurati con arduino, raspberry etc.    
        </div>

        <!-- ================================================= -->
        <!-- Contents -->
        <!-- ================================================= -->  
        <div class="row tall-row">
            <div class="col-lg-12">
                <h1>Stazioni Meteo 1</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Dati</h3>
                <table class="table table-striped table-hover ">
                    <tbody>
                        <?php
                        $url = 'https://script.google.com/macros/s/AKfycbz3fBg448sdNGt4EtQ-t4J9wds2h62Pk_l558-KyAAzCcrxN8M/exec';
                        $csv = file_get_contents($url);
                        $data = str_getcsv($csv);
                        echo "<tr><td>Time</td><td>".$data[2]."</td></tr>";
                        echo "<tr><td>Date</td><td>".$data[0]."</td></tr>";
                        echo "<tr><td>Year</td><td>".$data[1]."</td></tr>";
                        echo "<tr><td>External Temperature</td><td>".$data[3]." °C</td></tr>";
                        echo "<tr><td>Internal Temperature</td><td>".$data[4]." °C</td></tr>";
                        echo "<tr><td>Humidity</td><td>".$data[5]." %</td></tr>";                    
                        echo "<tr><td>Pression</td><td>".$data[6]." mBar</td></tr>";
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <li class="active"><a aria-expanded="true" href="#home1" data-toggle="tab">Immagini</a></li>
                    <li class="tab"><a aria-expanded="false" href="#info1" data-toggle="tab">Info</a></li>
                    <li class="tab"><a aria-expanded="false" href="#pos1" data-toggle="tab">Posizione</a></li>
                    <li class=""><a aria-expanded="false" href="#howto1" data-toggle="tab">Funzionamento</a></li>
                    <li class=""><a aria-expanded="false" href="#todo1" data-toggle="tab">Todo</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="home1">
                        <script src="https://cdn.jsdelivr.net/npm/publicalbum@latest/embed-ui.min.js" async></script>
                        <div class="pa-gallery-player-widget" style="width:100%; height:300px; display:none;"
                        data-link="https://photos.app.goo.gl/pVLxtVT6q1gN1XUy7"
                        data-title="Arduino - Opla - Meteo "
                        data-description="5 new items · Album by Spettro di Toninus">
                            <object data="https://lh3.googleusercontent.com/iea5DTNq1_cgevVgJpxAo1POoNx9sgpE9BGGAEdM8rfBFeDROsMojVmsYYIt9VP7rFEspcjY2fLgv58abVDNjEEElmvH6i_hIEjevR8FUGQkdHTBU31hw8Qm91vBqquu2kUddXMqOdg=w1920-h1080"></object>
                            <object data="https://lh3.googleusercontent.com/CpzZ8g4WcJ2a8mJ5NfuIaz0Zf6r2bkKRzafCnhR5hyC4klyYu7IFWA9iZgTzStkRkfPeZRG3Ni2_WU5_N-QVz06EtbMSTtVAl3-wU8oBXIMxLuY8vuhS_4hf_PQQcqb0NdnaQE7bTJQ=w1920-h1080"></object>
                            <object data="https://lh3.googleusercontent.com/98unD7Gbr8I4cyOlJ7y1-tMoTp4YpNNvwudEXn1FbTz88uHRMOKoTQwfgJblAmuEPINNpUqDH9btaGm_-2VwPxVrIkh2E4llbTW0dAz_sQsQIVLnZHA0CYHCb8YBjBL8Mrla2QDrBrE=w1920-h1080"></object>
                            <object data="https://lh3.googleusercontent.com/L4AWF7mh_B7q3PlgRsJPdh-vOrAOUBcMH_I7mC9FRm1dgr4Zqz0ziLGU7BwJXuSNAUKHpo49JOuRRRZn44WEFVwtvcrR69Nc_eIDqYqRVbHHXu4wrK9EvSBIvYqk9evDjv-jKS_xSwo=w1920-h1080"></object>
                            <object data="https://lh3.googleusercontent.com/fqKB4ZhygEcTRM8QdLNLuFWZEDy9j5qQsCdMZgCzYPTvOj5hv0Hm5SBnDY1RBdiFCSKQUO1SLYhJc5mishjhA1agu_Vk-YWTuVWSG4qCwj1g7ytZZgOFJnWxD-0Nj8lKhR6UdE2iTTo=w1920-h1080"></object>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="info1">
                        <ol type = "1">
                            <li><strong>Data Creazione:</strong>
                                Gennaio 2022;
                            </li>
                            <li>
                                <strong>Materiali:</strong>
                                <ol type = "2">
                                    <li> 
                                        <a href="https://opla.arduino.cc/">Arduino Opla'</a>;
                                    </li>
                                    <li>
                                        <a href="https://www.amazon.it/AZDelivery-digitale-temperatura-impermeabile-Raspberry/dp/B07CZ1G29V?pd_rd_w=6y8g7&pf_rd_p=769960df-a4d6-46c4-915c-a6d8016f230d&pf_rd_r=Q9TGW9QEDFCF3726YMZS&pd_rd_r=144c5020-0a5a-43d9-bc22-d648548638cd&pd_rd_wg=G3Gna&pd_rd_i=B07CZ1G29V&psc=1&ref_=pd_bap_d_rp_1_t">Sonda DS18B20</a>;
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </div>                    
                    <div class="tab-pane fade" id="pos1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.6779479762627!2d9.332089835319529!3d45.536685991714066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x159bfb807b5cbcfa!2zNDXCsDMyJzEyLjEiTiA5wrAyMCcwMC41IkU!5e0!3m2!1sit!2sit!4v1649271898516!5m2!1sit!2sit" width="300px" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="tab-pane fade" id="howto1">
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
                    </div>
                    <div class="tab-pane fade" id="todo1">
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
