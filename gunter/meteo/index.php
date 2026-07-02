<?php
require_once __DIR__ . '/../src/gunter.php';

gunter_head('34st3r-3ggs: M3T30', '../');
gunter_navbar('../', 'meteo');
?>

    <div class="container">

        <!-- ================================================= -->
        <!-- JUMBOTRON -->
        <!-- ================================================= -->  
        <div class="jumbotron">
            <h1>Stazioni Meteo</h1>
            Dashboard dei dati misurati con arduino, raspberry etc.    
        </div>

        <!-- ================================================= -->
        <!-- Contents -->
        <!-- ================================================= -->  
        <div class="row tall-row">
            <div class="col-lg-12">
                <h1>Casa</h1>
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
                        $csv = @file_get_contents($url);
                        $data = $csv !== false ? str_getcsv($csv) : [];

                        if (count($data) >= 7) {
                            echo '<tr><td>Time</td><td>' . gunter_h($data[2]) . '</td></tr>';
                            echo '<tr><td>Date</td><td>' . gunter_h($data[0]) . '</td></tr>';
                            echo '<tr><td>Year</td><td>' . gunter_h($data[1]) . '</td></tr>';
                            echo '<tr><td>External Temperature</td><td>' . gunter_h($data[3]) . ' °C</td></tr>';
                            echo '<tr><td>Internal Temperature</td><td>' . gunter_h($data[4]) . ' °C</td></tr>';
                            echo '<tr><td>Humidity</td><td>' . gunter_h($data[5]) . ' %</td></tr>';
                            echo '<tr><td>Pressure</td><td>' . gunter_h($data[6]) . ' mBar</td></tr>';
                        } else {
                            echo '<tr><td colspan="2"><em>Dati non disponibili.</em></td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <li class="active"><a aria-expanded="true" href="#home1" data-toggle="tab">Immagini</a></li>
                    <li class="tab"><a aria-expanded="false" href="#pos1" data-toggle="tab">Posizione</a></li>
                    <li class="dropdown">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">Info<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#dropdown1" data-toggle="tab">Info</a></li>
                            <li class="divider"></li>
                            <li><a href="#dropdown2" data-toggle="tab">Funzionamento</a></li>
                            <li><a href="#dropdown3" data-toggle="tab">Todo</a></li>
                        </ul>
                    </li>
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
                    <div class="tab-pane fade" id="pos1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2794.6779479762627!2d9.332089835319529!3d45.536685991714066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x159bfb807b5cbcfa!2zNDXCsDMyJzEyLjEiTiA5wrAyMCcwMC41IkU!5e0!3m2!1sit!2sit!4v1649271898516!5m2!1sit!2sit" width="300px" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="tab-pane fade" id="dropdown1">
                        <h4>Info</h4>
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
                    <div class="tab-pane fade" id="dropdown2">
                        <h4>Funzionamento</h4>
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
                    <div class="tab-pane fade" id="dropdown3">
                        <h4>Todo:</h4>
                        <p>
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


        <div class="row tall-row">
            <div class="col-lg-12">
                <h1>Monterotto</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="https://app.weathercloud.net/d7780602661#profile" class="btn btn-warning" role="button">WeatherCloud</a>  
                <br>
                <div style="width:100%; padding-bottom:56.25%; position:relative;">
                    <iframe src="https://app.weathercloud.net/d7780602661#profile" 
                            style="position:absolute; top:0px; left:0px; 
                                width:100%; height:100%; border: none; overflow: hidden;"
                                scrolling="auto"
                    >
                    </iframe>
                </div>
            </div>
            <div class="col-md-6">
                <a href="https://www.wunderground.com/dashboard/pws/IAMAND1" class="btn btn-warning" role="button">WunderGround</a>  
                <br>
                <!--<embed src="https://www.wunderground.com/dashboard/pws/IAMAND1" style="width:500px; height: 300px;">-->
            </div>
        </div>                
        

        

</div>

<?php gunter_footer(); ?>
