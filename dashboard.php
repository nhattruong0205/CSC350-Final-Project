<?php
session_start(); // Start or resume the session
include_once "db_connection.php"; // Include the database connection file

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Retrieve the username from the session variable
    $role = $_SESSION['role'];
    
    // Use the $username variable as needed in the dashboard
    $sql = "SELECT * FROM jobs WHERE jobName='$role'";
    $result = mysqli_query($conn, $sql);

    $wage = "";
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $wage = $row['wages'];
    } else {
        $wage = "No wage data available for this role.";
    }

    // Use the $username variable as needed in the dashboard
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userID = $row['userID'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $username= $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $phone = $row['phone'];
        $role= $row['role'];
    } else {
        echo("No data available for this.");
    }
} else {
    // If the username is not set in the session, handle the situation (e.g., redirect to login)
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
  </head>
  <style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
      }
      
      li {
        float: left;
      }
      
      li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      
      li a:hover {
        background-color: #111;
      }
  </style>

  <body>
    <ul>
      <li><a href="#dashboard" onclick="showDashboard(event)">Dashboard</a></li>
      <li><a href="personalInfo.php">PersonalInfo</a></li>
      <li><a href="#calPayRoll" onclick="showCalculatePayRoll(event)">Calculate Payroll</a></li>
      <li><a href="#incomingSalary" onclick="showInComingPayDate(event)">Incoming salary</a></li>
      <li><a href="#showBalance" onclick="showBalance(event)">Balance Statement</a></li>
      <li><a href="landing.html">Log out</a></li>
    </ul>
   
    <div id="dashboard">
      <!-- Content for the Dashboard section -->
      <h2>Welcome, <?php echo $username; ?>!</h2>
      <h2>Your role is: <?php echo $role; ?></h2>
      <h2>Your wage is: <?php echo $wage; ?></h2>
      <h2>Your gender: <?php echo $gender; ?></h2>
      <h2>Your userID: <?php echo $userID; ?></h2>
    </div>

    <div id="calPayRoll" style="display: none;">
      <!-- Content for the Calculate Payroll section -->
      <h1>Calculate Payroll</h1>
      <label for="hours">Hours Worked:</label><br>
         <input type="number" id="hours" min="0"><br><br>
  
         <button onclick="calculateWage(<?php echo $wage; ?>)">Calculate</button> <!-- Pass the wage as an argument -->

  <p id="result"></p>

  <!-- Include the JavaScript file -->
  <script src="wageCalculator.js"></script>
    </div>

    <div id="incomingSalary" style="display: none;">
      <!-- Content for the Calculate Payroll section -->
      <h1>Incoming Salary</h1>
    </div>

    <div id="showBalance" style="display: none;">
      <!-- Content for the Calculate Payroll section -->
      <h1> Balance Statement</h1>
    </div>

    <script>
        function showDashboard(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            document.getElementById('dashboard').style.display = 'block';
            document.getElementById('calPayRoll').style.display = 'none';
            document.getElementById('incomingSalary').style.display = 'none';
            document.getElementById('showBalance').style.display = 'none';
          }
          
          function showCalculatePayRoll(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('calPayRoll').style.display = 'block';
            document.getElementById('incomingSalary').style.display = 'none';
            document.getElementById('showBalance').style.display = 'none';
          }

          function showInComingPayDate(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('calPayRoll').style.display = 'none';
            document.getElementById('incomingSalary').style.display = 'block';
            document.getElementById('showBalance').style.display = 'none';
          }

          function showBalance(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('calPayRoll').style.display = 'none';
            document.getElementById('incomingSalary').style.display = 'none';
            document.getElementById('showBalance').style.display = 'block';
          }
    </script>
</body>
  
</html>
