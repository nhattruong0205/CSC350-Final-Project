<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "CSC350";

// Establish a connection to the database
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Note: Consider encrypting passwords for security

    // Prepare SQL statement to insert data into a 'users' table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo 'New record created successfully';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Signup</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <h2>Sign Up</h2>
  <form action="register.php" method="post">
    <label for="firstName">First name:</label><br>
    <input type="text" id="firstName" name="firstName"><br><br>

    <form action="register.php" method="post">
    <label for="lastName">Last name:</label><br>
    <input type="text" id="lastName" name="lastName"><br><br>

    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob"><br><br>

    <label for="gender">Gender:</label><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br><br>
    
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    
    <label for="phone">Phone Number:</label><br>
    <input type="tel" id="phone" name="phone"><br><br>

    <label for="role">Role of Job:</label><br>
    <select id="role" name="role">
      <option value="engineer">Engineer</option>
      <option value="designer">Designer</option>
      <option value="manager">Manager</option>
      <!-- Add more options as needed -->
    </select><br><br>

    <input type="submit" value="Sign Up">
    <br><br>
    <button class= "back"><a href="landing.html"> Back <button>
  </form>
</body>

</html>