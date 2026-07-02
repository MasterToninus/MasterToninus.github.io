<?php
require_once __DIR__ . '/src/gunter.php';

gunter_head('34st3r-3ggs', './');
gunter_navbar('./', 'home');
?>

<div class="container">
    <div class="jumbotron">
        <h1><a href="https://en.wikipedia.org/wiki/Easter_egg_(media)">34ST3r-3GGS</a></h1>
        <h3>Welcome <a href="https://readyplayerone.fandom.com/wiki/Gunter">Gunt3r</a></h3>
        <p>Contenuti e funzionalita' non adatti ad essere facilmente reperibili dal mio sito internet "accademico".</p>
    </div>

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
                    <p class="list-group-item-text">Sezioni eliminate dalla vecchia versione del sito.</p>
                </a>
                <a href="./hardware/" class="list-group-item">
                    <h4 class="list-group-item-heading">PC History</h4>
                    <p class="list-group-item-text">Storia dei miei PC.</p>
                </a>
                <a href="https://xila.altervista.org/" class="list-group-item">
                    <h4 class="list-group-item-heading">Xila</h4>
                    <p class="list-group-item-text">Esperimenti web di Diana, sito mantenuto da Diego.</p>
                </a>
                <a href="./nonno/" class="list-group-item">
                    <h4 class="list-group-item-heading">Foglie Sparse</h4>
                    <p class="list-group-item-text">Ristrutturazione dei file del libro di Nonno Michele.</p>
                </a>
                <a href="../data/" class="list-group-item">
                    <h4 class="list-group-item-heading">PHP generated Resume</h4>
                    <p class="list-group-item-text">CSV Viewer.</p>
                </a>
                <a href="./facciata.php" class="list-group-item">
                    <h4 class="list-group-item-heading">Protocollo facciata</h4>
                    <p class="list-group-item-text">Cosa fare per aggiornare in modo consistente tutti i profili?</p>
                </a>
                <a href="./meteo/" class="list-group-item">
                    <h4 class="list-group-item-heading">Centraline Meteo</h4>
                    <p class="list-group-item-text">Dati diretti dai miei sensori.</p>
                </a>
                <a href="./gallery/index.html#fototrappola" class="list-group-item">
                    <h4 class="list-group-item-heading">Photo gallery</h4>
                    <p class="list-group-item-text">Raccolta foto varie.</p>
                </a>
                <a href="./h4x0rs.html" class="list-group-item">
                    <h4 class="list-group-item-heading">Template</h4>
                    <p class="list-group-item-text">Pagina di prova, h4x0rs.html.</p>
                </a>
                <a href="./familytree/" class="list-group-item">
                    <h4 class="list-group-item-heading">Family tree</h4>
                    <p class="list-group-item-text">Albero genealogico installato tramite servizio Aruba.</p>
                </a>
                <a href="./paste/" class="list-group-item">
                    <h4 class="list-group-item-heading">Servizio pastebin</h4>
                    <p class="list-group-item-text">Installato tramite servizio Aruba.</p>
                </a>
                <a href="./marty/" class="list-group-item">
                    <h4 class="list-group-item-heading">Marty -- Workspace</h4>
                    <p class="list-group-item-text">Spazio di test per Marty.</p>
                </a>
                <a href="./diego/" class="list-group-item">
                    <h4 class="list-group-item-heading">Diego -- Workspace</h4>
                    <p class="list-group-item-text">Spazio di test per Diego.</p>
                </a>
                <a href="./listanozze/" class="list-group-item">
                    <h4 class="list-group-item-heading">Lista Nozze</h4>
                    <p class="list-group-item-text">Pagina per la lista nozze non molto utilizzata.</p>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <img class="img-responsive" src="https://darrenkearney.me/wp-content/uploads/2015/07/example_use4.gif" alt="Work in progress.">
        </div>
    </div>
</div>

<?php gunter_footer(); ?>
