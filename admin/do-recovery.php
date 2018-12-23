<?php

// Getting variables
  require 'inc/database.php';
$email = $_GET['email'];
$token = $_GET['token'];
$timp = $_GET['timp'];
$exp = 86400; //86400 24 hours
$valid = $_GET['valid'];

$stmt = $conn->query("SELECT valid, token FROM token_key Where email = '$email'");
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

if ($row['valid'] !== $valid){
         header('Location: recovery.php?err=5');
}elseif ($row['token'] !== $token){
         header('Location: recovery.php?err=6');
}elseif ($_SERVER["REQUEST_TIME"] - $timp > $exp) {
         header('Location: recovery.php?err=4');
 }else {
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
  //errors
    $errors = array(
      1=>"Please add a password",
      2=>"Please confirm your password",
      3=>"Please add up to 6 characters",
      4=>"Passwords do not match"
                    );

  $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

     if ($error_id == 1) {
    echo '<div class="error-box alert"> '.$errors[$error_id].'</div>';
     }elseif ($error_id == 2) {
    echo '<div class="error-box alert"> '.$errors[$error_id].'</div>';
     }elseif ($error_id == 3) {
    echo '<div class="error-box alert"> '.$errors[$error_id].'</div>';
      }elseif ($error_id == 4) {
    echo '<div class="error-box alert"> '.$errors[$error_id].'</div>';
                                }?>  



    <form action="do-rec.php" method="post">
    	<label for="password">New password</label>
    <input type="password" value="" name="password"  id="password" />
    	<label for="rpassword">Confirm Your Password</label>
    <input type="password" name="rpassword" value=""  id="password" />
    <input type="hidden" name="email" value="<?php echo $email ?>">
        <input type="hidden" name="token" value="<?php echo $token ?>">
          <input type="hidden" name="timp" value="<?php echo $timp ?>">
             <input type="hidden" name="valid" value="<?php echo $valid ?>">
    <button name="btnRecp">Login</button>
    </form>
    <a href="register.php"> Don`t have an account ? </a> 
</div>
  </body>

</html>
<?php }  }?>