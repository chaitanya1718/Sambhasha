<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: ../html/login.html");
  exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT course_name FROM wishlist WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Learn Languages Online</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../Js/sidebar.js" defer> </script>
  <link rel="stylesheet" href="../CSS/layout.css">
<style>

footer {
    margin-top: auto;
     bottom: 0;
     width: 100%;
}

</style>

</head>
<body class="">

      <!-- Sidebar -->
      <div id="sidebar" class="fixed top-0 left-0 h-full w-64  bg-gradient-to-br from-gray-950 to-sky-500 
      z-40 transform -translate-x-full transition-transform duration-300">
        <div class="p-5 border-b font-bold text-xl text-blue-700 flex justify-between items-center">
          📚 Menu
          <button onclick="toggleSidebar()" class="text-white">
            &times; <!-- Close icon -->
          </button>
        </div>
        <ul class="p-5 space-y-4 text-white">
        <li class="flex items-center gap-2">
            <img src="../UiMedia/home.png" alt="Courses Icon" class="w-5 h-5">
            <a href="../html/home.html" class="hover:text-sky-500 transition">Home</a>
            </li>
            <li class="flex items-center gap-2">
            <img src="../UiMedia/courses.png" alt="Courses Icon" class="w-5 h-5">
            <a href="../html/courses.html" class="hover:text-sky-500  transition">Courses</a>
          </li>
          <li class="flex items-center gap-2">
            <img src="../UiMedia/whiteProfile.png" alt="Profile Icon" class="w-5 h-5">
            <a href="dashboard.php" class="hover:text-sky-500  transition">Profile</a>
          </li>
          <li class="flex items-center gap-2">
            <img src="../UiMedia/chatBotImg.png" alt="Courses Icon" class="w-5 h-5">
            <a href="../html/chatbot.html" class="hover:text-sky-500 transition">ChatBot</a>
            </li>
          <li class="flex items-center gap-2">
            <img src="../UiMedia/feedback.png" alt="Feedback Icon" class="w-5 h-5">
            <a href="newfeedback.php" class="hover:text-sky-500  transition">Feedbacks</a>
          </li>
          <li class="flex items-center gap-2">
            <img src="../UiMedia/writeus.png" alt="About Us Icon" class="w-5 h-5">
            <a href="../html/aboutus.html" class="hover:text-sky-500  transition">About us</a>
          </li>
        </ul>
      </div>
    
      <!-- Header -->
      <header class="text-white px-6 py-4 flex justify-between items-center sticky top-0 z-30">
        <div class="flex items-center gap-3">
          <img src="../UiMedia/menuWhite2.png"
               class="w-6 h-6 cursor-pointer"
               onclick="toggleSidebar()" />
               <h1 class="text-2xl font-bold font-serif">Sambhasha</h1>
        </div>
        <div class="hidden md:flex gap-2"> <!-- Hide on small screens -->
          <a href="../html/home.html"><img src="../UiMedia/whiteHome.png" alt="Home Icon" class="w-8 h-8 mt-[4px] "></a>
          <a href="dashboard.php"><img src="../UiMedia/whiteProfile.png" alt="Profile Icon" class="w-8 h-8 mt-[4px] "></a>
      
        </div>
        <div class="md:hidden flex gap-2"> <!-- Show on small screens -->
      
        </div>
      </header>

      <body class="bg-gray-100 p-6 font-sans">
      <h1 class="text-2xl text-white font-bold mb-4 text-center">Wishlisted Languages</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <?php while ($row = $result->fetch_assoc()): ?>

        <!-- ⚠️changed here -->
        <div class="bg-[url('../UiMedia/wishlistCover.png')] bg-cover bg-center h-64 w-full rounded-xl">

            <div class="p-4 rounded-lg shadow text-center">
              <h2 class="text-lg font-semibold capitalize"><?= htmlspecialchars($row['course_name']) ?></h2><br>
              <a href="playlist.php?course=<?= urlencode($row['course_name']) ?>" class=" bg-gray-950 rounded-2xl text-white px-4 py-1 hover:bg-teal-300 hover:text-gray-950 transition">View Course</a>
              
              <!-- Remove button -->
              <form action="remove_from_wishlist.php" method="POST" class="mt-2">
                <input type="hidden" name="course" value="<?= htmlspecialchars($row['course_name']) ?>">
                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-2xl hover:bg-red-600  text-center">Remove from Wishlist</button>
              </form>
            </div>

        </div>
      <?php endwhile; ?>
    </div>
  

</body>
</html>



