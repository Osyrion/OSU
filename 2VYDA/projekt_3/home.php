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
	<h1 class="page-header text-center my-4">Informačný systém</h1>
	<div class="row">
		<div class="col-6 mt-3">
			<div class="border border-5 border-dark rounded p-3">
				<div class="row">
					<div class="col-4">
						<?php 
						if ($details['teacher']) { 
							print_r('<i class="fas fa-chalkboard-teacher fa-7x"></i>');
						} else {
							print_r('<i class="mx-4 fas fa-user-graduate fa-7x"></i>');
						}
						?>
					</div>
					<div class="col-8">
						<p><strong><?php $details['teacher'] ? print_r("Pedagóg") : print_r("Študent") ?></strong></p>
						<span>Prihlásený ako:</span>
						<p><strong>
							<?php $details['teacher'] ? 
								print_r($details['degreeBefore'] . " " . $details['fname'] . " " . $details['surname'] . " " . $details['degreeAfter']) :
								print_r($details['fname'] . " " . $details['surname'])
							?></strong></p>
					</div>
				</div>
			</div>
		</div>
		<div class="mt-2">
			<a href="courses.php" class="btn btn-primary">
					Moje predmety
			</a>

			<a href="exams.php" class="btn btn-primary">
					Moje termíny
			</a>
		</div>
	</div>
</div>
</body>
</html>