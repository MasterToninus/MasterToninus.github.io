<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Dati</title>
</head>
<body>
    <h1>Dati Salvati</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $file = "dati.csv";

            if (file_exists($file)) {
                $handle = fopen($file, "r");

                while (($riga = fgetcsv($handle)) !== false) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($riga[0]) . "</td>";
                    echo "<td>" . htmlspecialchars($riga[1]) . "</td>";
                    echo "</tr>";
                }

                fclose($handle);
            } else {
                echo "<tr><td colspan='2'>Nessun dato disponibile</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="index.php">Torna al modulo</a>
</body>
</html>
