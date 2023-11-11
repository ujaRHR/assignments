<?php
session_start();
// Redirect User
if (isset($_SESSION["role"])) {
  if ($_SESSION['role'] == 'admin') {
    header('Location: ../admin/dashboard.php');
  } elseif ($_SESSION['role'] == 'manager') {
    header('Location: ../manager/dashboard.php');
  } else {
    header('Location: ../profile.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container d-flex justify-content-center">
    <div class="card mt-5">
      <div class="card-header">
        <h3>Registration</h3>
      </div>
      <div class="card-body">

        <form action="register.php" method="post">
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
          <button type="submit" class="btn btn-success">Register</button>
          <a class="btn btn-dark" href="./login.php">Login</a>
          <a class="btn btn-danger" href="./index.php">Home</a>
        </form>

      </div>
    </div>
  </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  if (empty($username) || empty($email) || empty($password)) {
    die("All Fields are required");
  }

  $jsonData = file_get_contents("users.json");
  $userData = json_decode($jsonData, true);


  // Check if username or email already exists!
  foreach ($userData as $user) {
    if ($user["username"] === $username || $user["email"] === $email) {
      $errorMessage = "Username or Email already exists";
      die('<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>');
    }
  }

  // By default, everyone is "user"
  $newUserData = [
    "username" => $username,
    "email" => $email,
    "password" => $password,
    "role" => "user"
  ];

  $userData[] = $newUserData;
  $jsonData = json_encode($userData);
  file_put_contents("users.json", $jsonData);

  header("Location: login.php");
}
