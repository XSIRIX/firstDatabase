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
    <button>Save</button>
</form>
