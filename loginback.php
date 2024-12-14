<?php
// Start the session to manage login state
session_start();

// Include database connection file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize it
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit();
    }

    // Query the database to check if the email exists
    $sql = "SELECT * FROM `user` WHERE `email` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, no password verification needed (this bypasses the check)
        $user = $result->fetch_assoc();
        
        // Debugging: Print out user information (you can remove this)
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";

        // Even if the password doesn't match, log the user in
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        // Redirect to the home page (index.html or dashboard)
        header("Location: home.php");
        exit();
    } else {
        // Email not registered
        echo "Email not registered.";
        exit();
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>
