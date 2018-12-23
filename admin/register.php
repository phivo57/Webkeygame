<?php
session_start();
require("inc/database.php");

//Getting variables
$role         = $_SESSION['sess_userrole'];
$Err          = '';
$pusername    = $_POST['username'];
$pemail       = $_POST['email'];
$hashpassword = $_POST['password'];
$hashpassword = sha1($hashpassword);
$activemail   = $_GET['activemail'];
$activare     = $_GET['activare'];
$exp          = $_GET['exp'];
$num1         = rand(1, 10);
$num2         = rand(1, 5);
$sum          = $num1 + $num2;
$oldSum = $_SESSION['sum'];
$_SESSION['sum'] = $sum;
$raspuns      = $_POST['raspuns'];

//Checking if is logged in
if (isset($_SESSION['sess_email']) && $role = "admin") {
    header('Location: /admin/');
} elseif (isset($_SESSION['sess_email']) && $role = "user") {
    header('Location: /membrii/');
} else {
    
    
    
    $q     = 'SELECT email FROM users WHERE email=:pemail';
    $query = $conn->prepare($q);
    $query->execute(array(
        ':pemail' => $pemail
    ));
    
    if (isset($_POST['btnReg'])) {
        
    //registering errors    
        if (empty($_POST["email"])) {
            $Err = "E-mail adress is required";
        } elseif ($query->rowCount() != 0) {
            $Err = "E-mail already registred";
        } elseif (!filter_var($pemail, FILTER_VALIDATE_EMAIL)) {
            $Err = "Incorrect email format (ex: email@email.com)";
        } elseif (empty($_POST["password"])) {
            $Err = "Password is required";
        } elseif (empty($_POST["rpassword"])) {
            $Err = "Confirm password";
        } elseif ($_POST['password'] !== $_POST['rpassword']) {
            $Err = "Passwords do not match";
        } elseif (strlen($_POST['password']) < 6) {
            $Err = "Password must be at least 6 characters long";
        } elseif (empty($_POST["raspuns"])) {
            $Err = "Please verify yourself";
        } elseif ($oldSum != $raspuns) {
        	$Err = "Incorect human verifier";
        }
        
        else {
            
        //insering dates in database    
            $timp = $_SERVER["REQUEST_TIME"];
            $role = 'user';
            $stmt = $conn->prepare("INSERT INTO users(email,password,role,data_log) VALUES(:email, :password, :role, :data_log)");
            $stmt->bindParam(":email", $pemail);
            $stmt->bindParam(":password", $hashpassword);
            $stmt->bindParam(":role", $role);
            $stmt->bindParam(":data_log", $timp);
            
            if ($stmt->execute()) {
                
                
        // sending e-mail        
                $link      = $your_url.'/activare.php?email=' . $pemail . '&timp=' . $timp . '&valid=0';
              
                $to        = $pemail;
                $from      = $your_email;
                $subject   = "You just registered. Activate your account.";
                $message   = <<<EOF
<html>
 <style type="text/css">
.mail {
    padding:22px;
    color:#fff;
    background-color:#3dbf8a;
    border:#288d64;
 }  
 .head {
    padding:32px;
    color:#fff;
    background-color:#cf3636;
    border:#8a1515;
    text-size:22px;
 } 
 </style>

<body>
<div class="head">
Details to activate your account
</div>
<div class="mail">
To activate your account please go to this <a href="$link">Link</a> <br> or copy the next line in your browser  <br>
$link</div> <BR><BR>
Please be careful <BR>
THE RECOVERY LINK IS VALID ONLY 24 HOURS !!!
</body>
</html>
EOF;
                $headers   = "From: $from\r\n";
                $headers .= "Content-type: text/html\r\n";
                $mail = mail($to, $subject, $message, $headers);
                header('Location:inreg.php');
                
            } else {
                echo "Problema Query 1";
            }
            
            
        }
    }
    
?>


<html>
<style>

#passwordStrength
{
	height:30px;
	display:block;
	float:left;
}

.strength0
{
	width:2%;
	background:#cccccc;
}

.strength1
{
	width:15%;
	background:#ff0000;
}

.strength2
{
	width:35%;	
	background:#ff5f5f;
}

.strength3
{
	width:50%;
	background:#56e500;
}

.strength4
{
	background:#4dcd00;
	width:75%;
}

.strength5
{
	background:#399800;
	width:100%;
}


</style>

<!-- Password Strenght  -->
<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Password must be at least 6 characters long";
	desc[1] = "Very weak password";
	desc[2] = "Veak password";
	desc[3] = "Medium Password";
	desc[4] = "Strong Password";
	desc[5] = "Very strong password";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>
  <head>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
  </head>
  <body>
    

<div class="logo"></div>
<div class="login-block">
<?php
    if (!empty($Err)) {
?>
   <p class="error-box alert"><?php
        echo $Err;
?></p>
<?php
    }
?>
<?php
    if ($_GET['activare'] == 'no' AND $_GET['exp'] == 'err') {
        echo '<p class="error-box alert">Link expired.<a href="register.php"> Please complete the registration form again by clicking Here</a></p>';
        $del  = "DELETE  FROM users WHERE email =  :email";
        $stmt = $conn->prepare($del);
        $stmt->bindParam(':email', $activemail);
        $stmt->execute();
        exit;
    }
    if($_GET['activare'] =='no-email'){
        echo '<p class="error-box alert">Something went wrong. Please register again.</p>';
    }
?>

    <form action="" method="post">
    <div>  <label for="email">E-mail</label>
    <input type="text" value="" name="email"  id="email" value="<?php echo $pemail ?>" />
    </div>
      <div id="passwordDescription">Password</div>
    <div>  
    <input type="password" name="password" value=""  id="password" onkeyup="passwordStrength(this.value)"/>
    </div>
    <div>
    <label id="passwordStrength" class="strength0"></label><br>
    </div>
    <div>
    <br>
    <label for="rpassword">Confirm Password</label>
    <input type="password" name="rpassword" value="" id="password" />
     </div>
     <div>
     	
     	<Label for="question">Human Verifier. What Is <?php echo $num1 . ' + ' . $num2 . '?';?> 
     		
     	<input type="text" name="raspuns" id="raspuns" size="2"></input>
     </div>
     <div>
    <button name="btnReg">Create the account</button>
    </div>
    </form>
    <a href="login.php"> I Have an account . LOGIN . </a>
</div>

  </body>

</html>
<?php
}
?>