<?php
require 'classes/Database.php';
require 'classes/Post.php';
require 'classes/Comment.php';

$db = (new Database())->connect();
$post = new Post($db);
$comment = new Comment($db);

$post_id = $_GET['id'] ?? null;
if (!$post_id) {
    die("Post ID not specified.");
}

$post_data = $post->getById($post_id);
$comments = $comment->getByPostId($post_id);
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post_data['title']) ?></title>
</head>
<body>
    
    <h1><?= htmlspecialchars($post_data['title']) ?></h1>
    <p><?= htmlspecialchars($post_data['body']) ?></p>
    <hr>
    <h2>Comments</h2>
    <?php foreach ($comments as $comment): ?>
    <div>
        <p><?= htmlspecialchars($comment['body']) ?></p>
        <small>Commented on <?= $comment['created_at'] ?></small>
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] = $comment['author_id']): ?>
            <a href="edit_comment.php?id=<?= $comment['id'] ?>">Edit</a>
            <a href="delete_comment.php?id=<?= $comment['id'] ?>">Delete</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>


    <h3>Add a Comment</h3>
    <?php
    
    if (isset($_SESSION['user_id'])): ?>
        <form method="POST" action="add_comment.php">
            <input type="hidden" name="post_id" value="<?= $post_id ?>">
            <textarea name="body" required></textarea>
            <button type="submit">Submit</button>
        </form>
    <?php else: ?>
        <p>You must <a href="login.php">login</a> to comment.</p>
    <?php endif; ?>
</body>
</html>
<?php include 'includes/footer.php'; ?>