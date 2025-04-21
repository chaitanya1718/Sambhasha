// Function to toggle between Indian and Foreign sections
function showSection(section) {
    const indianSection = document.getElementById('indian-section');
    const foreignSection = document.getElementById('foreign-section');
    
    if (section === 'indian') {
      indianSection.classList.remove('hidden');
      foreignSection.classList.add('hidden');
    } else if (section === 'foreign') {
      indianSection.classList.add('hidden');
      foreignSection.classList.remove('hidden');
    }
  }
  
  // Function to search courses
  function searchCourses() {
    const input = document.getElementById('searchInput').value.trim();
    const allCourses = document.querySelectorAll('.course-card');
  
    const regex = new RegExp(input, 'i');
  
    allCourses.forEach(course => {
      if (regex.test(course.innerText)) {
        course.classList.remove('hidden');
      } else {
        course.classList.add('hidden');
      }
    });
  
    const indianSection = document.getElementById('indian-section');
    const foreignSection = document.getElementById('foreign-section');
  
    if (input !== '') {
      indianSection.classList.remove('hidden');
      foreignSection.classList.remove('hidden');
    }
  }
  
  
  
