<?php
$file = 'dati.csv';

// Verifica che il file esista
if (!file_exists($file)) {
    die('Nessun dato disponibile.');
}

// Leggi i dati del file
$rows = array_map('str_getcsv', file($file));
$header = array_shift($rows); // Rimuove l'intestazione
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Dati</title>
</head>
<body>
    <h1>Elenco Dati Salvati</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <?php foreach ($header as $col): ?>
                    <th><?= htmlspecialchars($col) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?= htmlspecialchars($cell) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="form.php">Torna al modulo</a>
</body>
</html>
