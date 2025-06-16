<?php
session_start();
include_once "configs/db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /admin/jurnal/tambah');
    exit;
}

$judul = trim($_POST['judul'] ?? '');
$abstrak = trim($_POST['abstrak'] ?? '');
$profile_id = 1;
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));
$created_at = date('c'); // ISO 8601

if (!$judul || !$abstrak || !$_FILES['gambar']['name']) {
    $_SESSION['error_message'] = "Semua kolom wajib diisi.";
    header('Location: /admin/jurnal/tambah');
    exit;
}

$gambarTmpPath = $_FILES['gambar']['tmp_name'];

$ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);

$gambarName = $slug . '.' . $ext;

$success = upload_to_supabase_storage($gambarTmpPath, $gambarName);

if (!$success) {
    $_SESSION['error_message'] = "Upload gambar ke Supabase gagal.";
    header('Location: /admin/jurnal/tambah');
    exit;
}

$data = [
    'judul' => $judul,
    'abstrak' => $abstrak,
    'slug' => $slug,
    'gambar' => $gambarName,
    'profile_id' => $profile_id,
    'created_at' => $created_at
];

[$httpcode, $result] = supabase_insert('jurnal', $data);

if ($httpcode === 201 || $httpcode === 200) {
    $_SESSION['success_message'] = "Jurnal berhasil ditambahkan.";
    header("Location: /admin/jurnal");
    exit;
} else {
    $_SESSION['error_message'] = "Gagal menyimpan jurnal.";
    var_dump($result);
    header("Location: /admin/jurnal/tambah");
    exit;
}
