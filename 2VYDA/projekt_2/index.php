<?php

/*
* 2vyda_ku1_durovic.php
*
* Ukol 2
* Róbert Ďurovič
* R20275
* 
* 2021/2022
* 2VYDA
* OSU PRF KIP
*/


// Database configuration
$dbHost     = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "vydap_projekt";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

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
    <h1 class="container">Predmety</h1>
    <form action="index.php" id="tableForm" method="post" class="container mt-4 border p-2">
        <div class="form-group">
            <label for="zkratkaPredmetu">Zkratka Předmětu:</label>
            <input type="text" id="zkratkaPredmetu" name="zkratkaPredmetu" />
        </div>
        <div class="form-group">
            <label for="nazev">Název:</label>
            <input type="text" id="nazev" name="nazev" />
        </div>
        <div class="form-group">
            <label for="kredity">Počet kreditů:</label>
            <input type="number" id="kredity" name="kredity" />
        </div>
        <div class="form-group">
            <label for="prednasky">Počet hodin přednášek:</label>
            <input type="number" id="prednasky" name="prednasky" />
        </div>
        <div class="form-group">
            <label for="cviceni">Počet hodin cvičení:</label>
            <input type="number" id="cviceni" name="cviceni" />
        </div>
        <div class="mt-4">Ukončení:</div>
        <div class="form-check">
            <input type="radio" id="zk" name="ukonceni" value="Zk" class="form-check-input" />
            <label for="zk" class="form-check-label">Zk</label>
        </div>
        <div class="form-check">
            <input type="radio" id="za" name="ukonceni" value="Za" class="form-check-input" />
            <label for="za" class="form-check-label">Zá</label>
        </div>
        <div class="mt-2">Anotace</div>
        <div class="form-floating mt-2 col-4">
            <textarea id="anotace" name="anotace" class="form-control" placeholder="Anotace predmetu"></textarea>
        </div>

    
        <input type="submit" class="btn btn-primary mt-2" value="send" name="submit" />
    </form>



    </body>
</html>
