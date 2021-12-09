<?php
	//start session
	session_start();
 
	//redirect if logged in
	if(isset($_SESSION['user'])){
		header('location:home.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>VYDA Projekt</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<body>

<div class="container">
	<h1 class="text-center">VYDA Projekt</h1>
	<div class="row justify-content-center">
		<form action="login.php" method="POST" class="col-4 mt-5 p-2 border border-secondary border-2 rounded">
			<div class="form-group mt-2">
				<input class="form-control" id="login" name="login" placeholder="login" type="text" autofocus required>
			</div>
			<div class="form-group mt-2">
				<input class="form-control" id="password" name="password" placeholder="heslo" type="text" required>
			</div>
			<div class="d-grid gap-2 mt-2">
				<button type="submit" name="submit" class="btn btn-primary">Prihlásiť sa</button>
			</div>
		</form>
	</div>
	<div class="row justify-content-center">
	<?php
		if(isset($_SESSION['message'])){
			?>
				<div class="col-4 mt-5">
					<div class="alert alert-danger text-center p-4">
						<?php echo $_SESSION['message']; ?>
					</div>
				</div>
			<?php

			unset($_SESSION['message']);
		}
	?>
	</div>
</div>
</body>
</html>