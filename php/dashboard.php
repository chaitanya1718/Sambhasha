<?php

//user login session
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../html/login.html");
    exit();
}
//for wishlisted courses
include 'db.php'; // Make sure path is correct

$user_id = $_SESSION['user_id'];
$query = "SELECT course_name FROM wishlist WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$wishlist_result = $stmt->get_result();
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Learn Languages Online</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../Js/sidebar.js" defer></script>
  <link rel="stylesheet" href="../CSS/layout.css">

</head>

<body class="min-h-screen flex flex-col">

  <!-- Main Wrapper -->
  <div class="flex-grow flex flex-col">

    <!-- Sidebar -->
    
  <!-- Sidebar -->
  <div id="sidebar"
    class="fixed top-0 left-0 h-full w-64 shadow-lg z-40  bg-gradient-to-br from-gray-950 to-sky-500 
    transform -translate-x-full transition-transform duration-300">
    <div class="p-5 border-b font-bold text-xl text-white flex justify-between items-center">
      📚 Menu
      <button onclick="toggleSidebar()" class="text-white hover:text-white">
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
        <a href="../html/courses.html" class="hover:text-sky-500 transition">Courses</a>
      </li>
      <li class="flex items-center gap-2">
        <img src="../UiMedia/enrolled.png" alt="Enrolled Icon" class="w-5 h-5">
        <a href="wishlist.php" class="hover:text-sky-500 transition">Enrolled Courses</a>
      </li>
      <li class="flex items-center gap-2">
            <img src="../UiMedia/chatBotImg.png" alt="Courses Icon" class="w-5 h-5">
            <a href="../html/chatbot.html" class="hover:text-sky-500 transition">ChatBot</a>
            </li>
      <li class="flex items-center gap-2">
        <img src="../UiMedia/feedback.png" alt="Feedback Icon" class="w-5 h-5">
        <a href="newfeedback.php" class="hover:text-sky-500 transition">Feedbacks</a>
      </li>
      <li class="flex items-center gap-2">
        <img src="../UiMedia/writeus.png" alt="About Us Icon" class="w-5 h-5">
        <a href="../html/aboutus.html" class="hover:text-sky-500 transition">About us</a>
      </li>
     
    </ul>
  </div>

  <!-- Header -->
  <header class="text-white px-6 py-4 flex justify-between items-center  sticky top-0 z-30 w-100%">
    <div class="flex items-center gap-3">
      <img src="../UiMedia/menuWhite2.png" class="w-6 h-6 cursor-pointer" onclick="toggleSidebar()" title="Menu"/>
      <h1 class="text-2xl font-bold font-serif">Sambhasha</h1>
    </div>
    <div class="hidden md:flex gap-2"> <!-- Hide on small screens -->
      <a href="../html/home.html"><img src="../UiMedia/whiteHome.png" alt="Home Icon" class="w-8 h-8 mt-[4px] " title="Home"></a>
      <form action="logout.php" method="post">
    <button type="submit" title="Logout"
      class="bg-sky-500 text-white px-4 py-1 rounded-md hover:bg-red-700 hover:text-black transition text-sm font-semibold">
      Logout
    </button>
  </form>
    </div>
    <div class="md:hidden flex gap-2"> <!-- Show on small screens -->
    <button type="submit" title="Logout"
      class="bg-sky-500 text-white px-4 py-1 rounded-md hover:bg-red-700 hover:text-black transition text-sm font-semibold">
      Logout
    </button>
    </div>
  </header>


    <!-- Page Content -->
    
    

      <!-- new -->
      <div class="flex flex-col md:flex-row gap-6 p-4">
  <!-- Profile Card -->
  <div class="bg-gray-950 bg-opacity-50  rounded-xl shadow-md p-6 w-full md:w-1/4 min-h-[600px]">
        <div class="flex justify-between items-start mb-4">
          <div class="flex gap-4">
            <div class="w-14 h-14 rounded-full bg-[url('../UiMedia/human1.png')] bg-contain flex items-center justify-center text-white text-xs font-bold">
              <br>
              <!-- <span class="text-[10px]">image not found</span> -->
            </div>
            <div>
              <h2 class="text-xl font-semibold text-white"><?= $_SESSION["username"] ?></h2>
              <p class="text-orange-500 text-sm font-medium">Profile</p>
            </div>
          </div>
          
        </div>

        <div class="border-t pt-4">
          <div class="flex justify-between items-center mb-3">
            <h3 class="text-sky-500 font-semibold">Personal Information</h3>
       
          </div>
          <p class="text-sm text-white mb-3"><strong>Name:</strong><?= $_SESSION["username"] ?></p>
          <p class="text-sm text-white mb-3"><strong>Email:</strong><?= $_SESSION["email"]?></p>
          <p class="text-sm text-white  mb-3"><strong>Phone:</strong> <?= $_SESSION["mobile"]?> </p>
        </div>

        <div class="pt-24 text-teal-300 text-2xl font-serif italic ">
          <h1>" The more languages you Know,the more versions of yourself you have "</h1>
        </div>
        
      </div>

  <!-- Right Column -->
  <div class="flex flex-col gap-4 w-full md:w-3/4">
    <!-- Header Card -->
    <div class="bg-gray-950 bg-opacity-70 rounded-xl p-6 shadow-md ">
        <h1 class="text-3xl font-bold text-white">Language Learning Portal</h1>
        <p class="text-lg mt-1 text-teal-300">Welcome back, <?=$_SESSION["username"]?>!</p>
      </div>

    <!--Mycourses  Block -->
    <div class="bg-gray-950 bg-opacity-60 rounded-xl p-6 shadow-md text-white flex">
      <h2 class="text-xl font-semibold mb-2">Wishlisted languages</h2>
      <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php while ($row = $wishlist_result->fetch_assoc()): ?>
      <div class="bg-gray-800 rounded-xl p-4 text-center shadow-md">
        <h3 class="text-lg font-bold mb-2 capitalize"><?= htmlspecialchars($row['course_name']) ?></h3>

        <a href="playlist.php?course=<?= urlencode($row['course_name']) ?>" 
           class="block mb-2 bg-gradient-to-r from-sky-500 to-teal-300 text-white px-4 py-1 rounded hover:bg-teal-400 hover:text-black transition">
          View Course
        </a>

        <form action="remove_from_wishlist.php" method="POST">
          <input type="hidden" name="course" value="<?= htmlspecialchars($row['course_name']) ?>">
          <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700 transition">
            Remove
          </button>
        </form>
      </div>
    <?php endwhile; ?>
  </div>
      </div>
     
      <!-- You can add more content, charts, etc. -->
    </div>

   
  </div>
</div>







    </div>
 
  </div>


 
</body>
</html>
