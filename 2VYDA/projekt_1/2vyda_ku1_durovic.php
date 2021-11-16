<?php

/*
* 2vyda_ku1_durovic.php
*
* Ukol 1
* Róbert Ďurovič
* R20275
* 
* 2021/2022
* 2VYDA
* OSU PRF KIP
*/


?>

<html>
    <head>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>

    <h1 class="container">CPU parameters</h1>
    <form action="2vyda_ku1_durovic.php" id="hardwareForm" method="post" class="container mt-4 border p-2">
        <div class="form-group">
            <label for="cpuName">CPU name:</label>
            <input type="text" id="cpuName" name="cpuName" />
        </div>

        <div class="mt-4">Number of cores:</div>
        <div class="form-check">
            <input type="radio" id="single" name="cpuCore" value="single core" class="form-check-input" />
            <label for="single" class="form-check-label">Single core</label>
        </div>
        <div class="form-check">
            <input type="radio" id="multi" name="cpuCore" value="multi core" class="form-check-input" />
            <label for="multi" class="form-check-label">Multi core</label>
        </div>

        <div class="mt-4">CPU Cache:</div>
        <div class="form-check">
            <input type="checkbox" id="l1" name="l1" class="form-check-input" value="L1" />
            <label for="l1" class="form-check-label">L1</label>
            </div>
        <div class="form-check">
            <input type="checkbox" id="l2" name="l2" class="form-check-input" value="L2" />
            <label for="l2" class="form-check-label">L2</label>
            </div>
        <div class="form-check">
            <input type="checkbox" id="l3" name="l3" class="form-check-input" value="L3" />
            <label for="l3" class="form-check-label">L3</label>
        </div>

        <div class="form-group mt-2 col-4">
            <label for="freq">Select CPU clock rate</label>
            <select name="freq" id="freq" class="form-control">
                <option value="1">1 GHz</option>
                <option value="2">2 GHz</option>
                <option value="3">3 GHz</option>
                <option value="4">4 GHz</option>
            </select>
        </div>

        <div class="mt-2">Hyperthreading</div>
        <div class="form-check">
            <input type="radio" id="yes" name="hyperthreading" value="yes" class="form-check-input" />
            <label for="yes" class="form-check-label">Yes</label>
        </div>
        <div class="form-check">
            <input type="radio" id="no" name="hyperthreading" value="no" class="form-check-input" />
            <label for="no" class="form-check-label">No</label>
        </div>

        <div class="mt-2">Another parameters:</div>
        <div class="form-floating mt-2 col-4">
            <textarea id="params" name="params" class="form-control" placeholder="Write another parameters"></textarea>
        </div>
    
        <input type="submit" class="btn btn-primary mt-2" value="send" name="submit" />
    </form>


    </body>
</html>


<?php 

$cpuName = isset($_POST["cpuName"]) && ($_POST["cpuName"] != "") ? $_POST["cpuName"] : "Your CPU has no name!";
$cpuCore = isset($_POST["cpuCore"]) ? $_POST["cpuCore"] : "Unknown number of Cores";
$frequency = isset($_POST["freq"]) ? $_POST["freq"] . " GHz" : "Frequency not selected";
$customParams = isset($_POST["params"]) && ($_POST["params"] != "") ? $_POST["params"] : "No values";
$hyperthreading = isset($_POST["hyperthreading"]) ? $_POST["hyperthreading"] : "Value not checked";
$L1 = isset($_POST["l1"]) ? $_POST["l1"] . ", " : "";
$L2 = isset($_POST["l2"]) ? $_POST["l2"] . ", " : "";
$L3 = isset($_POST["l3"]) ? $_POST["l3"] : "";
$cache = "";
$cache = $L1 . $L2 . $L3;

if ($cache === "") {
    $cache = "Cache not checked";
}


$html = '
<div class="container">
    <h2>CPU parameters table</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Parameter</th>
                <th>Value(s)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>CPU name</th>
                <td>' . $cpuName . '</td>
            </tr>
            <tr>
                <th>Number of CPU cores</th>
                <td>' . $cpuCore . '</td>
            </tr>
            <tr>
                <th>CPU Cache</th>
                <td>' . $cache . '</td>
            </tr>
            <tr>
                <th>CPU operating frequency</th>
                <td>' . $frequency . '</td>
            </tr>
            <tr>
                <th>Hyperthreading</th>
                <td>' . $hyperthreading . '</td>
            </tr>
            <tr>
                <th>Another parameters</th>
                <td>' . $customParams . '</td>
            </tr>
        </tbody>

    </table>
</div>

';


if (isset($_POST["submit"]))
{
    print($html);
}
?>