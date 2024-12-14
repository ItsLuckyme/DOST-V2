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
  <link rel="stylesheet" href="css/about.css" />
</head>
<main>
    <section class="about-content">
      <p id="about-text">
        In recognition of the need to monitor the research, development and innovation level of the region and the vital role to have an efficient system that manages and provides reports about RDIs, the Systematic Exploration of Available RDI in the Cordillera Highlands (SEARCH) Information System was developed. This is proposed to be the official repository of researches undertaken in the region and enjoining concerned agencies and HEIs to populate the system.

        The SEARCH will help ensure access to RDI information among stakeholders, effectively monitor RDI programs and projects in the region, ensure optimum use of RDI resources, advocate the utilization and commercialization of researches and innovation.
      </p>
    </section>
  </main>
  <script src="js/about.js"></script>
</html>