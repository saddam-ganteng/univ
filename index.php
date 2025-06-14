<?php
include_once "configs/db.php";

$page = $_GET['page'] ?? 'home';

$title = ucfirst($page) . ' | Universitas Dragonara';

// Cek kalau misal URL kayak daftar/proses
if (strpos($page, '/') !== false && file_exists("pages/{$page}.php")) {
    $title = ucfirst(basename($page)) . ' | Universitas Dragonara';
    include "pages/{$page}.php";
    exit;
}

// Normal routing
if (is_dir("pages/{$page}") && file_exists("pages/{$page}/index.php")) {
    $content = "pages/{$page}/index.php";
} elseif (file_exists("pages/{$page}.php")) {
    $content = "pages/{$page}.php";
} else {
    $title = "404 | Universitas Dragonara";
    $content = "pages/404.php";
}

$currentPage = $page;
include "layout.php";
