<?php
	session_start();
	if(!isset($_POST["uSname"]) && !isset($_POST["password"])){
		header("location: index.php");
		exit;
	} else if (isset($_POST['uSname']) && isset($_POST['password'])){
		include "db_conn.php";
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$uSname = validate($_POST['uSname']);
		$passwd = validate($_POST['password']);
		$result = mysqli_query($conn, "SELECT * FROM users WHERE userName='".$uSname."' AND password='".$passwd."' ");
		if(mysqli_num_rows($result)>0) {
			$row = mysqli_fetch_assoc($result);
			if($row['userName'] == $uSname && $row['password'] == $passwd){
				$_SESSION['userName'] = $row['userName'];
				$_SESSION['userID'] = $row['userID'];
				header("Location: dadjokes.php");
				exit();
			}
		} else {
			header("Location: index.php?error=Incorrect username or password.");
			exit();
		}
	} else {
		header("Location: index.php?error=Incorrect username or password.");
		exit();
	}
?>