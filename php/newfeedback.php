<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sambhasha</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../js/sidebar.js" defer></script>
  <link rel="stylesheet" href="../CSS/layout.css">
</head>
<body class="">

      <!-- Sidebar -->
      <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-gradient-to-br from-gray-950 to-sky-500   
      shadow-lg z-40  transform -translate-x-full transition-transform duration-300">
        <div class="p-5 border-b font-bold text-xl text-white flex justify-between items-center">
          📚 Menu
          <button onclick="toggleSidebar()" class="text-white hover:text-sky-500">
            &times; <!-- Close icon -->
          </button>
        </div>
        <ul class="p-5 space-y-4 text-white">
        <li class="flex items-center gap-2">
            <img src="../UiMedia/home.png" alt="Courses Icon" class="w-5 h-5">
            <a href="../html/home.html" class="hover:text-sky-500 transition">Home</a>
            </li>
            <li class="flex items-center gap-2">
              <img src="../UiMedia/whiteProfile.png" alt="About Us Icon" class="w-5 h-5">
              <a href="dashboard.php" class="hover:text-sky-500 transition">Profile</a>
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
            <img src="../UiMedia/writeus.png" alt="About Us Icon" class="w-5 h-5">
            <a href="../html/aboutus.html" class="hover:text-sky-500 transition">About us</a>
          </li>
        </ul>
      </div>
    
      <!-- Header -->
      <header class=" text-white px-6 py-4 flex justify-between items-center sticky top-0 z-30">
        <div class="flex items-center gap-3">
          <img src="../UiMedia/menuWhite2.png"
               class="w-6 h-6 cursor-pointer"
               onclick="toggleSidebar()" />
               <h1 class="text-2xl font-bold font-serif">Sambhasha</h1>
        </div>
        <div class="hidden md:flex gap-2"> <!-- Hide on small screens -->
          <a href="Home.html"><img src="../UiMedia/whiteHome.png" alt="Home Icon" class="w-8 h-8 mt-[4px] "></a>
          <a href="../php/dashboard.php"><img src="../UiMedia/whiteProfile.png" alt="Profile Icon" class="w-8 h-8 mt-[4px] "></a>
       
        </div>
        <div class="md:hidden flex gap-2"> <!-- Show on small screens -->
        </div>
      </header>

       <!-- Feedback Section -->
  <!-- Feedback Section -->
