<?php
include_once('connection.php');
 
class User extends Connection {

    public function __construct(){
 
        parent::__construct();
    }
 
    public function check_login($login, $password){
        $sql = "SELECT ab.* FROM ( SELECT login, fname, surname, degreeBefore, degreeAfter, 1 as teacher, password FROM teachers UNION ALL SELECT login, fname, surname, null as col5, null as col6, 0 as teacher, password FROM STUDENTS ) ab WHERE login = '$login' AND password = '$password'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['login'];
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
        $sql = "SELECT ab.* FROM ( SELECT login, fname, surname, degreeBefore, degreeAfter, 1 as teacher, password FROM teachers UNION ALL SELECT login, fname, surname, null as col5, null as col6, 0 as teacher, password FROM STUDENTS ) ab WHERE ab.login = '".$_SESSION['user']."'";
        return $this->details($sql);
    }

    public function getTeacherCourses() {
        $sql = "SELECT * FROM courses LEFT JOIN teachers2courses ON courses.id = id_course WHERE login_teacher ='".$_SESSION['user']."'";
        return $this->getQuery($sql);
    }

    public function getStudentCourses() {
        $sql = "SELECT * FROM courses LEFT JOIN students2courses ON courses.id = id_course WHERE login_student ='".$_SESSION['user']."'";
        return $this->getQuery($sql);
    }

    public function getTeacherExams() {
        $sql = "SELECT exams.*, courses.title, courses.examType FROM exams LEFT JOIN courses ON courses.id = exams.id_course WHERE login_teacher = '".$_SESSION['user']."'";
        return $this->getQuery($sql);
    }

    public function getStudentExams() {
        $sql = "SELECT * FROM (SELECT courses.* FROM courses LEFT JOIN students2courses ON courses.id = students2courses.id_course WHERE students2courses.login_student = '".$_SESSION['user']."') as s2c LEFT JOIN exams ON exams.id_course = s2c.id AND exams.id_exam NOT IN (SELECT id_exam FROM students2exams WHERE login_student = '".$_SESSION['user']."')";
        return $this->getQuery($sql);
    }

    public function getCourses() {
        $sql = "SELECT id_course FROM teachers2courses WHERE login_teacher = '".$_SESSION['user']."'";
        return $this->getQuery($sql);
    }

    public function getClass() {
        $sql = "SELECT * FROM classes";
        return $this->getQuery($sql);
    }

    public function insertExam(string $idClass, string $loginTeacher, string $idCourse, string $date, string $time, int $capacityExam, string $noteExam) {
        $db = new connection();
        $sql = "INSERT INTO exams (id_class, login_teacher, id_course, date, time, capacity, note) VALUES ('$idClass', '$loginTeacher', '$idCourse', '$date', '$time', '$capacityExam', '$noteExam')";
        $db->getQuery($sql);

        header("Refresh: 1");
    }

    public function registrateExam($id_exam, $loginStudent) {
        $db = new connection();
        $sql = "INSERT INTO students2exams (id_exam, login_student) VALUES ('$id_exam', '$loginStudent')";
        $db->getQuery($sql);

        //header("Refresh: 1");
    }


}

?>