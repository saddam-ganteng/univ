<?php
session_start();
include_once "../configs/db.php";

// Cek apakah request method adalah POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../daftar');
  exit;
}

// Ambil data dari form
$nama = trim($_POST['nama_lengkap'] ?? '');
$email = trim($_POST['email'] ?? '');
$fakultas = trim($_POST['fakultas_dipilih'] ?? '');
$alasan = trim($_POST['alasan'] ?? '');

// Validasi
if (!$nama || !$email || !$fakultas || !$alasan) {
  $_SESSION['error_message'] = "Semua field wajib diisi.";
  header("Location: ../daftar");
  exit;
}

// Kirim ke Supabase
$data = [
  'nama' => $nama,
  'email' => $email,
  'fakultas' => $fakultas,
  'alasan_mendaftar' => $alasan
];

// insert data ke Supabase
[$httpcode, $result] = supabase_insert('pendaftaran', $data);

// Cek apakah insert berhasil dengan kode HTTP 201 (Created) atau 200 (OK)
if ($httpcode === 201 || $httpcode === 200) {
  $_SESSION['success_message'] = "Pendaftaran berhasil! Kami akan segera menghubungi Anda.";
} else {
  $_SESSION['error_message'] = "Gagal mendaftar. Silakan coba lagi nanti.";
}

// Redirect ke halaman daftar
header('Location: ../daftar');
exit;
