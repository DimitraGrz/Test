<?php
	session_start();
	include "db_conn.php";

	if (isset($_POST['uSname']) && isset($_POST['email'])
		&& isset($_POST['password']) && isset($_POST['re_password'])){

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	
		$uSname = validate($_POST['uSname']);
		$passwd = validate($_POST['password']);
		$re_pass = validate($_POST['re_password']);
		$email = validate($_POST['email']);

		$user_data = 'uSname='. $uSname. '&email='. $email;
		
		// Validate password strength
		$uppercase		= preg_match('@[A-Z]@', $passwd);
		$lowercase	 	= preg_match('@[a-z]@', $passwd);
		$number   		= preg_match('@[0-9]@', $passwd);
		$specialChars 	= preg_match('@[^\w]@', $passwd);


		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($passwd) < 8	) {
			header("Location: signup.php?error=Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character&".$user_data."");
			exit();
			
		}else if($passwd !== $re_pass){
			header("Location: signup.php?error=The current password does not match.&".$user_data."");
			exit();

		} else {	
				$result = mysqli_query($conn, "SELECT * FROM `users` WHERE userName='$uSname'");
				$result2 = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");

				if(mysqli_num_rows($result) > 0) {
					header("Location: signup.php?error=This username is used, try another one.&$user_data");
					exit();
				
				} else if(mysqli_num_rows($result2) > 0){
					header("Location: signup.php?error=This email is used, try another one.&$user_data");
					exit();
				
				} else {
					$result3 = mysqli_query($conn, "INSERT INTO `users`(`userName`, `password`, `email`) VALUES ('".$uSname."','".$passwd."','".$email."')");
					header("Location: index.php?WELCOME");
					exit();
				}
		}
		
	}	
?>