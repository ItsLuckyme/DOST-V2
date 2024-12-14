<?php
session_start();
include 'connection.php'; // Include your database connection script

// Assuming you have the user ID stored in a session
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "User is not logged in"]);
    exit;
}

$userId = $_SESSION['user_id']; // Retrieve the user ID from session

// SQL Query to fetch user details
$sql = "SELECT `first-name`, `middle-initial`, `last-name`, `suffix`, `gender`, `email`, `mobile`, `institution`, `position`, `employment-status`, `field-of-st`, `primary-course` FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc()); // Send user data as JSON
    } else {
        echo json_encode(["error" => "No account details found"]);
    }
    $stmt->close();
} else {
    echo json_encode(["error" => "Database query failed"]);
}

$conn->close();
?>
