<?php 
	session_start();
	if(!$_SESSION['userID']){
		header("location: index.php");
		exit;
	} else {
		include "home.php";
	}
?>