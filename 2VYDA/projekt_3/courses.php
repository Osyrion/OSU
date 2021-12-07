<?php 
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}
 
include_once('user.php');
 
$user = new User();
if ($_SESSION['teacher']) {
    $coursesArray = $user->getTeacherCourses();
} else {
    $coursesArray = $user->getStudentCourses();
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>PHP Login using OOP Approach</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">
        Moje predmety
        </h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Zkratka</th>
                    <th>Název</th>
                    <th>Kredity</th>
                    <th>Přednášky [h]</th>
                    <th>Cvičení [h]</th>
                    <th>Ukončení</th>
                    <th>Anotace</th>
                </tr>
            </thead>
        <?php 
            foreach ($coursesArray->fetch_all() as $row) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "</tr>";       
            }
            
        ?>
        </table>

        <a href="home.php" class="btn btn-secondary">Naspäť</a>
    </div>

    
</body>
</html>


