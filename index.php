<?php
require 'classes/Database.php';
require 'classes/Post.php';

$db = (new Database())->connect();
$post = new Post($db);

$posts = $post->getAll();
?>
<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Posts</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>
<body>

   



    <div class="card text-center">
  <div class="card-header">
  All Posts
  </div>
  <?php foreach ($posts as $post): ?>
  <div class="card-body">
      
  <div class="card-footer text-muted">
 
  created in  <?= htmlspecialchars($post['created_at']);?>
  </div>
    
    <h5 class="card-title"><?= htmlspecialchars($post['title'])  ?></h5>
    <p class="card-text"><?= htmlspecialchars($post['body']) ?></p>
    <a class="btn btn-success" href="post.php?id=<?= $post['id'] ?>">Read More</a>
    </div>
 
  <?php endforeach; ?>
</div>
  
</body>
</html>
<?php include 'includes/footer.php'; ?>
