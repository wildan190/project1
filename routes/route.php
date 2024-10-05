<?php

require_once __DIR__ . '/../app/controller/CategoryController.php';

// Simple routing based on URL path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path == 'categories' || $path == '/categories') {
    (new CategoryController())->index();
} elseif ($path == '/categories/create') {
    (new CategoryController())->create();
} elseif ($path == '/categories/edit') {
    (new CategoryController())->edit();
} elseif ($path == '/categories/delete') {
    (new CategoryController())->delete();
} else {
    echo "404 Not Found";
}
