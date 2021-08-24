<?php
require 'include/database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$results = pg_query($conn, "SELECT * FROM sirivat WHERE id = " . $_GET['id']);

if ($results === false) {
    echo "Some error in your query idiot";
} else {
    $article = pg_fetch_assoc($results);
}
} else {
    $article = null;
}
?>

<?php require 'include/header.php'; ?>
    <body>

    <h1>My greetings to the world!</h1>

    <?php if ($article === false): ?>

    <p>No article found on this planet and probably universe.</p>
    <?php else: ?>
    <ul>
        <li>
            <article>
                <h2><?= $article['title'];?></h2>
                <p><?= $article['content'];?></p>
            </article>
        </li>
    </ul>

    <?php endif; ?>

</body>
<?php require 'include/footer.php'; ?>
