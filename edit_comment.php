<?php
require 'classes/Database.php';
require 'classes/Comment.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to edit a comment.");
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
    die("You are not authorized to edit this comment.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];

    if ($comment->update($comment_id, $body)) {
        header("Location: post.php?id=" . $comment_data['post_id']);
    } else {
        echo "Error updating comment.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Comment</title>
</head>
<body>
    <h1>Edit Comment</h1>
    <form method="POST">
        <textarea name="body" required><?= htmlspecialchars($comment_data['body']) ?></textarea>
        <button type="submit">Update</button>
    </form>
</body>
</html>
