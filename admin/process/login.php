<?php
require '../../core/config.php';
session_start();


if(isset($_POST['username']) && isset($_POST['password'])){

	$user = $_POST['username'];
	$pass = $_POST['password'];

	# Check di DB
	$q = mysqli_query($conn,"SELECT * FROM user WHERE USERNAME = '".$user."' AND PASSWORD = '".$pass."'");
	if(mysqli_num_rows($q) > 0){

		$_SESSION['user'] = $user;
	    header("location:".BASE_URL."/index.php"); 
	} else {
		// die(var_dump(mysqli_fetch_assoc($q)));
		echo "Akun tidak ditemukan!";
	}


} else {
	
    header('location:admin/login.php'); 

}