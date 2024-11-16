<?php include 'includes/header.php'; ?>
<?php
require 'classes/Database.php';
require 'classes/Post.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to create a post.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = (new Database())->connect();
    $post = new Post($db);

    $author_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    if ($post->create($author_id, $title, $body)) {
        header("Location: index.php");
    } else {
        echo "Error creating post.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>
    <form method="POST">
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Tilte</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Body</label>
    <input type="text" name='body' class="form-control" id="exampleInputPassword1" placeholder="Body">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>
<?php include 'includes/footer.php'; ?>