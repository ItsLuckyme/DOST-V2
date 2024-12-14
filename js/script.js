const buttons = document.querySelectorAll(".main-buttons button");

buttons.forEach((button) => {
  button.addEventListener("click", (event) => {
    if (button.textContent === "Research and Development Projects") {
      return;
    }
    if (button.textContent === "Researchers") {
      return;
    }
    if (button.textContent === "Institutions") {
      return;
    }
    if (button.textContent === "R&D Facilities") {
      return;
    }
    if (button.textContent === "IP Rights and Patents") {
      return;
    }

    alert("Button clicked: " + button.textContent);
  });
});

document.addEventListener('DOMContentLoaded', () => {
  fetch('get_account_details.php') // Calls the PHP backend script
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        alert(data.error);
        return;
      }

      // Populate the fields
      document.getElementById('firstName').textContent = data['first-name'] || 'N/A';
      document.getElementById('middleInitial').textContent = data['middle-initial'] || 'N/A';
      document.getElementById('lastName').textContent = data['last-name'] || 'N/A';
      document.getElementById('suffix').textContent = data.suffix || 'N/A';
      document.getElementById('gender').textContent = data.gender || 'N/A';
      document.getElementById('email').textContent = data.email || 'N/A';
      document.getElementById('mobile').textContent = data.mobile || 'N/A';
      document.getElementById('institution').textContent = data.institution || 'N/A';
      document.getElementById('position').textContent = data.position || 'N/A';
      document.getElementById('employmentStatus').textContent = data['employment-status'] || 'N/A';
      document.getElementById('fieldOfStudy').textContent = data['field-of-st'] || 'N/A';
      document.getElementById('primaryCourse').textContent = data['primary-course'] || 'N/A';
    })
    .catch(error => console.error('Error fetching account details:', error));
});
