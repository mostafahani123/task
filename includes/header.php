<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">TASK CRUD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</span></a>
      </li>
      <?php if (isset($_SESSION['user_id'])): ?>
        <a class="nav-link" href="create_post.php">Create Post</span></a>
        <a class="nav-link" href="user_posts.php">Your Posts</span></a>
        <a class="btn btn-danger" href="logout.php">Logout</span></a>         
          <?php else: ?>
            <li class="nav-item">
        <a class="nav-link disabled" href="login.php">Login</a>
        <a class="nav-link disabled" href="register.php">Register</a>
      </li>
      <?php endif; ?>
        </div>
      </li>
   
    </form>
  </div>
</nav>
