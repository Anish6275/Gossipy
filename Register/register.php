<?php
	if(strlen($_POST['uid'])<5){
		$message = "Please choose user id with more than 5 characters";
		echo '<script language="javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="../Register/";';
		echo '</script>';
	}else if(strlen($_POST['pass'])<7){
		$message = "Please choose your password with more than 7 characters";
		echo '<script language="javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="../Register/";';
		echo '</script>';
	}else{
		include '../dbManager.php';		
	}
	$sql = "SELECT `email` FROM `user` WHERE `email` LIKE '{$_POST['email']}' ;";  
	$result = mysqli_query($conn, $sql);
    if ($result->num_rows <= 0){
		$sql = "SELECT `uid` FROM `user` WHERE `uid` LIKE '{$_POST['uid']}' ;";  
		$result = mysqli_query($conn, $sql);
    	if ($result->num_rows <= 0){		
			$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-=_+~abcdefghijklmnopqrstuvwxyz124567890'; 
    		$verificationCode = substr(str_shuffle($str_result), 0, 55);    		
			$sql = "INSERT INTO `user` (`slno`, `uid`, `pass`, `name`, `image`, `dob`, `gender`, `pno`, `email`, `code`, `verified`)";
			$sql = $sql . "VALUES (NULL, '{$_POST['uid']}', '{$_POST['pass']}', '{$_POST['name']}', 'frontEnd/assets/images/user.png','{$_POST['birthday']}', '{$_POST['gender']}'";
			$sql = $sql . ", '{$_POST['phone']}', '{$_POST['email']}', '{$verificationCode}', '0');";  			
			if(mysqli_query($conn, $sql)){
			    mysqli_close($conn);
				echo "
				<script src='https://smtpjs.com/v3/smtp.js'></script>
				<script>
					function sendMail() {
						Email.send({
							SecureToken: '119525f6-af80-4e4c-9e85-8245cad29b62',
							From: 'verify.gossipy@gmail.com',
							To: '{$_POST['email']}',
							Subject: 'Gossipy Email Verification',
							Body: 'Hey {$_POST['name']}, to verify your email please click the link:- https://gossipy.ga/Register/verify.php?code={$verificationCode}'
						}).then();
					}
					sendMail();
				</script>";
				$message = 'Thank You! Your Account is Created. Check your mail to verify..';
				echo '<script language="javascript">';
				echo 'alert("'.$message.'");';
				echo 'window.location="../Login/";';
				echo '</script>'; 
				
			}
		}else{
			$message = "User ID is not available ";
 			echo '<script language="javascript">';
			echo 'alert("'.$message.'");';
			echo 'window.location="../Register/";';
			echo '</script>'; 
 		}
	}else{
		$message = "This email is already registered!";
		echo '<script language="javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="../Register/";';
		echo '</script>';
	}   	
?>    