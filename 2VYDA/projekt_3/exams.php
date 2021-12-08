<?php 
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}
 
include_once('user.php');

date_default_timezone_get();
$date = date("Y-m-d", strtotime("+1 day"));

$user = new User();
$details = $user->getUserDetails();

if ($_SESSION['user']) {
    $exams = $user->getTeacherExams();
    $idCourses = $user->getCourses();
    $classes = $user->getClass();
} else {
    $exams = $user->getStudentExams();
}

if (isset($_POST['course'])) {
    $idClass = isset($_POST['class']) ? $_POST['class'] : "";
    $idCourse = isset($_POST['course']) ? $_POST['course'] : "";
    $loginTeacher = $details['login'];
    $timeExam =  isset($_POST['time']) ? $_POST['time'] : "";
    $dateExam = isset($_POST['date']) ? $_POST['date'] : "";
    $capacityExam = isset($_POST['capacity']) ? $_POST['capacity'] : "";
    $noteExam = isset($_POST['note']) ? $_POST['note'] : "";

    $user->insertExam($idClass, $loginTeacher, $idCourse, $dateExam, $timeExam, $capacityExam, $noteExam);

}

?>

<script>
    function update() {
				var select = document.getElementById('class');
				var option = select.options[select.selectedIndex];
                var capacity = option.getAttribute('capacity');

				var input = document.getElementById("capacity");
                input.setAttribute("max", capacity); // set a new value;
			}
			update();
</script>

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
        Moje termíny
        </h1>
<?php if (!$details['teacher']) {
      echo  "<div class=\"visually-hidden\">"; } ?> 
        <h3 class="my-3"><i class="far fa-plus-square mr-5"></i> Pridať termín</h3>
        <form action="exams.php" method="POST" class="border border-secondary rounded p-2">
            <div class="container">
                <div class="row">
                    <div class="col-2 form-group">
                        <label for="course">Predmet</label>
                        <select name="course" id="course" class="form-control" required>
                            <option>---</option>
                            <?php 
                                foreach ($idCourses->fetch_all() as $courseRow) {
                                    echo "<option value=".$courseRow[0].">". $courseRow[0] ."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <label for="class">Miestnosť</label>
                        <select name="class" id="class" class="form-control" onchange="update()" required>
                            <option>---</option>
                            <?php 
                                foreach ($classes->fetch_all() as $class) {
                                    echo "<option capacity=".$class[2]." value=".$class[0].">". $class[0] ."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="date">Dátum</label>
                        <input class="form-control col" type="date" name="date" min="<?php echo $date; ?>" required>
                    </div>
                    <div class="col-2">
                        <label for="time">Čas</label>
                        <input class="form-control col" type="time" name="time" required>
                    </div>
                    <div class="col-1">
                        <label for="capacity">Kapacita</label>
                        <input class="form-control" type="number" name="capacity" min="1" id="capacity" required>
                    </div>
                    <div class="col-3">
                        <label for="note">Poznámky</label>
                        <textarea class="form-control" name="note" id="" rows="1"></textarea>
                    </div>
                </div>
                <input type="text" id="user" value="<?php echo $_SESSION['user']?>" hidden>
                <div class="d-flex flex-row-reverse">
                    <input type="submit" class="btn btn-primary my-2 float-right" name="submit" id="submit" value="Vložiť">
                </div>
            </div>
        </form>
<?php if (!$details['teacher']) { echo "</div>"; } ?>
        <h3 class="my-4"><i class="far fa-calendar-check mr-5"></i> Vypísané termíny</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Skratka</th>
                    <th>Predmet</th>
                    <th>Miestnost</th>
                    <th>Dátum</th>
                    <th>Čas</th>
                    <th>Kapacita</th>
                    <th>Ukončenie</th>
                    <th>Poznámka</th>
                    <th>Akcia</th>
                </tr>
            </thead>
        <?php 
            if ($details['teacher']) {
            

            foreach ($exams->fetch_all() as $row) {
                echo "<tr>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[8] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[4] = date('d.m. Y',strtotime($row[4])) . "</td>";
                echo "<td>" . $row[5] = date('H:i',strtotime($row[5])) . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "<td>" . $row[9] . "</td>";
                echo "<td>" . $row[7] . "</td>";
                echo "<td>" . "</td>";
                echo "</tr>";    
            }

            } else {
                $exams = $user->getStudentExams();

                if ($exams) {
                foreach ($exams->fetch_all() as $row) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>";
                    echo "<td>" . $row[8] . "</td>";
                    echo "<td>" . $row[11] = date('d.m. Y',strtotime($row[11])) . "</td>";
                    echo "<td>" . $row[12] = date('H:i',strtotime($row[12])) . "</td>";
                    echo "<td>" . $row[13] . "</td>";
                    echo "<td>" . $row[5] . "</td>";
                    echo "<td>" . $row[14] . "</td>";
                    echo "<td>
                    <form method=\"POST\" action=\"exams.php\">
                    <input type=\"text\" class=\"visually-hidden\" name=\"login_student\" value='" . $details['login'] . "'>
                    <input type=\"text\" class=\"visually-hidden\" name=\"id_exam\" value='" . $row[7] . "'>
                    <input type=\"submit\" class=\"btn btn-success\" value=\"submit\">
                    </form></td>";
                    echo "</tr>"; 

                    
                }}
                else {
                    echo "aaa";
                }
            }
            
        ?>
        </table>

        <a href="home.php" class="btn btn-secondary">Naspäť</a>
    </div>
</body>
</html>

<?php 

$exam = isset($_POST['id_exam']) ? $_POST['id_exam'] : ""; 
                    $loginStudent = $details['login'];

                    $user->registrateExam($exam, $loginStudent);
?>