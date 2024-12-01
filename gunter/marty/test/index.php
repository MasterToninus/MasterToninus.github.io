<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Dati</title>
</head>
<body>
    <h1>Inserisci Nome e Cognome</h1>
    <form action="save.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" required>
        <br><br>
        <button type="submit">Salva</button>
    </form>
    <br>
    <a href="view.php">Visualizza dati salvati</a>
</body>
</html>
