<?php
require 'include/database.php';

$results = pg_query($conn, "SELECT * FROM sirivat ORDER BY published_at ");

if ($results === false) {
    echo "Some error in your query idiot";
} else {
    $articles = pg_fetch_all($results);
}
?>
<?php require 'include/header.php'; ?>
    <body>

    <h1>My greetings to the world!</h1>

    <ul>
    <?php foreach ($articles as $article): ?>
        <li>
            <article>
                <h2><a href="article.php?id=<?= $article['id']; ?>"><?= $article['title'];?></a></h2>
                <p><?= $article['content'];?></p>
            </article>
        </li>
        <?php endforeach; ?>
    </ul>

    </body>
<?php require 'include/footer.php'; ?>