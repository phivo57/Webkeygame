<?php 
	require 'inc/database.php';

// Getting variables
$email = $_POST['email'];
$token = $_POST['token'];
$password = $_POST['password'];
$rpassword = $_POST['rpassword'];
$new_password = sha1($password);
$timp = $_POST['timp'];
$valid = $_POST['valid'];
$new_v =0;


// Check if everything is ok

	if(empty($_POST['password'])){
		header("Location: do-recovery.php?email=".$email."&token=".$token."&timp=".$timp."&valid=".$valid."&err=1");
	}
	elseif(empty($_POST['rpassword'])){
		header("Location: do-recovery.php?email=".$email."&token=".$token."&timp=".$timp."&valid=".$valid."&err=2");
	}
	elseif(strlen($password) < 6){
		header("Location: do-recovery.php?email=".$email."&token=".$token."&timp=".$timp."&valid=".$valid."&err=3");
	}
	elseif($password !== $rpassword){
		header("Location: do-recovery.php?email=".$email."&token=".$token."&timp=".$timp."&valid=".$valid."&err=4");
	}
else {

// update database
		
$update = "UPDATE users SET password = :new_password WHERE email = :email";
$stmt = $conn->prepare($update);
$stmt->bindValue(':new_password', $new_password);
$stmt->bindValue(':email', $email);
$stmt->execute();
//------------------------------
$update2 = "UPDATE token_key SET valid = :new_v WHERE email = :email";
$stmt = $conn->prepare($update2);
$stmt->bindValue(':new_v', $new_v);
$stmt->bindValue(':email', $email);
$stmt->execute();


// We Send e-mail 
$date = date("l Y-m-d");
$to = $email;
$from = $your_email;
$subject = "Password was succesfuly changend";
$message = <<<EOF
<html>
<body>
Your  password was changend $date
</body>
</html>
EOF;
$headers  = "From: $from\r\n";
$headers .= "Content-type: text/html\r\n";
$mail = mail($to, $subject, $message, $headers);

header('Location: login.php?ok=1');
}
?>