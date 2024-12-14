<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}
include("header.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Page</title>
  <link rel="stylesheet" href="css/account.css">
</head>
<body>
  <div class="container">
    <h1>Account Information</h1>
    <div id="accountDetails">
      <p>First Name: <span id="firstName"></span></p>
      <p>Middle Initial: <span id="middleInitial"></span></p>
      <p>Last Name: <span id="lastName"></span></p>
      <p>Suffix: <span id="suffix"></span></p>
      <p>Gender: <span id="gender"></span></p>
      <p>Email: <span id="email"></span></p>
      <p>Mobile: <span id="mobile"></span></p>
      <p>Institution: <span id="institution"></span></p>
      <p>Position: <span id="position"></span></p>
      <p>Employment Status: <span id="employmentStatus"></span></p>
      <p>Field of Study: <span id="fieldOfStudy"></span></p>
      <p>Primary Course: <span id="primaryCourse"></span></p>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
