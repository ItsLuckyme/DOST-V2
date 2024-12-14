<?php
// Include database connection file
include 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and capture form input
    $first_name = isset($_POST['first-name']) ? $conn->real_escape_string($_POST['first-name']) : '';
    $middle_initial = isset($_POST['middle-initial']) ? $conn->real_escape_string($_POST['middle-initial']) : '';
    $last_name = isset($_POST['last-name']) ? $conn->real_escape_string($_POST['last-name']) : '';
    $suffix = isset($_POST['suffix']) ? $conn->real_escape_string($_POST['suffix']) : '';
    $gender = isset($_POST['gender']) ? $conn->real_escape_string($_POST['gender']) : '';
    $mobile_number = isset($_POST['mobile']) ? $conn->real_escape_string($_POST['mobile']) : '';
    $primary_institution = isset($_POST['institution']) ? $conn->real_escape_string($_POST['institution']) : '';
    $position = isset($_POST['position']) ? $conn->real_escape_string($_POST['position']) : '';
    $employment_status = isset($_POST['employment-status']) ? $conn->real_escape_string($_POST['employment-status']) : '';
    $field_of_st = isset($_POST['field-of-st']) ? $conn->real_escape_string($_POST['field-of-st']) : '';
    $primary_course = isset($_POST['primary-course']) ? $conn->real_escape_string($_POST['primary-course']) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : ''; // Capture email
    $password = isset($_POST['password']) ? $_POST['password'] : '';  // Capture password
    $confirm_password = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';  // Confirm password

    // Validate if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit();
    }

    // Check if email already exists in the database
    $checkEmailQuery = "SELECT * FROM `user` WHERE `email` = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
        $stmt->close();
        $conn->close();
        exit();
    }

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to insert data into the database
    $insertQuery = "INSERT INTO `user` (`first-name`, `middle-initial`, `last-name`, `suffix`, `gender`, `email`, 
                                      `mobile`, `institution`, `position`, `employment-status`, `field-of-st`, 
                                      `primary-course`, `password`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertQuery);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssssssssss", $first_name, $middle_initial, $last_name, $suffix, $gender, $email, 
                      $mobile_number, $primary_institution, $position, $employment_status, $field_of_st, 
                      $primary_course, $hashed_password);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
