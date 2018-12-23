<?php

require("inc/database.php");

// Getting variables
$email = $_GET['email'];
$timp  = $_GET['timp'];
$exp   = 86400; //86400
$valid = $_GET['valid'];

$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if everything is ok

 if (empty($row['email'])) {
        header("Location: register.php?activare=no-email");
     }elseif ($valid !== '0') {
         header('Location: login.php?activare=no&valid=err');
    }elseif ($_SERVER["REQUEST_TIME"] - $timp > $exp) {
         header("Location: register.php?activemail=" . $email . "&activare=no&exp=err");
    } elseif ($row['valid'] > 0) {
     header('Location: login.php?activare=no&valid=yes');
    } else {

  // update database
        

$sql2 = "UPDATE users SET valid = :valid WHERE email = :email";
$stmt = $conn->prepare($sql2);
$stmt->bindValue(':valid', 1);
$stmt->bindValue(':email', $email);
$stmt->execute();

   header('Location: login.php?activare=yess');
        }
?>