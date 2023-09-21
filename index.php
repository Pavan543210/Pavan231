<?php
$servername = "localhost";
$username = "pma";
$password = "";
$dbname = "game"; // Update with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    $sql = "INSERT INTO regn (fname, lname, username, password, usertype)
            VALUES ('$firstname', '$lastname', '$username', '$password', '$usertype')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php"); // Redirect to login page
        exit(); // Terminate the script
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div style="margin:auto; margin-top:2%; padding:2% 2%; width: 40%; background-color:#fff5; border-radius:50px;">
    <div class="container mt-5">
        <h2>Registration Form</h2>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="usertype">User Type:</label>
                <select class="form-control" id="usertype" name="usertype" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Register</button>
           
      <button type="reset" class="btn btn-primary">Clear</button>
    </div>

    <p class="text-center mt-3">Already have an account? <a href="login.php">Sign in</a></p>
        </form>
    </div>
</div>
</body>
</html>
