<?php
session_start();
include_once "configs/db.php"; // koneksi supabase/DB kamu

$id = $_GET['id'] ?? null;
$status = $_GET['status'] ?? null;

if (!$id || !in_array($status, ['terima', 'tolak'])) {
    $_SESSION['error_message'] = "Permintaan tidak valid.";
    header('Location: ./pendaftar.php'); // halaman list pendaftar
    exit;
}

// Misal kita update field 'status_pendaftaran' di tabel 'pendaftar'
// $data = ['status_pendaftaran' => $status];

// [$httpcode, $result] = supabase_update('pendaftar', $id, $data);

// if ($httpcode === 200) {
//     $_SESSION['success_message'] = "Pendaftaran berhasil di-{$status}.";
// } else {
//     $_SESSION['error_message'] = "Gagal memproses pendaftaran.";
// }

header("Location: ./pendaftar.php");
exit;
