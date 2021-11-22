<?php
/*
* 2vyda_ku2_durovic.php
*
* Ukol 2
* Róbert Ďurovič
* R20275
* 
* 2021/2022
* 2VYDA
* OSU PRF KIP
*/


/**
 *
 * -- 2VYDA_projekt2    database.sql

 * -- CREATE DATABASE vydap_projekt CHARACTER SET utf8;
 * -- 
 * -- CREATE TABLE vydap_projekt.predmety (
 * --     zkratka_predmetu varchar(5) PRIMARY KEY,
 * --     nazev varchar(50),
 * --     pocet_kreditu smallint(6),
 * --     pocet_hodin_prednasek smallint(6),
 * --     pocet_hodin_cviceni smallint(6),
 * --     ukonceni varchar(2),
 * --     anotace text
 * -- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
 * 
**/



// Database configuration
$dbHost     = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "vydap_projekt";
$tableName  = "predmety";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$dataTable = "SELECT * FROM predmety";
$showData = $db->query($dataTable);

$resultset = array();
while ($row = mysqli_fetch_array($showData)) {
  $resultset[] = $row;
}

$zkratkaPredmetu = isset($_POST["zkratkaPredmetu"]) ? $_POST["zkratkaPredmetu"] : "";
$nazev = isset($_POST["nazev"]) ? $_POST["nazev"] : "";
$kredity = isset($_POST["kredity"]) ? $_POST["kredity"] : 0;
$prednasky = isset($_POST["prednasky"]) ? $_POST["prednasky"] : 0;
$cviceni = isset($_POST["cviceni"]) ? $_POST["cviceni"] : 0;
$ukonceni = isset($_POST["ukonceni"]) ? $_POST["ukonceni"] : "Zk";
$anotace = isset($_POST["anotace"]) ? $_POST["anotace"] : "";


if ($zkratkaPredmetu != "") {
    $select = "SELECT zkratka_predmetu FROM predmety WHERE zkratka_predmetu = '$zkratkaPredmetu';";
    $dataExists = $db->query($select);

    if ($dataExists->num_rows < 1) {
        $stmt = $db->prepare("INSERT INTO predmety VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssiiiss', $zkratkaPredmetu, $nazev, $kredity, $prednasky, $cviceni, $ukonceni, $anotace);
   
        if ($stmt->execute() === TRUE) {
            echo "<div class=\"alert alert-success text-center mt-2\" role=\"alert\">Záznam úspěšne uložen!</div>";
            header('Refresh: 1');
        } else {
            echo "<div class=\"alert alert-danger text-center mt-2\" role=\"alert\">Chyba při vkládání záznamu: " . $db->error . "</div>";
        }
    }
}
  $db->close();
?>


<html>
    <head>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>

    <!-- form -->
    <h1 class="container">Předměty</h1>
    <form action="2vyda_ku2_durovic.php" id="tableForm" method="post" class="container mt-4 border p-2">
    <div class="row mb-2">
        <div class="col-2 form-group">
            <label for="zkratkaPredmetu">Zkratka Předmětu:</label>
            <input type="text" class="form-control" id="zkratkaPredmetu" name="zkratkaPredmetu" maxlength="5" required/>
        </div>

        <div class="col-10 form-group">
            <label for="nazev">Název:</label>
            <input type="text" class="form-control" id="nazev" name="nazev" maxlength="50" required/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-4 form-group">
            <label for="kredity">Počet kreditů:</label>
            <input type="number" class="form-control" id="kredity" name="kredity" min="0" max="99" />
        </div>

        <div class="col-4 form-group">
            <label for="prednasky">Počet hodin přednášek:</label>
            <input type="number" class="form-control" id="prednasky" name="prednasky" min="0" max="99" />
        </div>

        <div class="col-4 form-group">
            <label for="cviceni">Počet hodin cvičení:</label>
            <input type="number" class="form-control" id="cviceni" name="cviceni" min="0" max="99" />
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-2">
            <div class="mt-2">Ukončení:</div>
            <div class="ps-5 form-check">
                <input type="radio" id="zk" name="ukonceni" value="Zk" class="form-check-input" checked/>
                <label for="zk" class="form-check-label">Zkouška</label>
            </div>
            <div class="ps-5 form-check">
                <input type="radio" id="za" name="ukonceni" value="Za" class="form-check-input" />
                <label for="za" class="form-check-label">Zápočet</label>
            </div>
        </div>
        <div class="col-10">
            <div class="mt-2">Anotace</div>
            <textarea id="anotace" name="anotace" class="form-control" placeholder="Anotace predmetu"></textarea>
        </div>
    </div>
        <input type="submit" class="btn btn-primary mt-2" value="Vložit předmět" name="submit" />
    </form>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Zkratka</th>
                    <th>Název</th>
                    <th>Kredity</th>
                    <th>Přednášky [hodin]</th>
                    <th>Cvičení [hodin]</th>
                    <th>Ukončení</th>
                    <th>Anotace</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultset) {
                    foreach ($resultset as $data)
                    {
                        echo "<tr>";
                        echo "<td>" . $data["zkratka_predmetu"] . "</td>";
                        echo "<td>" . $data["nazev"] . "</td>";
                        echo "<td>" . $data["pocet_kreditu"] . "</td>";
                        echo "<td>" . $data["pocet_hodin_prednasek"] . "</td>";
                        echo "<td>" . $data["pocet_hodin_cviceni"] . "</td>";
                        echo "<td>" . $data["ukonceni"] . "</td>";
                        echo "<td>" . $data["anotace"] . "</td>";
                        echo "</tr>";
                    }
                }
                else {
                    echo "<tr><td colspan=\"7\" class=\"text-center\">Nebyly nalezeny žádné záznamy!</td></tr>";
                }

                ?>
            </tbody>
        </table>
    </div>

    </body>
</html>