<?php

// getting variables
$Err ='';
$email = $_POST['email'];
$rec   = $_POST['btnRec'];


require 'inc/database.php';

 

if(isset($rec)){

  $q = 'SELECT * FROM users WHERE email=:email';

  $query = $conn->prepare($q);

  $query->execute(array(':email' => $email));

//Deleting used token
$del = "DELETE  FROM token_key WHERE email =  :email";
$stmt = $conn->prepare($del);
$stmt->bindParam(':email', $email);   
$stmt->execute();



 if(empty($_POST['email'])){
 header('Location: recovery.php?err=2');
 
  }


elseif($query->rowCount() != 0){

  $random = rand(1272891, 5592729);
  $new_password = $random;

  $email_password = $new_password;

  $token = sha1($new_password);

  $timp = $_SERVER["REQUEST_TIME"];
  $stmt = $conn->prepare("INSERT INTO token_key(token,email,timp) VALUES(:token, :email, :timp)");
      $stmt->bindParam(":token", $token);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":timp", $timp);
            
      if($stmt->execute())
      {



 $link = $your_url.'/do-recovery.php?email='.$email.'&token='.$token.'&timp='.$timp.'&valid=1';
$to = $email;
$from = $your_email;
$subject = "Instructions for changing your  Account password";
$message = <<<EOF
<html>
<body>
To change the password please access this <a href="$link">Link</a> <br> or copy the next line in your browser to change your password. <br>
$link <BR><BR>
Please be careful <BR>
THE RECOVERY LINK IS VALID ONLY 24 HOURS !!!
</body>
</html>
EOF;
$headers  = "From: $from\r\n";
$headers .= "Content-type: text/html\r\n";
$mail = mail($to, $subject, $message, $headers);


      }
      else{
        echo "Problema Query 1";
      } 


 header('Location: recovery.php?ok=1');
  
  }else {

 header('Location: recovery.php?err=1');
  }

}else{



?>
<html>
  <head>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
  </head>
  <body>
  	

<div class="logo"></div>
<div class="login-block">

<?php 

                                $errors = array(
                                    1=>"Wrong e-mail address. Please try again",
                                    2=>"Please add an e-mail address.",
                                   
                                    4=>"The recovery link expired. Please create a new one. We need your e-mail address to send a new one.",
                                     5=>"This recovery link hass been used allready. We need your e-mail address to send a new one. ",
                                      6=>"Invalid or used token key. "
                                    
                                  );
                                $ok = array(
                                       1=>"Please check your e-mail address (inbox or spam folder) for more instructions how to change your password.",
                                  );
                                $ok_id = isset($_GET['ok']) ? (int)$_GET['ok'] :0;
                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<div class="error-box alert"> '.$errors[$error_id].'</div>'; 
                                     }elseif ($error_id == 2) {
                                        echo '<div class="error-box alert">'.$errors[$error_id].'</div>';
                                     }elseif ($ok_id == 1) {
                                         echo '<div class="success-box alert"> '.$ok[$ok_id].'</div>';
                                    }
                                     elseif ($error_id == 4) {
                                         echo '<div class="error-box alert"> '.$errors[$error_id].'</div>';
                                     }
                                      elseif ($error_id == 5) {
                                         echo '<div class="error-box alert"> '.$errors[$error_id].'</div>';
                                     }
                                       elseif ($error_id == 6) {
                                         echo '<div class="error-box alert"> '.$errors[$error_id].'</div>';
                                     }

                               ?>  


    <form action="" method="post">
    	<label for="email">E-mail</label>
    <input type="text" value="" name="email"  id="email" />
    	
    <button name="btnRec">Send reset link</button>
    </form>
    <a href="register.php"> Don`t have an account ? </a>  |  <a href="login.php"> Login </a>
</div>
  </body>

</html>
<?php } ?>
