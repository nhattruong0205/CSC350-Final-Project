<?php
session_start(); // Start or resume a session

// Database connection
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "CSC350";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate login (In a real scenario, you'd hash passwords and check against a database)
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Correct username and password
        $_SESSION['username'] = $username; // Store username in session variable
        header("Location: dashboard.php"); // Redirect to dashboard or another page after successful login
        exit();
    } else {
        // Invalid username or password
        echo "Invalid username or password. Please try again.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <h2>Login</h2>
  <form action="login.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    
    <input type="submit" value="Login">
</body>
</html>

<br><br>
<button class= "back" ><a href="landing.html"> Back <button>