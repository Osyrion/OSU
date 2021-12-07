<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}
 
include_once('user.php');

$user = new User();
$details = $user->getUserDetails();
$_SESSION['teacher'] = $details['teacher'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Login using OOP Approach</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">PHP Login using OOP Approach</h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h2>Welcome to Homepage </h2>
			<h4>User Info: </h4>
			<p>Name: <?php echo $details['fname']; ?></p>
			<p>Username: <?php echo $details['surname']; ?></p>
			<p>Password: <?php echo $details['password']; ?></p>
			<a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
		</div>

		<div class="row mt-2">

		<a href="courses.php">
			<button class="btn btn-primary">	
				Moje predmety
			</button>
		</a>

		<a href="exams.php">
			<button class="btn btn-primary mt-2">
				Moje termíny
			</button>
		</a>
		
		</div>
	</div>
</div>
</body>
</html>