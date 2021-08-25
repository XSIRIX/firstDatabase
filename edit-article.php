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

var_dump($article);
