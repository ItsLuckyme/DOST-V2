<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default for XAMPP
$dbname = "register"; // Correct database name

$conn = new mysqli("localhost", "root", "", "register");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>     