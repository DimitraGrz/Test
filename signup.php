<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="cssfile.css">
	<title>Sign Up</title>
</head> 

<body>
	<form action="signup-check.php" method="post">
	<h1>JoK3BoX</h1>
		<center><p>Please fill in this form to create an account.</p></center>
		
		<?php if(isset($_GET['error'])) { ?> 
			<p class="error"><?php echo $_GET['error'];?> </p>
		<?php } ?>

		<label><b>User Name</b></label>
		<input type="text" name="uSname" placeholder="Enter User Name" required>

		<label><b>Email</b></label>
		<input type="text" name="email" placeholder="Enter Email" required>
		
		<label><b>Password</b></label>
		<input type="password" name="password" placeholder="Enter password" required>

		<label><b>Re Password</b></label>
		<input type="password" name="re_password" placeholder="Enter password again" required>

		<button type="submit">Sign Up</button>
		<a href="index.php" class="ca">Already have an account?</a>
	</form>

</body>
</html>