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
  <title>Delete User | Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container text-center">
    <h2 class="mt-3">Delete User</h2>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Welcome Admin</h5>
        <p class="card-text">
          Explore the options below to modify the information of the users and customize to suit your requirements.
        </p>
        <a class="btn btn-primary" href="./dashboard.php">Dashboard</a>
        <a class="btn btn-success" href="./create_user.php">Create User</a>
        <a class="btn btn-warning" href="./edit_user.php">Edit Role</a>
        <a class="btn btn-danger" href="./delete_user.php">Delete User</a>
        <a class="btn btn-dark" href="../logout.php">Logout</a>
      </div>
    </div>
    <br>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="bg-success text-white">
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $users = json_decode(file_get_contents('../users.json'), true);
          foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . $user['username'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '<td>' . $user['role'] . '</td>';
            echo '<form method="post" action="./delete_user.php">';
            echo '<input type="hidden" name="user_name" value="' . $user['username'] . '">';
            echo '<td><button type="submit" name="submit" class="btn btn-danger">Delete</button></td>';
            echo '</form>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>


<?php
if (isset($_POST["submit"])) {
  $usernameToDelete = $_POST['user_name'];

  if ($usernameToDelete === 'admin') {
    $errorMessage = "Cannot delete the 'admin' user.";
    echo '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
    exit;
  }

  $users = json_decode(file_get_contents('../users.json'), true);
  $userFound = false;

  foreach ($users as $key => $user) {
    if ($user['username'] === $usernameToDelete) {
      unset($users[$key]);
      $userFound = true;
      break;
    }
  }

  if (!$userFound) {
    $errorMessage = "User not found.";
    echo '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
    exit;
  }

  file_put_contents('../users.json', json_encode($users, JSON_PRETTY_PRINT));
  header('Location: ./delete_user.php');
}
?>