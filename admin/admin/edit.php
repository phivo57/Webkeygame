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
  <?php
$U_id = $_GET['id'];
$sql = "SELECT * FROM users where id = $U_id";
  $result = $conn->query($sql);
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">edit user <?php echo $row['email']; ?>
     
    </li>
  </ol>
</nav>
<form action="do-edit.php" method="get">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Please select admin or user</label>
    <select class="form-control" id="role" name="role">
      <option value="admin">admin</option>
      <option value="user">user</option>
      </select>
  </div>
   <input type="hidden" value=<?php echo $U_id; ?> name="Uid">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php } ?>