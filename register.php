<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="css/login.css" />
</head>
<body>
  <nav class="top-nav">
    <div class="nav-buttons">
      <button onclick="location.href='index.html'">Home</button>
      <button onclick="location.href='about.html'">About Us</button>
      <button onclick="location.href='announcement.html'">Announcement</button>
      <button onclick="location.href='login.html'">Login/Register</button>
    </div>
  </nav>

  <header class="head">
    <div class="header-container">
      <div class="logos">
        <img src="images/2. RRDIC--.png" alt="RRDIC Logo" />
        <img src="images/1. DOST.png" alt="DOST Logo" />
        <img src="images/3. SEARCH_logo.png" alt="SEARCH Logo" />
      </div>
      <div class="header-content">
        <h3>Republic of the Philippines</h3>
        <h1>Department of Science and Technology</h1>
        <h3>Cordillera Administrative Region</h3>
        <h2>REGIONAL RESEARCH, DEVELOPMENT AND INNOVATION COMMITTEE</h2>
      </div>
    </div>
  </header>

  <section class="form-section">
    <div class="form-container">
      <h2>Create an Account</h2>
      <form id="registerForm" action="registerback.php" method="post" onsubmit="return validatePasswords();">
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required />
        
        <label for="middle-initial">Middle Initial:</label>
        <input type="text" id="middle-initial" name="middle-initial" placeholder="Enter your middle initial" required />
        
        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required />

        <label for="suffix">Suffix (Jr, Sr, etc.):</label>
        <input type="text" id="suffix" name="suffix" placeholder="Enter your suffix" />

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>

        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" required />

        <label for="institution">Primary Institution:</label>
        <select id="institution" name="institution" required>
            <option value="Choose">Choose</option>
            <option value="abra-state-insitute">Abra State Institute of Science and Technology</option>
            <option value="apayao-state-college">Apayao State College</option>
            <option value="benguet-state-university">Benguet State University</option>
            <option value="ifugao-state-university">Ifugao State University</option>
            <option value="kalinga-state-university">Kalinga State University</option>
            <option value="mountain-province-state-university">Mountain Province State University</option>
            <option value="university-of-philippines-baguio">University of the Philippines-Baguio</option>
            <option value="university-of-baguio">University of Baguio</option>
            <option value="university-of-the-cordilleras">University of the Cordilleras</option>
            <option value="saint-louis-university">Saint Louis University</option>
            <option value="pines-city-colleges">Pines City Colleges</option>
            <option value="easter-college-inc">Easter College Inc.</option>
            <option value="baguio-central-university">Baguio Central University</option>
            <option value="agricultural-training-institute">Agricultural Training Institute-CAR</option>
            <option value="commission-on-higher-education">Commission on Higher Education-CAR</option>
            <option value="department-of-science-and-technology">Department of Science and Technology-CAR</option>
            <option value="department-of-agriculture">Department of Agriculture-CAR</option>
            <option value="department-of-environment">Department of Environment and Natural Resources-CAR</option>
            <option value="department-of-education">Department of Education-CAR</option>
            <!-- Other institutions -->
        </select>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" placeholder="Enter your position" required />

        <label for="employment-status">Employment Status:</label>
        <select id="employment-status" name="employment-status" required>
            <option value="Choose">Choose</option>
            <option value="permanent">Permanent</option>
            <option value="contract">Contract of Service</option>
        </select>

        <label for="field-of-st">Field of S&T:</label>
        <select id="field-of-st" name="field-of-st" required>
            <option value="Choose">Choose</option>
            <option value="natural-sciences">Natural Sciences</option>
            <option value="engineering-and-technology">Engineering and Technology</option>
            <option value="medical-and-health-sciences">Medical and Health Sciences</option>
            <option value="agricultural-sciences">Agricultural Sciences</option>
            <option value="social-sciences">Social Sciences</option>
            <option value="humanities">Humanities</option>
        </select>

        <label for="primary-course">Primary Course / Specialization:</label>
        <select id="primary-course" name="primary-course" required>
            <option value="Choose">Choose</option>
            <option value="medical-and-health-sciences">Medical and Health Sciences</option>
            <option value="engineering-and-technology">Engineering and Technology</option>
            <option value="business-and-management">Business and Management</option>
            <option value="social-sciences-and-humanities">Social Science and Humanities</option>
            <option value="natural-sciences">Natural Sciences</option>
            <option value="agriculture-and-related-fields">Agriculture and Related Fields</option>
            <option value="arts-and-designs">Arts and Designs</option>
            <option value="law-and-legal-studies">Law and Legal Studies</option>
            <option value="education-and-teaching">Education and Teaching</option>
            <option value="communication-and-media">Communication and Media</option>
        </select>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />

        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required />

        <p id="password-warning" style="color: red; display: none;">Passwords do not match. Please try again.</p>

        <button type="submit">Register</button>
      </form>

      <p>Already have an account? <a href="login.html">Login here</a></p>
    </div>
  </section>

  <script>
    // JavaScript function to validate passwords
    function validatePasswords() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirm-password").value;
      
      // Check if passwords match
      if (password !== confirmPassword) {
        document.getElementById("password-warning").style.display = "block"; // Show warning
        return false; // Prevent form submission
      } else {
        document.getElementById("password-warning").style.display = "none"; // Hide warning
        return true; // Allow form submission
      }
    }
  </script>
</body>
</html>
