<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'include/database.php';

    $sql = "INSERT INTO sirivat (title, content, published_at)
            VALUES ('{$_POST['title']}', '{$_POST['content']}', '{$_POST['published_at']}')
            RETURNING id
            ";

    $results = pg_query($conn, $sql);


    if ($results === false) {
        echo "Some error in your query idiot";
    } else {
        $id_insert = pg_get_serial_sequence('sirivat', 'id');
        var_dump($id_insert);
    }
}

?>

<?php require 'include/header.php' ?>

<h1>My Blog</h1>

<h2>New Article</h2>

<form method="post" class="input-form">
    <div class="input-form">
        <label for="title">Title: </label>
        <input type="text" id="title" name="title" placeholder="Article Title" required>
    </div>
    <div class="input-form">
        <label for="content">Content: </label>
        <textarea type="textarea" name="content" id="content" placeholder="Article Content"></textarea>
    </div>
    <div class="input-form">
        <label for="date-time">Publication Date And Time: </label>
        <input type="datetime-local" id="date-time" name="published_at">
    </div>
    <button>Submit</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<?php require 'include/footer.php' ?>

