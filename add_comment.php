<?php include 'includes/header.php'; ?>

<?php
require 'classes/Database.php';
require 'classes/Comment.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to add a comment.");
}

$db = (new Database())->connect();
$comment = new Comment($db);

$post_id = $_POST['post_id'];
$author_id = $_SESSION['user_id'];
$body = $_POST['body'];

if ($comment->create($post_id, $author_id, $body)) {
    header("Location: post.php?id=$post_id");
} else {
    echo "Error adding comment.";
}
?>
<?php include 'includes/footer.php'; ?>
