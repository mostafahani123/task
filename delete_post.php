<?php
require 'classes/Database.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to delete a post.");
}

$post_id = $_GET['id'];
$db = (new Database())->connect();

$query = "DELETE FROM posts WHERE id = :id AND author_id = :author_id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $post_id);
$stmt->bindParam(':author_id', $_SESSION['user_id']);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error deleting post.";
}
?>
