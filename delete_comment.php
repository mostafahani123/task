<?php
require 'classes/Database.php';
require 'classes/Comment.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to delete a comment.");
}

$db = (new Database())->connect();
$comment = new Comment($db);

$comment_id = $_GET['id'] ?? null;
if (!$comment_id) {
    die("Comment ID not specified.");
}

// Fetch the comment
$comment_data = $comment->getById($comment_id);

// Check if the logged-in user is the author of the comment
if ($_SESSION['user_id'] !== $comment_data['author_id']) {
    die("You are not authorized to delete this comment.");
}

// Delete the comment
if ($comment->delete($comment_id)) {
    header("Location: post.php?id=" . $comment_data['post_id']);
} else {
    echo "Error deleting comment.";
}
?>
