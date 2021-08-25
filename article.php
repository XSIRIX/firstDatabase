<?php
require 'include/database.php';
require 'include/article-related.php';
//Get database connection

$conn = getDB();

if (isset($_GET['id'])) {

    $article = getArticle($conn, $_GET['id']);
} else {
    $article = null;
}

?>

<?php require 'include/header.php'; ?>
<body>

<h1>My greetings to the world!</h1>
<a href="index.php">Go To Home</a>

<?php if ($article === false): ?>

    <p>No article found on this planet and probably universe.</p>
<?php else: ?>

    <article>
        <h2><?= htmlspecialchars($article['title']); ?></h2>
        <p><?= htmlspecialchars($article['content']); ?></p>
    </article>


<?php endif; ?>

</body>
<?php require 'include/footer.php'; ?>
