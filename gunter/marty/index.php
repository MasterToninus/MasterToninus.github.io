<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marty -- Workspace</title>
</head>
<body>
    <h1>Sottocartelle nella Directory Corrente</h1>
    <ul>
        <?php
        // Ottieni la directory corrente
        $currentDir = __DIR__;

        // Elenca tutti gli elementi nella directory
        $elements = scandir($currentDir);

        // Filtra solo le sottocartelle (esclude "." e "..")
        foreach ($elements as $element) {
            $path = $currentDir . DIRECTORY_SEPARATOR . $element;

            // Controlla che sia una directory e non un file
            if ($element !== "." && $element !== ".." && is_dir($path)) {
                // Crea un link alla directory
                echo "<li><a href=\"$element\">$element</a></li>";
            }
        }
        ?>
    </ul>
</body>
</html>