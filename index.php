<?php
include_once "configs/db.php";

$page = $_GET['page'] ?? 'home';

$title = ucfirst($page) . ' | Universitas Dragonara';
$content = "pages/{$page}.php";

if (!file_exists($content)) {
    $title = "404 | Universitas Dragonara";
    $content = "pages/404.php";
}

include "layout.php";
