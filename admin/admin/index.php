<?php
session_start();

//check if is logged in
require("../inc/database.php");
if (!isset($_SESSION['sess_email'])) { 
    header('Location: ../login.php');
    exit;
} elseif(isset($_SESSION['sess_email']) && $_SESSION['sess_userrole'] == "user"){
    header('Location: /membrii/');
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/admin/">HOME<span class="sr-only"></span></a>
      </li>
             
    </ul>
    
  </div>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">You are logged as <?php echo  $_SESSION['sess_email']; ?>, this is a <?php echo $_SESSION['sess_userrole'];?> | <a href="logout.php"> Logout </a></li>
  </ol>
</nav>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">E-mail</th>
      <th scope="col">Role</th>
      <th scope="col">Edit Role</th>
    </tr>
  </thead>
  <tbody>

  	<?php

$sql = "SELECT * FROM users ";
  $result = $conn->query($sql);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
  	?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['role']; ?></td>
      <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">+ Edit </a> | <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">- Delete </a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
