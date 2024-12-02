<?php
// Configura il file CSV
$file = 'dati.csv';
$maxRows = 100;

// Sanificazione dei dati per evitare injection
$nome = htmlspecialchars(strip_tags(trim($_POST['nome'])));
$cognome = htmlspecialchars(strip_tags(trim($_POST['cognome'])));

// Validazione dati
if (empty($nome) || empty($cognome)) {
    die('Nome e cognome sono obbligatori!');
}

// Scrittura sul file CSV
$data = [$nome, $cognome];
if (!file_exists($file)) {
    // Se il file non esiste, aggiungi la riga di intestazione
    $fp = fopen($file, 'w');
    fputcsv($fp, ['Nome', 'Cognome']);
} else {
    $fp = fopen($file, 'a');
}
fputcsv($fp, $data);
fclose($fp);

// Controllo del numero di righe nel file CSV
$lines = file($file);
if (count($lines) > $maxRows + 1) { // +1 per l'intestazione
    // Rimuovi la prima riga di dati (non l'intestazione)
    array_splice($lines, 1, 1);
    file_put_contents($file, implode("", $lines));
}

// Reindirizza alla visualizzazione
header('Location: view.php');
exit;
?>
