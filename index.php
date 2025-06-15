<?php
ob_start();
if (session_status() === PHP_SESSION_NONE)
    session_start();
include_once "configs/db.php";

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$page = trim($uri, '/');
$page = $page ?: 'home';

$isAdminOnlyPage = str_starts_with($page, 'admin') && $page !== 'admin' && $page !== 'admin/index';

$title = ucfirst($page) . ' | Universitas Dragonara';

if (is_dir("pages/{$page}") && file_exists("pages/{$page}/index.php")) {
    $content = "pages/{$page}/index.php";
} elseif (file_exists("pages/{$page}.php")) {
    $content = "pages/{$page}.php";
} else {
    $title = "404 | Universitas Dragonara";
    $content = "pages/404.php";
}

// Eksekusi konten dulu agar $title bisa dioverride dari dalamnya
ob_start();
include $content;
$pageContent = ob_get_clean();

$currentPage = $page;

// Baru panggil layout (yang menggunakan $title & $pageContent)
if ($isAdminOnlyPage) {
    include "admin_layout.php";
} else {
    include "layout.php";
}

ob_end_flush();
