<?php
include "connessione.php";
$conn = mysqli_connect($host, $username, $pasword, $dbName);
if (mysqli_connect_errno()) {
    echo 'connessione fallita: ' . die(mysqli_connect_error());
}

$queryLibri = "SELECT * FROM libri";
$oggettoLibri = $conn->query($queryLibri);
$arrayLibri = [];
while ($riga = $oggettoLibri->fetch_assoc()) {
    $arrayLibri[] = $riga;
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>cerca libri belli</title>
</head>

<body>
    <div class="boxEsterno">
        <div class="titoloFiltro">
            <h1>Ricerca</h1>
        </div>
        <div class="boxForm">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <!-- autore  -->
                <label for="autore ">Autore </label><br>
                <input type="text" name="autore " id="autore " class="filtroInput"><br>

                <!-- libro -->
                <label for="Titolo">Titolo del libro</label><br>
                <input type="text" name="titolo" id="Titolo" class="filtroInput"><br>

                <!-- editore -->
                <select name="editore" id="editore">
                    <option value="">scegli una casa editrice</option>
                    <?php
                    $arrayControllo = [];
                    foreach ($arrayLibri as $libro) {
                        if (!in_array($libro['editore'], $arrayControllo)) {
                            $selected = (isset($_POST['editore']) && $_POST['editore'] == $libro['editore']) ? 'selected' : '';
                            echo "<option value='{$libro['editore']}' " . $selected . ">{$libro['editore']}</option>";

                            $arrayControllo[] = $libro['editore'];
                        }
                    }
                    ?>
                </select>

                <!-- materia -->
                <select name="materia" id="materia">
                    <option value="">scegli una materia</option>
                    <?php
                    $arrayControllo = [];
                    foreach ($arrayLibri as $libro) {
                        if (!in_array($libro['materia'], $arrayControllo)) {
                            $selected = (isset($_POST['materia']) && $_POST['materia'] == $libro['materia']) ? 'selected' : '';
                            echo "<option value='{$libro['materia']}' " . $selected . ">{$libro['materia']}</option>";

                            $arrayControllo[] = $libro['materia'];
                        }
                    }
                    ?>
                </select>

                <input type="submit" value="filtra">
            </form>

            <table id="outputTable">
            <?php


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $filtroAutore = isset($_POST['autore']) ? trim($_POST['autore']) : '';
                $filtroTitolo = isset($_POST['titolo']) ? trim($_POST['titolo']) : '';
                $filtroEditore = isset($_POST['editore']) ? trim($_POST['editore']) : '';
                $filtroMateria = isset($_POST['materia']) ? trim($_POST['materia']) : '';

                // Eseguo la ricerca anche se è presente un solo parametro
                if (!empty($filtroAutore) || !empty($filtroTitolo) || !empty($filtroEditore) || !empty($filtroMateria)) {

                    echo "<h3>Risultati</h3>";
                    echo '<tr><th>Titolo</th>
                          <th>Autore</th>
                          <th>Editore</th>
                          <th>Materia</th></tr>';

                    foreach ($arrayLibri as $libro) {
                        $confrontoAutore = empty($filtroAutore) || stripos($libro['autore'], $filtroAutore) !== false;
                        $confrontoTitolo = empty($filtroTitolo) || stripos($libro['titolo'], $filtroTitolo) !== false;
                        $confrontoEditore = empty($filtroEditore) || stripos($libro['editore'], $filtroEditore) !== false;
                        $confrontoMateria = empty($filtroMateria) || strpos($libro['materia'], $filtroMateria) !== false;

                        if ($confrontoAutore && $confrontoTitolo && $confrontoEditore && $confrontoMateria) {
                            echo "<tr><td>".$libro['titolo']."</td>
                            <td>".$libro['autore']."</td>
                            <td>".$libro['editore']."</td>
                            <td>".$libro['materia']."</td></tr>";
                        }
                    }

                    echo "</table>";
                }

                else{
                    echo "<p>Nessun filtro inserito. Inserisci almeno un criterio di ricerca</p>";
                }
            }

            ?>
        </div>
    </div>
    <footer>
        <p>creato da simone Fernandez IV</p>
    </footer>

</body>

</html>