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
    <br>
    <br>
    <br>
    Creato con chatgpt usando il seguente prompt:
    <br>
    <i>Sviluppare un programma che permetta di inserire tramite form il cognome e il nome di un utente. Scrivere tutti i dati recuperati dal form su un file CSV. Creare una pagina che visualizzi il file CSV. Fai in modo che il file Csv non superi la dimensione di 100 righe, se le supera cancella la prima riga e appendi l'ultima informazione. Fai in modo che non sia possibile iniettare codice php malevolo dentro il form.</i>
</body>
</html>
