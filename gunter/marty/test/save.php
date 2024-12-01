<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $cognome = htmlspecialchars($_POST["cognome"]);

    // Nome del file CSV
    $file = "dati.csv";

    // Preparazione della riga da aggiungere al file
    $riga = [$nome, $cognome];

    // Apertura del file in modalità "append"
    $handle = fopen($file, "a");

    if ($handle) {
        // Scrittura della riga nel file CSV
        fputcsv($handle, $riga);

        // Chiusura del file
        fclose($handle);

        echo "Dati salvati con successo!";
        echo '<br><a href="index.php">Torna al modulo</a>';
    } else {
        echo "Errore nell'apertura del file!";
    }
}
?>
