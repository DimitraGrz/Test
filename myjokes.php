<?php
	session_start();
	if(!$_SESSION['userID']){
		header("location: index.php");
		exit;
	} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="mystylerocks.css"> 
	<title>MyJokes</title>
</head>
<body>
<h1>MyJokes</h1>
<?php
		include "db_conn.php";
		$result = mysqli_query($conn, "SELECT joke FROM `comico` WHERE `userID`=".$_SESSION['userID']."");
		if(mysqli_num_rows($result)!=NULL){
			for ($i=0; $i<mysqli_num_rows($result); $i++){
				$jokesrow = mysqli_fetch_row($result);
				echo "<p>".$jokesrow[0];
			}
		}
		mysqli_close($conn);
	}
?>

	<form action="home.php" method="post">
		<button name="return" style="width:auto" value="submit">Return</button>
	</form>
</body>
</html>