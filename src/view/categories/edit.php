<?php
$title = 'Edit Category';
ob_start();
?>

<h1>Edit Category</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= htmlspecialchars($category['description']) ?>" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="<?= htmlspecialchars($category['slug']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/app.php';