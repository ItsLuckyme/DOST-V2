<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

// Include the header file
include("header.php");

// Database connection
$conn = new mysqli("localhost", "root", "", "register");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch list of institutions
$sql = "SELECT * FROM institutions"; // Replace 'institutions' with your actual table name
$result = $conn->query($sql);

// Check if query executed successfully
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RRDIC Portal</title>
  <link rel="stylesheet" href="css/institutions.css" />
</head>
<body>
<section id="institutions-list">
    <h3>List of Institutions</h3>
    <ul id="institutions">
        <?php
        // Loop through and display each institution
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['name']) . "</li>";
        }
        ?>
    </ul>
</section>
<script src="js/script.js"></script>
</body>
</html>

<?php
// Free the result and close the connection
$result->free();
$conn->close();
?>
