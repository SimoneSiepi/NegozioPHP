<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style\style.css">
    <title>inserisci libro</title>
</head>
<body>
    <div class="boxEsterno">
        <div class="titolo"><h1>inserisci un libro</h1></div>
        <div class="boxForm">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                <!-- codice isbn -->
                <label for="cod_ISBN">codice isbn del libro</label>
                <input type="text" name="cod_ISBN" id="cod_ISBN"><br>

                <!-- titolo -->
                <label for="titoloLibro">titolo del Libro</label>
                <input type="text" name="titoloLibro" id="titoloLibro"><br>

                <!-- autore -->
                <label for="autore">autore</label>
                <input type="text" name="autore" id="autore"><br>

                <!-- prezzo -->
                <label for="prezzo">prezzo</label>
                <input type="number" name="prezzo" id="prezzo"><br>

                <!-- scorta minima -->
                <label for="scorta_min">scorta minima </label>
                <input type="number" name="scorta_min" id="scorta_min"><br>


                <input type="submit" value="inserisci libro">
            </form>
        </div>
    </div>
</body>
</html>