<?php
session_start();
include_once "configs/db.php";

// Cek apakah request method adalah POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	header('Location: /admin/jurnal/tambah');
	exit;
}

// set variable untuk menghindari undefined index
$judul = trim($_POST['judul'] ?? '');
$abstrak = trim($_POST['abstrak'] ?? '');
$profile_id = 1;
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));
$created_at = date('c'); // ISO 8601

// Validasi input
if (!$judul || !$abstrak || !$_FILES['gambar']['name']) {
	$_SESSION['error_message'] = "Semua kolom wajib diisi.";
	header('Location: /admin/jurnal/tambah');
	exit;
}

// temporary file path untuk gambar
$gambarTmpPath = $_FILES['gambar']['tmp_name'];

// amankan ekstensi file gambar
$ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);

// Validasi ekstensi file gambar
$gambarName = $slug . '.' . $ext;

// Cek apakah file gambar valid
$success = upload_to_supabase_storage($gambarTmpPath, $gambarName);

// Cek apakah upload berhasil
if (!$success) {
	$_SESSION['error_message'] = "Upload gambar ke Supabase gagal.";
	header('Location: /admin/jurnal/tambah');
	exit;
}

// Siapkan data untuk disimpan
$data = [
	'judul' => $judul,
	'abstrak' => $abstrak,
	'slug' => $slug,
	'gambar' => $gambarName,
	'profile_id' => $profile_id,
	'created_at' => $created_at
];

// Kirim data ke Supabase
[$httpcode, $result] = supabase_insert('jurnal', $data);

// Cek apakah insert berhasil dengan kode HTTP 201 (Created) atau 200 (OK)
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
