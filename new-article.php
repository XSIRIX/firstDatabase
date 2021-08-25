<?php

require 'include/database.php';

$errors = [];
$title = '';
$content = '';
$published_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

    if ($_POST['title'] == '') {
        $errors[] = "Title is required";
    }
    if ($_POST ['content'] == '') {
        $errors[] = "Content is required";
    }
    if (empty($errors)) {
        $conn = getDB();

        $sql = "INSERT INTO sirivat (title, content, published_at)
            VALUES ($1, $2, $3)
            RETURNING id
            ";

        // "$_POST['title']", "$_POST['content']", $_POST['published_at']

        $stmt = pg_prepare($conn, "prep", $sql);

        if ($stmt === false) {
            echo "Some error in your query idiot";
        } else {
            if ($published_at == '') {
                $published_at = null;
            }

            $results = pg_execute($conn, "prep", array($title, $content, $published_at));

            $resultArray = pg_fetch_assoc($results);
            $id = $resultArray["id"];
            echo "Inserted record with ID: $id";
//            $_POST = array();
            unset($title, $content, $published_at);
        }
    }
}


?>

<?php require 'include/header.php' ?>

<h1>My Blog</h1>

<h2>New Article</h2>
<a href="index.php">Go To Home</a>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" class="input-form">
    <div class="input-form">
        <label for="title">Title: </label>
        <input type="text" id="title" name="title" placeholder="Article Title" value="<?= htmlspecialchars($title); ?>">
    </div>
    <div class="input-form">
        <label for="content">Content: </label>
        <textarea type="textarea" name="content" id="content"
                  placeholder="Article Content"><?= htmlspecialchars($content); ?></textarea>
    </div>
    <div class="input-form">
        <label for="date-time">Publication Date And Time: </label>
        <input type="datetime-local" id="date-time" name="published_at" value="<?= htmlspecialchars($published_at); ?>">
    </div>
    <button>Submit</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
<?php require 'include/footer.php' ?>

