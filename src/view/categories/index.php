<?php
$title = 'Categories';
ob_start();
?>

<h1>Categories</h1>
<a href="/categories/create" class="btn btn-success mb-3">Add New Category</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= htmlspecialchars($category['name']) ?></td>
            <td><?= htmlspecialchars($category['description']) ?></td>
            <td><?= htmlspecialchars($category['slug']) ?></td>
            <td>
                <a href="/categories/edit?id=<?= $category['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/categories/delete?id=<?= $category['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/app.php';
?>
