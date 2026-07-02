<?php
require_once __DIR__ . '/../../src/gunter.php';

$file = __DIR__ . '/dati.csv';
$header = [];
$rows = [];

if (file_exists($file)) {
    $rows = array_map('str_getcsv', file($file));
    $header = array_shift($rows) ?: [];
}

gunter_head('Visualizza Dati', '../../');
gunter_navbar('../../');
?>

<div class="container">
    <div class="jumbotron">
        <h1>Elenco Dati Salvati</h1>
        <p>Visualizzazione del file CSV generato dal form.</p>
    </div>

    <?php if (empty($header)): ?>
        <div class="alert alert-warning">Nessun dato disponibile.</div>
    <?php else: ?>
        <div class="table-responsive tall-row">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <?php foreach ($header as $col): ?>
                            <th><?php echo gunter_h($col); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <?php foreach ($row as $cell): ?>
                                <td><?php echo gunter_h($cell); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <p><a class="btn btn-default" href="index.php">Torna al modulo</a></p>
</div>

<?php gunter_footer(); ?>
