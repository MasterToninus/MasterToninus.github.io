<?php
require_once __DIR__ . '/../../src/gunter.php';

gunter_head('Inserisci Dati', '../../');
gunter_navbar('../../');
?>

<div class="container">
    <div class="jumbotron">
        <h1>Inserisci Nome e Cognome</h1>
        <p>Modulo di test per il salvataggio su CSV.</p>
    </div>

    <div class="row tall-row">
        <div class="col-md-6">
            <form action="save.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="cognome">Cognome</label>
                    <input class="form-control" type="text" id="cognome" name="cognome" required>
                </div>
                <button class="btn btn-primary" type="submit">Salva</button>
                <a class="btn btn-default" href="view.php">Visualizza dati salvati</a>
            </form>
        </div>
        <div class="col-md-6">
            <div class="site-card">
                <h3>Prompt originale</h3>
                <p><em>Sviluppare un programma che permetta di inserire tramite form il cognome e il nome di un utente. Scrivere tutti i dati recuperati dal form su un file CSV. Creare una pagina che visualizzi il file CSV. Fai in modo che il file CSV non superi la dimensione di 100 righe, se le supera cancella la prima riga e appendi l'ultima informazione. Fai in modo che non sia possibile iniettare codice PHP malevolo dentro il form.</em></p>
            </div>
        </div>
    </div>
</div>

<?php gunter_footer(); ?>
