<?php
session_start(); // Start or resume the session

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Retrieve the username from the session variable
    // Use the $username variable as needed in the dashboard
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
      <li><a href="#personalInfo" onclick="showPersonalInfo(event)">PersonalInfo</a></li>
      <li><a href="#calPayRoll" onclick="showCalculatePayRoll(event)">Calculate Payroll</a></li>
      <li><a href="#incomingSalary" onclick="showInComingPayDate(event)">Incoming salary</a></li>
      <li><a href="landing.html">Log out</a></li>
    </ul>
   
    <div id="dashboard">
      <!-- Content for the Dashboard section -->
      <h2>Welcome, <?php echo $username; ?>!</h2>
    </div>

    <div id="personalInfo" style="display: none;">
      <!-- Content for the Personal Information section -->
      <h1>Personal Info</h1>
    </div>

    <div id="calPayRoll" style="display: none;">
      <!-- Content for the Calculate Payroll section -->
      <h1>Calculate Payroll</h1>
    </div>

    <div id="incomingSalary" style="display: none;">
      <!-- Content for the Calculate Payroll section -->
      <h1>Incoming Salary</h1>
    </div>

    <script>
        function showDashboard(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            document.getElementById('dashboard').style.display = 'block';
            document.getElementById('personalInfo').style.display = 'none';
            document.getElementById('calPayRoll').style.display = 'none';
            document.getElementById('incomingSalary').style.display = 'none';
          }
          
          function showPersonalInfo(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('personalInfo').style.display = 'block';
            document.getElementById('calPayRoll').style.display = 'none';
            document.getElementById('incomingSalary').style.display = 'none';
        }
          
          function showCalculatePayRoll(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('personalInfo').style.display = 'none';
            document.getElementById('calPayRoll').style.display = 'block';
            document.getElementById('incomingSalary').style.display = 'none';
          }

          function showInComingPayDate(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('personalInfo').style.display = 'none';
            document.getElementById('calPayRoll').style.display = 'none';
            document.getElementById('incomingSalary').style.display = 'block';
          }
    </script>
</body>
  
</html>
