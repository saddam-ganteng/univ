<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|woff2?|ttf|svg)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

$_GET['page'] = trim($_SERVER["REQUEST_URI"], '/');
require 'index.php';
