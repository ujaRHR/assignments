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
  <title>Create User | Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container text-center">
    <h2 class="mt-3">Create New User</h2>

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
    <div class="container h-100">
      <div class="row h-50 justify-content-center align-items-center">
        <div class="col-md-4">
          <div class="card-body">
            <form action="create_user.php" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="role" class="form-label">Set Role</label>
                <select class="form-select" id="role" name="role">
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                  <option value="manager">Manager</option>
                </select>
              </div>

              <button type="submit" name="submit" class="btn btn-success">Create Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


<?php
if (isset($_POST["submit"])) {
  $newUsername = $_POST['username'];
  $newEmail = $_POST['email'];
  $newPassword = $_POST['password'];
  $newRole = $_POST['role'];

  $users = json_decode(file_get_contents('../users.json'), true);

  // Check if user already exist
  foreach ($users as $user) {
    if ($user['username'] === $newUsername || $user['email'] === $newEmail) {
      $errorMessage = "Username or Email already exists";
      echo '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
      exit;
    }
  }

  $newUser = array(
    'username' => $newUsername,
    'email' => $newEmail,
    'password' => $newPassword,
    'role' => $newRole
  );

  $users[] = $newUser;
  file_put_contents('../users.json', json_encode($users, JSON_PRETTY_PRINT));
  header('Location: ./create_user.php');
}
?>