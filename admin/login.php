<?php
@session_start();
//getting variables
require("inc/database.php");
    if(isset($_SESSION['sess_userrole']))$role = $_SESSION['sess_userrole'];
    if(isset($_SESSION['sess_email']))$sessemail = $_SESSION['sess_email'];
    $Err = '';
    if(isset($_POST['email']))$pemail = $_POST['email'];
    if(isset($_POST['password']))$ppasword = $_POST['password'];
    $ppasword = md5($ppasword);
//checking if is logged in
 if(isset($_SESSION['sess_email']) && $_SESSION['sess_userrole'] == "admin"){
           header('Location: /admin/');
      }
  elseif(isset($_SESSION['sess_email']) && $_SESSION['sess_userrole'] == "user"){
        header('Location: /membrii/');

  }else { 

$q = 'SELECT * FROM users WHERE email=:pemail';
$query = $conn->prepare($q);
$query->execute(array(':pemail' => $pemail));
// checking if everyting is ok
if (isset($_POST['btnLog'])) {

  if(empty($_POST['email'])){
    $Err = "Email is required";
  }elseif(empty($_POST['password'])){
    $Err = "Password is required";
  }elseif(!filter_var($pemail, FILTER_VALIDATE_EMAIL)) {
     $Err = "Incorrect email format (ex: email@email.com)";
  }elseif($query->rowCount() == FALSE) {
    $Err = "E-mail address is not registered.";
  }else {
  

$sql = "SELECT * FROM users WHERE email = :email AND valid='1'";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':email', $pemail);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//making sessions
  if($ppasword == $row['password']){
    session_regenerate_id();
    $_SESSION['sess_user_id'] = $row['id'];
    $_SESSION['sess_email'] = $row['email'];
    $_SESSION['sess_userrole'] = $row['role'];


// redirecting
    if( $row['role'] == "admin"){
     header('Location: admin/');
     
    }
     else{
     
       header('Location: membrii/');
     }

     }else{
 
$Err = "Incorrect data or please activate Your account ";
     }

  }
} 
?>
<html>
  <head>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
  </head>
  <body>
  	

<div class="logo"></div>
<div class="login-block">
<?php if(!empty($Err)){ ?>
   <p class="error-box alert"><?php echo $Err;?></p>
<?php } ?>
<?php 

// login errors
       if($_GET[activare] == no AND $_GET[valid] == 'err'){
       echo '<p class="error-box alert">Incorrect link</p>';
       }elseif($_GET[activare] == no AND $_GET[valid] == 'yes'){
       echo '<p class="error-box alert">Already activated</p>';
       }elseif($_GET[activare] == no AND $_GET[exp] == 'err'){
       echo '<p class="error-box alert">Expired Link (Only 24 Hours Available)</p>';
       } elseif($_GET['activare'] == 'yes' ){
       echo '<p class="success-box alert"> Activated . Please login.</p>';
     }
?>
<?php 
// changing password errors
                       $ok = array(
                        1=>"Password changed. You can log in to your account."
                                  );
                       $ok_id = isset($_GET['ok']) ? (int)$_GET['ok'] :0;
                       if ($ok_id == 1) {
                           echo '<div class="success-box alert"> '.$ok[$ok_id].'</div>';
                           }
?>

    <form action="" method="post">
    	<label for="email">E-mail</label>
    <input type="text" value="" name="email"  id="email" />
    	<label for="password">Password</label>
    <input type="password" name="password" value=""  id="password" />
    <button name="btnLog">Login</button>
    </form>
    <a href="register.php"> Do not have an account? </a>  |  <a href="recovery.php"> I lost My password. </a>
</div>
  </body>

</html>
<?php } ?>