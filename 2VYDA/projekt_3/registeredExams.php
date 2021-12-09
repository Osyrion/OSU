<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}
 
include_once('user.php');

$user = new User();
$registeredExams = $user->getAllStudentExams();
$details = $user->getUserDetails();


$exam = isset($_POST['id_exam']) ? $_POST['id_exam'] : ""; 
$loginStudent = $details['login'];
$capacity = isset($_POST['capacity']) ? $_POST['capacity'] : "";

if (isset($_POST['unregister'])) {
    $user->unregisterExam($_POST['id_exam'], $details['login']);
    if ($capacity) {
        $user->setCapacity($capacity + 1, $exam);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>VYDA Projekt</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="navbar-nav ms-auto mx-5">
            <a href="logout.php" class="btn btn-outline-danger">Odhlásiť sa</a>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-center my-4">
        Registrované termíny
        </h1>

        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Skratka</th>
                    <th>Predmet</th>
                    <th>Miestnosť</th>
                    <th>Dátum</th>
                    <th>Čas</th>
                    <th>Ukončenie</th>
                    <th>Poznámka</th>
                    <th>Akcia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $b = 0;
                    //var_dump($registeredExams->fetch_all());
                    if ($registeredExams) {
                        foreach ($registeredExams->fetch_all() as $rExam) {
                            echo '<tr>';
                            echo '<td>' . $rExam[6] . '</td>';
                            echo '<td>' . $rExam[12] . '</td>';
                            echo '<td>' . $rExam[4] . '</td>';
                            echo '<td>' . $rExam[7] = date('d.m. Y',strtotime($rExam[7])) . '</td>';
                            echo '<td>' . $rExam[8] = date('H:i',strtotime($rExam[8])) . '</td>';
                            echo '<td>' . $rExam[16] . '</td>';
                            echo '<td>' . $rExam[10] . '</td>';
                            echo '<td><form method="post" action="registeredExams.php" name="unregister">
                            <input type="text" class="visually-hidden" value="'. $rExam[0] .'" name="id_exam">
                            <input type="text" class="visually-hidden" value="'. $rExam[9] .'" name="capacity">
                            <input type="text" class="visually-hidden" value="unregister" name="unregister">
                            <input type="submit" value="Zrušiť" name="submit" class="btn btn-danger">
                            </form></td>';
                            echo '</tr>';
                            $b++;
                        }
                    } 
                    if (!$b) {    
                        echo '<tr>';
                        echo '<td class="text-center" colspan="8">Momentálne nie ste prihlásený na žiadny termín.</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>


        <a href="home.php" class="btn btn-secondary">Naspäť</a>


        <?php
            
        ?>


    </div>
</body>
</html>
