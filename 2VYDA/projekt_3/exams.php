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

if ($_SESSION['user']) {
    $exams = $user->getTeacherExams();
    $idCourses = $user->getCourses();
    $rooms = $user->getRoom();
} else {
    $exams = $user->getStudentExams();
}

if (isset($_POST['course'])) {
    $idRoom = isset($_POST['room']) ? $_POST['room'] : "";
    $idTeacher = isset($_POST['user']) ? $_POST['user'] : "";
    $idCourse = isset($_POST['course']) ? $_POST['course'] : "";
    $postExam = $_POST['date'] . " " . $_POST['time'];
    $dateExam = isset($postExam) ? $postExam : "";
    $capacityExam = isset($_POST['capacity']) ? $_POST['capacity'] : "";
    $noteExam = isset($_POST['note']) ? $_POST['note'] : "";

    $user->updateExams('C105', 1, '7DBSY', '10', "");

}






?>

<script>
    function update() {
				var select = document.getElementById('room');
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
	<title>PHP Login using OOP Approach</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">
        Moje termíny
        </h1>

        <h3 class="my-3">Pridať termín</h3>
        <form action="exams.php" method="POST" class="border border-secondary rounded p-2">
            <div class="container">
                <div class="row">
                    <div class="col-2 form-group">
                        <label for="course">Predmet</label>
                        <select name="course" id="course" class="form-control" required>
                            <?php 
                                foreach ($idCourses->fetch_all() as $courseRow) {
                                    echo "<option value=".$courseRow[0].">". $courseRow[0] ."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <label for="room">Místnost</label>
                        <select name="room" id="room" class="form-control" onchange="update()" required>
                            <?php 
                                foreach ($rooms->fetch_all() as $room) {
                                    echo "<option capacity=".$room[2]." value=".$room[0].">". $room[0] ."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="date">Datum</label>
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
                    <div class="col-4">
                        <label for="note">Poznámky</label>
                        <textarea class="form-control" name="note" id="" rows="1"></textarea>
                    </div>
                </div>
                <input type="text" id="user" value="<?php echo $_SESSION['user']?>" hidden>
                <div class="d-flex flex-row-reverse">
                    <input type="submit" class="btn btn-primary my-2 float-right" name="submit" id="submit">
                </div>
            </div>
        </form>

        <h3 class="my-3">Vypsané termíny</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Zkratka</th>
                    <th>Predmet</th>
                    <th>Místnost</th>
                    <th>Datum</th>
                    <th>Kapacita</th>
                    <th>Ukončení</th>
                    <th>Poznámka</th>
                </tr>
            </thead>
        <?php 
           

            foreach ($exams->fetch_all() as $row) {
                echo "<tr>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[7] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[8] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "</tr>";       
            }
            
        ?>
        </table>

        <a href="home.php" class="btn btn-secondary">Naspäť</a>
    </div>

    
</body>
</html>