<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "configs/db.php";

// Ambil path dari URL
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$page = trim($uri, '/');
$page = $page ?: 'home';

// Cek apakah halaman termasuk admin tapi bukan halaman 'admin' atau 'admin/index'
$isAdminOnlyPage = str_starts_with($page, 'admin') && $page !== 'admin' && $page !== 'admin/index';

// Set default title
$title = ucfirst($page) . ' | Universitas Dragonara';

// Tentukan file konten
if (is_dir("pages/{$page}") && file_exists("pages/{$page}/index.php")) {
    $content = "pages/{$page}/index.php";
} elseif (file_exists("pages/{$page}.php")) {
    $content = "pages/{$page}.php";
} else {
    $title = "404 | Universitas Dragonara";
    $content = "pages/404.php";
}

// Eksekusi isi konten terlebih dahulu
ob_start();
include $content;
$pageContent = ob_get_clean();

// Jika di dalam konten ada $overrideTitle, gunakan itu sebagai judul
if (isset($overrideTitle) && !empty($overrideTitle)) {
    $title = $overrideTitle . ' | Universitas Dragonara';
}

// Simpan nama halaman untuk kondisi di layout
$currentPage = $page;

// Gunakan layout tunggal (layout.php)
include "layout.php";

ob_end_flush();
