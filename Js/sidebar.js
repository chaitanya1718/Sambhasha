let isSidebarOpen = false; // Track the sidebar state

function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  isSidebarOpen = !isSidebarOpen; // Toggle the state
  sidebar.style.transform = isSidebarOpen ? 'translateX(0)' : 'translateX(-100%)';
}

// Close sidebar when clicking outside of it
document.addEventListener('click', function(event) {
  const sidebar = document.getElementById('sidebar');
  const menuButton = document.querySelector('img[onclick="toggleSidebar()"]');

  // Check if the click was outside the sidebar and the menu button
  if (isSidebarOpen && !sidebar.contains(event.target) && !menuButton.contains(event.target)) {
    toggleSidebar(); // Close the sidebar
  }
});

// Close sidebar on mouse leave
document.getElementById('sidebar').addEventListener('mouseleave', function() {
  if (isSidebarOpen) {
    toggleSidebar(); // Close the sidebar
  }
});


