<?php
session_start();
// Only Admin Can Access this Page
if (isset($_SESSION["role"])) {
  if ($_SESSION['role'] != 'admin') {
    if ($_SESSION['role'] == 'manager') {
      header('Location: ../manager/dashboard.php');
    } else {
      header('Location: ../profile.php');
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
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container text-center">
    <h2 class="mt-3">Dashboard</h2>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Welcome Admin</h5>
        <p class="card-text">
          Explore the options below to modify the information of the users and customize to suit your requirements.
        </p>
        <center>
          <img src="../assets/images/assignment.png" width="350">
        </center>
        <br>
        <a class="btn btn-primary" href="./dashboard.php">Dashboard</a>
        <a class="btn btn-success" href="./create_user.php">Create User</a>
        <a class="btn btn-warning" href="./edit_user.php">Edit Role</a>
        <a class="btn btn-danger" href="./delete_user.php">Delete User</a>
        <a class="btn btn-dark" href="../logout.php">Logout</a>
      </div>
    </div>
  </div>
</body>

</html>