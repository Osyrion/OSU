<?php
//start session
session_start();
 
include_once('user.php');
 
$user = new User();
 
if(isset($_POST['login'])){
	$login = $user->escape_string($_POST['login']);
	$password = $user->escape_string($_POST['password']);
 
	$auth = $user->check_login($login, $password);
 
	if(!$auth){
		$_SESSION['message'] = 'Nesprávne meno alebo heslo.';
    	header('location:index.php');
	}
	else{
		$_SESSION['user'] = $auth;
		header('location:home.php');
	}
}
else{
	$_SESSION['message'] = 'Najprv sa prihláste.';
	header('location:index.php');
}
?>