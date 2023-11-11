<?php
session_start();
// Only Manager Can Access this Page
if (isset($_SESSION["role"])) {
  if ($_SESSION['role'] != 'user') {
    if ($_SESSION['role'] == 'admin') {
      header('Location: ./admin/dashboard.php');
    } else {
      header('Location: ./manger/dashboard.php');
    }
  }
} else {
  header('Location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container text-center">
    <h2 class="mt-3">My Profile</h2>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Welcome to My Profile</h5>
        <p class="card-text">
          Explore the options below to modify the information of the users and customize to suit your requirements.
        </p>
        <center>
          <img src="../assets/images/assignment.png" width="350">
        </center>
        <br>
        <a class="btn btn-success" href="#">Dashboard</a>
        <a class="btn btn-dark" href="../logout.php">Logout</a>
      </div>
    </div>
  </div>
</body>

</html>