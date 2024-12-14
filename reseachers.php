<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Researchers - RRDIC Portal</title>
  <link rel="stylesheet" href="css/researchers.css" />
</head>
<body>
  <nav class="top-nav">
    <div class="nav-buttons">
      <button onclick="location.href='index.html'">Home</button>
      <button onclick="location.href='about.html'">About Us</button>
      <button onclick="location.href='announcement.html'">Announcement</button>
      <button onclick="location.href='login.html'">Login/Register</button>
    </div>
    <div class="search-bar">
      <form action="#" method="get">
        <input type="text" placeholder="Search..." name="search" />
        <button type="submit">Search</button>
      </form>
    </div>
  </nav>
  <!-- Header Section -->
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
  <nav class="main-buttons">
    <button onclick="location.href='RD_projects.html'">Research and Development Projects</button>
    <button onclick="location.href='reseachers.php'">Researchers</button>
    <button onclick="location.href='institutions.html'">Institutions</button>
    <button onclick="location.href='RnD_facilities.html'">R&D Facilities</button>
    <button onclick="location.href='patents_projects.html'">IP Rights and Patents</button>
  </nav>

  <!-- Researchers List Section -->
  <section id="researchers-list">
    <h3>List of Researchers</h3>
    <ul id="researchers">

    </ul>
  </section>

  <!-- JavaScript -->
  <script src="js/script.js"></script>
  <script>
    function searchResearchers() {
      var input = document.getElementById('searchInput').value.toLowerCase();
      var researchers = document.querySelectorAll('.researcher-item');
      researchers.forEach(function(researcher) {
        var text = researcher.textContent.toLowerCase();
        if (text.includes(input)) {
          researcher.style.display = 'list-item';
        } else {
          researcher.style.display = 'none';
        }
      });
    }
  </script>
</body>
</html>
