<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) session_start();
include_once "configs/db.php";

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$page = trim($uri, '/');
$page = $page ?: 'home'; // fallback jika kosong

$title = ucfirst($page) . ' | Universitas Dragonara';

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

ob_end_flush();