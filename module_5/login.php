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
  <title>Login Page</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container d-flex justify-content-center">
    <div class="card mt-5">
      <div class="card-header">
        <h3>Login Now</h3>
      </div>
      <div class="card-body">

        <form action="login.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
          <a class="btn btn-dark" href="./register.php">Register</a>
          <a class="btn btn-danger" href="./index.php">Home</a>
        </form>

      </div>
    </div>
  </div>
</body>

</html>

<?php
session_start();

// Function to Check User Info
function checkUser($email, $password, $userData)
{
  foreach ($userData as $user) {
    if ($user["email"] === $email && $user["password"] === $password) {
      return true;
    }
  }
  return false;
}

// Function to Check User Role
function checkRole($email, $userData)
{
  foreach ($userData as $user) {
    if ($user["email"] === $email) {
      return $user["role"];
    }
  }
  return null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $jsonData = file_get_contents("users.json");
  $userData = json_decode($jsonData, true);

  $email = $_POST["email"];
  $password = $_POST["password"];

  // Check Credentials
  if (checkUser($email, $password, $userData)) {
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $email;

    $userRole = checkRole($email, $userData);
    if ($userRole !== null) {
      $_SESSION["role"] = $userRole;
    }

    // Redirecting based on role
    if ($userRole == "admin") {
      header("Location: admin/dashboard.php");
    } elseif ($userRole == "manager") {
      header("Location: manager/dashboard.php");
    } else {
      header("Location: profile.php");
    }

    exit();
  } else {
    $errorMessage = "Invalid username or password";
    echo '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
  }
}
?>