<section class="py-12 px-4 min-h-screen">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-start gap-10">

    <!-- Left Image -->
    <div class="flex-shrink-0">
      <img src="../UiMedia/feedback2.jpg" alt="Feedback Illustration" class="w-[300px] rounded-lg" />
    </div>

    <!-- Right Side: Form -->
    <div class="max-w-lg">
      <h2 class="text-3xl font-bold text-white mb-4">We Value Your Feedback</h2>
      <p class="text-sky-500 mb-6">Tell us what you loved or what we can do better!</p>

      <!-- Feedback Form -->
      <form action="submit_feedback.php" method="POST" class="flex-col gap-3 p-6 mt-6 rounded-lg shadow-md w-full max-w-md bg-white">
        <input name="name" type="text" placeholder="Your Name" required class="w-full px-4 py-2 rounded-md text-sm border mb-2" />
        <textarea name="message" rows="4" placeholder="Your Feedback" required class="w-full px-4 py-2 border border-gray-300 rounded-md text-sm mb-2"></textarea>
        <select name="stars" required class="w-full px-4 py-2 border border-gray-300 rounded-md text-sm mb-4">
          <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</option>
          <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
          <option value="⭐⭐⭐">⭐⭐⭐</option>
          <option value="⭐⭐">⭐⭐</option>
          <option value="⭐">⭐</option>
        </select>
        <button type="submit" class="bg-gradient-to-br from-sky-500 to-teal-300 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-800 transition">
          Submit
        </button>
      </form>
    </div>
  </div>

 <!-- Student Reviews Section -->
 <section class="py-12 px-4">
    <div class="text-center mb-10">
      <h2 class="text-2xl font-semibold text-teal-300">Student's Reviews</h2>
      <hr class="w-16 border-2 border-teal-200 mx-auto mt-2" />
    </div>

    <div id="reviewSection" class="flex flex-wrap justify-center gap-6">
      <!-- Review Cards -->
      <div class="bg-gradient-to-b from-sky-500 to-teal-300 rounded-xl shadow-md p-6 w-[300px] min-h-[220px] text-white
       flex flex-col justify-between transition-transform hover:-translate-y-1 hover:shadow-lg">
        <p class="text-sm  mb-4">“The course helped me improve my speaking skills. The instructors are amazing and the material is very easy to follow!”</p>
        <div class="flex items-center gap-4">
          <img src="../UiMedia/human1.png" class="w-12 h-12 rounded-full" />
          <div>
            <h4 class="font-semibold text-gray-800 text-sm">Nilanshu</h4>
            <div class="text-yellow-400 text-sm">⭐⭐⭐⭐⭐</div>
          </div>
        </div>
      </div>

      <div class="bg-gradient-to-br from-sky-500 to-teal-300 rounded-xl shadow-md p-6 w-[300px] min-h-[220px]  text-white
      flex flex-col justify-between transition-transform hover:-translate-y-1 hover:shadow-lg">
        <p class="text-sm mb-4">“I loved the interactive sessions and exercises. I can now confidently hold a conversation in Spanish.”</p>
        <div class="flex items-center gap-4">
          <img src="../UiMedia/human2.png" class="w-12 h-12 rounded-full" />
          <div>
            <h4 class="font-semibold text-gray-800 text-sm">Suraj Pandey</h4>
            <div class="text-yellow-400 text-sm">⭐⭐⭐⭐½</div>
          </div>
        </div>
      </div>

      <div class="bg-gradient-to-b from-sky-500 to-teal-300 rounded-xl shadow-md p-6 w-[300px] min-h-[220px] text-white
       flex flex-col justify-between transition-transform hover:-translate-y-1 hover:shadow-lg">
        <p class="text-sm  mb-4">“Flexible timing and practical lessons make this perfect for working professionals. Highly recommended!”</p>
        <div class="flex items-center gap-4">
          <img src="../UiMedia/human3.png" class="w-12 h-12 rounded-full" />
          <div>
            <h4 class="font-semibold text-gray-800 text-sm">Raj</h4>
            <div class="text-yellow-400 text-sm">⭐⭐⭐⭐⭐</div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!-- Feedback Display Section -->
 <!-- Student Reviews Section -->
<section class="py-12 px-4">

  <div id="feedbackCards" class="flex flex-wrap justify-center gap-6">
    <?php
    $result = $conn->query("SELECT * FROM feedbacks ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc()) :
    ?>
      <div class="bg-gradient-to-r from-sky-500 to-teal-300 rounded-xl shadow-md 
      p-6 w-[300px] min-h-[220px] flex flex-col justify-between text-white transition-transform hover:-translate-y-1 hover:shadow-lg">
        <p class="text-sm mb-4">"<?php echo htmlspecialchars($row['message']); ?>"</p>
        <div class="flex items-center gap-4">
          <img src="../UiMedia/human1.png" class="w-12 h-12 rounded-full" />
          <div>
            <h4 class="font-semibold text-gray-800 text-sm"><?php echo htmlspecialchars($row['name']); ?></h4>
            <div class="text-yellow-400 text-sm"><?php echo $row['stars']; ?></div>
          </div>
        </div>
        <!-- Delete Button -->
        <form action="delete_feedback.php" method="POST" class="mt-2">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <button type="submit" onclick="return confirm('Delete this feedback?')" class="text-red-500 text-sm">Delete</button>
        </form>
      </div>
    <?php endwhile; ?>
  </div>
</section>



  
 


 
</body>
</html>
