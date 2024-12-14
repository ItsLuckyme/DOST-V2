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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RRDIC Portal</title>
  <link rel="stylesheet" href="css/researchers.css" />
</head>
<section id="researchers-list">
    <h3>List of Researchers</h3>
    <ul id="researchers">
    </ul>
  </section>
  <script src="js/script.js"></script>
</html>