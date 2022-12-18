<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="mystylerocks.css" rel="stylesheet" type="text/css"> 
	<title>JoK3BoX</title>
</head>
<body>
	<h1>JoK3BoX</h1>
	<?php
		session_start();
		include "db_conn.php";
		$result = mysqli_query($conn, "SELECT userName FROM `users` WHERE userID=".$_SESSION['userID']."");
		if(mysqli_num_rows($result)!=NULL){
			for ($i=0; $i<mysqli_num_rows($result); $i++){
				$useRName = mysqli_fetch_row($result);
				echo "<p align=\"right\">Welcome ".$useRName[0];
			}
		}
		mysqli_close($conn);
	?>
		<form method="post">
			<center><button name="getjokes" style="width:auto">Get a new joke now!</button></center>
			
			<br>
			<br>
			
			<?php
				if(isset($_POST['getjokes'])){
					$url  = 'https://icanhazdadjoke.com/';
					$ch   = curl_init($url);
					curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept:text/plain']);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$data = curl_exec($ch);
					curl_close($ch);
					echo $data;
					echo "<br>";
					echo " <u>Press cross to save the joke.</u>";
					echo "<a href=\"addjoke.php?userID=".$_SESSION['userID']."&joke=".$data."\"><img src=\"OIP.jfif\" width=\"25\" height=\"25\"></a></td>\n";
				}	   
			?>
		</form>
		<br>
		<br>
		<br>
		<br>
		<form action="myjokes.php" method="post">
			<center><button name="allmyjokes" style="width:auto" value="submit">All my jokes!</button></center>
		</form>
		<br>
		<br>
		
		<form action="logout.php" method="post">
		<footer>
			<center><button name="logout" value="submit" style="width:auto" class="btn">Logout</button></center>
			</footer>
		</form>

</body>
</html>