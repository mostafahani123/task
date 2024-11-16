
<?php include 'includes/header.php'; ?>

<?php
require 'classes/Database.php';
require 'classes/Post.php';
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to edit a post.");
}

$db = (new Database())->connect();
$post = new Post($db);

$post_id = $_GET['id'];
$post_data = $post->getById($post_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];

    $query = "UPDATE posts SET title = :title, body = :body WHERE id = :id AND author_id = :author_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':body', $body);
    $stmt->bindParam(':id', $post_id);
    $stmt->bindParam(':author_id', $_SESSION['user_id']);

    if ($stmt->execute()) {
        header("Location: post.php?id=$post_id");
    } else {
        echo "Error updating post.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form method="POST">
        <label>Title</label>
        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="title" value="<?= htmlspecialchars($post_data['title']) ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text"  name="body"  value='<?= htmlspecialchars($post_data['body']) ?>'class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
   
</body>
</html>
<?php include 'includes/footer.php'; ?>
