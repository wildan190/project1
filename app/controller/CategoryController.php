<?php

require_once __DIR__ . '/../../database/connection.php';

class CategoryController
{
    public function index()
    {
        $pdo = getDatabaseConnection();
        $stmt = $pdo->query("SELECT * FROM categories WHERE deleted_at IS NULL");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '../../../src/view/categories/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pdo = getDatabaseConnection();
            $stmt = $pdo->prepare("INSERT INTO categories (name, description, slug, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
            $stmt->execute([$_POST['name'], $_POST['description'], $_POST['slug']]);
            header('Location: /categories');
            exit;
        }

        require_once __DIR__ . '../../../src/view/categories/create.php';
    }

    public function edit()
    {
        $pdo = getDatabaseConnection();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $stmt = $pdo->prepare("UPDATE categories SET name = ?, description = ?, slug = ?, updated_at = NOW() WHERE id = ?");
            $stmt->execute([$_POST['name'], $_POST['description'], $_POST['slug'], $_POST['id']]);
            header('Location: /categories');
            exit;
        }

        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        require_once __DIR__ . '../../../src/view/categories/edit.php';
    }

    public function delete()
    {
        $id = $_GET['id'];
        $pdo = getDatabaseConnection();
        $stmt = $pdo->prepare("UPDATE categories SET deleted_at = NOW() WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: /categories');
        exit;
    }
}