<?php
include_once('connection.php');
 
class User extends Connection{
 
    public function __construct(){
 
        parent::__construct();
    }
 
    public function check_login($username, $password){
        $sql = "SELECT ab.* FROM ( SELECT id, fname, surname, username, degreeBefore, degreeAfter, 1 as teacher, password FROM teachers UNION ALL SELECT id, fname, surname, username, null as col5, null as col6, 0 as teacher, password FROM STUDENTS ) ab WHERE username = '$username' AND password = '$password'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }

    public function details($sql){
        $query = $this->connection->query($sql);
        return $query->fetch_array();
    }

    public function getQuery($sql){
        return $this->connection->query($sql);
    }
 
    public function escape_string($value){
        return $this->connection->real_escape_string($value);
    }

    public function getUserDetails() {
        //fetch user data
        $sql = "SELECT ab.* FROM ( SELECT id, fname, surname, username, degreeBefore, degreeAfter, 1 as teacher, password FROM teachers UNION ALL SELECT id, fname, surname, username, null as col5, null as col6, 0 as teacher, password FROM STUDENTS ) ab WHERE ab.id = '".$_SESSION['user']."'";
        return $this->details($sql);
    }

    public function getTeacherCourses() {
        $sql = "SELECT * FROM courses LEFT JOIN teachers2courses ON courses.id = id_course WHERE id_teacher ='".$_SESSION['user']."'";
        return $this->getQuery($sql);
    }

    public function getStudentCourses() {
        $sql = "SELECT * FROM courses LEFT JOIN students2courses ON courses.id = id_course WHERE id_student ='".$_SESSION['user']."'";
        return $this->getQuery($sql);
    }

    public function getTeacherExams() {
        $sql = "SELECT exams.*, courses.title, courses.examType FROM exams LEFT JOIN courses ON courses.id = exams.id_course WHERE id_teacher = '".$_SESSION['user']."'";
        return $this->getQuery($sql);
    }

    public function getCourses() {
        $sql = "SELECT id_course FROM teachers2courses WHERE id_teacher = '".$_SESSION['user']."'";
        return $this->getQuery($sql);
    }

    public function getRoom() {
        $sql = "SELECT * FROM rooms";
        return $this->getQuery($sql);
    }

    public function updateExams(string $idRoom, string $idTeacher, string $idCourse, int $capacityExam, string $noteExam) {
        $this->connection->query("INSERT INTO exams VALUES (Default, $idRoom, $idTeacher, $idCourse, $capacityExam, $noteExam)");
    }
}

?>