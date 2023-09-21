<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/styles.css">
  <!-- Add your custom styles if needed -->
</head>
<body>
  
<div style="margin:auto; margin-top:2%; padding:2% 2%; width: 40%; background-color:#fff5; border-radius:50px;">
<div class="container mt-5">
  <h2 class="text-center">Forgot Password</h2>
  <form method="POST" action="forgotpassword.php">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="newpassword">New Password</label>
      <input type="password" class="form-control" id="newpassword" name="newpassword" required>
    </div>
    <div class="form-group">
      <label for="confirmpassword">Confirm Password</label>
      <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-secondary">Clear</button>
  </form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Include your database connection code here
$servername = "localhost";
$username = "pma"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "game"; // Replace with your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $username = $_POST['username'];
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];

    // Perform validation
    if ($newPassword != $confirmPassword) {
        echo "Password and Confirm Password do not match.";
    } else {
        // Update the user's password in the database
        $sql = "UPDATE regn SET password = '$newPassword' WHERE username = '$username'";

        if ($conn->query($sql) === TRUE) {
            echo "Password reset successful!";
            header("Location: login.php"); // Redirect to the login page
            exit();
        } else {
            echo "Error updating password: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

