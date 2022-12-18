<?php
	session_start();
	if(!$_SESSION['userID']){
		header("location: index.php");
		exit;
	} else {
		include "db_conn.php";
		$fnjoke = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $_REQUEST['joke']);
		$result = mysqli_query($conn, "INSERT INTO `comico`(`userID`, `joke`) VALUES ('".$_REQUEST['userID']."','".$fnjoke."')");
		mysqli_close($conn);
		header('Location: ' . $_SERVER["HTTP_REFERER"] );
		exit;
	}
?>