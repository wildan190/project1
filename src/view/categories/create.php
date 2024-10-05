<?php
$title = 'Add Category';
ob_start();
?>

<h1>Add New Category</h1>
<form method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" required>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/app.php';
?>