<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="cssfile.css"> 
	<title>JoK3BoX</title>
</head>

<body>
	<form action="login.php" method="post">
		<h1>JoK3BoX</h1>
		<h2>LOGIN</h2>
		
		<?php if(isset($_GET['error'])) { ?> 
			<p class="error"><?php echo $_GET['error'];?> </p>
		<?php } ?>
		
		<label><b>User Name</b></label>
		<input type="text" name="uSname" placeholder="Enter User name">
		
		<label><b>Password</b></label>
		<input type="password" name="password" placeholder="Enter password">

		<button type="submit">Login</button>
		<a href="signup.php" class="ca">Create an account</a>
	</form>

</body>
</html>