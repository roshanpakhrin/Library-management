<?php
session_start();
$userId = $_SESSION["userId"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library Management System</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
      }

      body {
        display: flex;
        min-height: 100vh;
        background-color: #f4f4f4;
      }

      /* Sidebar styling */
      .sidebar {
        width: 250px;
        background-color: whitesmoke;
        padding: 20px;
        /* box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); */
        margin-right: 20px; /* Add spacing here */
        display: flex;
        flex-direction: column;
        gap: 160px;
      }

      .logo {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
        color: #4a73b5;
        display: flex;
        justify-items: center;
        align-items: center;
      }

      .nav-menu {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .nav-menu a {
        text-decoration: none;
        font-size: 18px;
        color: #333;
        padding: 10px 15px;
        border-radius: 10px;
        transition: background 0.3s ease;
      }

      .nav-menu a:hover,
      .nav-menu .active {
        background-color: #d0e2ff;
        color: #4a73b5;
      }

      /* Main content styling */
      .main-content {
        flex: 1;
        padding: 0;
        position: relative;
      }

      .top-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        padding: 0 20px; /* Add padding here for spacing */
      }

      .discover-bar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        background-color: #d0e2ff;
        padding: 50px 20px;
        border-bottom-left-radius: 50px;
        height: 200px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .discover-bar::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #d0e2ff;
        z-index: -1;
        border-bottom-left-radius: 50px;
      }

      .discover-bar h1 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #4a73b5;
      }

      .search-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
      }

      .search-bar input {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 10px;
        flex: 1;
      }

      .search-bar button {
        background-color: #4a73b5;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
      }

      .auth-buttons {
        display: flex;
        gap: 10px;
        align-items: center;
        position: absolute;
        top: 40px;
        right: 20px;
      }

      .auth-buttons button {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
      }

      .auth-buttons .login {
        background-color: #4a73b5;
        color: white;
      }

      .auth-buttons .signup {
        background-color: #fff;
        color: #4a73b5;
        border: 1px solid #4a73b5;
      }

      .auth-buttons button:hover {
        opacity: 0.9;
      }

      .book-recommendations {
        margin-top: 220px;
        padding: 20px;
      }

      .book-recommendations h2 {
        margin-bottom: 10px;
        color: #333;
      }

      .book-list {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
      }

      .book-item {
        width: 120px;
        text-align: center;
      }

      .book-item img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      }

      .book-item p {
        margin-top: 5px;
        font-size: 14px;
        color: #333;
      }

      .view-more {
        margin-top: 20px;
        background-color: #4a73b5;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        text-align: center;
      }

      .book-categories {
        padding: 20px;
      }

      .book-categories h2 {
        margin-bottom: 10px;
        color: #333;
      }

      .categories-list {
        display: flex;
        gap: 15px;
      }

      .category-item {
        background-color: #d0e2ff;
        color: #4a73b5;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo">Ale</div>
      <nav class="nav-menu">
        <a href="#" class="active">Discover</a>
        <a href="#">Category</a>
        <a href="#">Favorite</a>
        <a href="#">My Profile</a>
      </nav>
    </div>

    <div class="main-content">
      <div class="top-bar">
        <div class="discover-bar">
          <h1>Discover</h1>
          <div class="search-bar">
            <input type="text" placeholder="Search" />
            <button>🔍</button>
          </div>
        </div>
        <div class="auth-buttons">
        <?php
        if (isset($userId)) {
?>
<a href="api/logout.php">
  <button >Log Out</button>
  </a>
  <?php 
        }else {
                 ?>
     
          <button class="login">Log In</button>
          <button class="signup">Sign Up</button>
        
        <?php }?>
        </div>
      </div>

      <div class="book-recommendations">
        <h2>Books Recommendation</h2>
        <div class="book-list">
          <div class="book-item">
            <img src="The_Kite_Runner.jpg" alt="The Kite Runner" />
            <p>The Kite Runner</p>
          </div>
          <div class="book-item">
            <img src="The_Maid.png" alt="The Maid" />
            <p>The Maid</p>
          </div>
          <div class="book-item">
            <img src="7_Habits of High Effective People.jpg" alt="7 Habits" />
            <p>7 Habits</p>
          </div>
          <div class="book-item">
            <img src="The_Martian.png" alt="The Martian" />
            <p>The Martian</p>
          </div>
          <div class="book-item">
            <img src="RichDad_PoorDad.png" alt="Rich Dad Poor Dad" />
            <p>Rich Dad Poor Dad</p>
          </div>
          <div class="book-item">
            <img src="Ghost_Eaters.png" alt="Ghost Eaters" />
            <p>Ghost Eaters</p>
          </div>
          <!-- Add more books here -->
        </div>
        <button class="view-more">View More</button>
      </div>

      <div class="book-categories">
        <h2>Book Categories</h2>
        <div class="categories-list">
          <div class="category-item">Thriller</div>
          <div class="category-item">Self Improvement</div>
          <div class="category-item">Design</div>
          <div class="category-item">Business</div>
        </div>
      </div>
    </div>

    <script>
      // JavaScript to handle the login button click
      document.querySelector(".login").addEventListener("click", function () {
        window.location.href = "login"; // URL of your login page
      });
      document.querySelector(".signup").addEventListener("click", function () {
        window.location.href = "signup"; // URL of your login page
      }); 
      document.getElementById("logout").addEventListener("click", function () {
        window.location.href = "/api/logout.php";}) // URL of your logout page   
         </script>
  </body>
</html>
