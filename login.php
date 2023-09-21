<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/styles.css">
  <!-- Add your custom styles if needed -->
</head>
<body>
  
<div style="margin:auto; margin-top:2%; padding:2% 2%; width: 40%; background-color:#fff5; border-radius:50px;">
<div class="container mt-5">
  <h2 class="text-center">Login</h2>
  <form method="POST" action="login.php">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <button type="reset" class="btn btn-secondary">Clear</button>
    <p class="mt-3">Don't have an account? <a href="index.php">Sign up</a></p>
    <p><a href="forgotpassword.php">Forgot Password?</a></p>
  </form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

<?php
// Database configuration
$host = 'localhost';
$dbUsername = 'pma';
$dbPassword = '';
$dbName = 'game';

// Establish a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST)) {
    // Retrieve and sanitize user inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check username and password against the database
    $stmt = $conn->prepare("SELECT * FROM regn WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $usertype = $row['usertype'];

        // Redirect based on user type
        if ($usertype === 'admin') {
            header("Location: main.html");
        } else if ($usertype === 'user') {
            header("Location: main.html");
        }
        exit();
    } else {
        echo "<p class='text-center text-danger'>Invalid username or password</p>";
    }

    $stmt->close();
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
