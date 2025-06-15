<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../daftar');
    exit;
}

$url = 'https://rytjeruayveyncmiwhkf.supabase.co/rest/v1/pendaftaran';
$apikey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InJ5dGplcnVheXZleW5jbWl3aGtmIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc0ODkxNDM5NywiZXhwIjoyMDY0NDkwMzk3fQ.WtzNB1fdHGKKgXK2yNZLP5e1ENRTbKNzdnPQh4W6EPk';

$nama = $_POST['nama_lengkap'] ?? '';
$email = $_POST['email'] ?? '';
$fakultas = $_POST['fakultas_dipilih'] ?? '';
$alasan = $_POST['alasan'] ?? '';

if (!$nama || !$email || !$fakultas || !$alasan) {
    $_SESSION['error_message'] = "Semua field wajib diisi.";
    header("Location: ../daftar");
    exit;
}

$data = json_encode([
    'nama' => $nama,
    'email' => $email,
    'fakultas' => $fakultas,
    'alasan_mendaftar' => $alasan
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'apikey: ' . $apikey,
    'Authorization: Bearer ' . $apikey,
    'Prefer: return=representation'
]);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpcode === 201 || $httpcode === 200) {
    $_SESSION['success_message'] = "Pendaftaran berhasil! Kami akan segera menghubungi Anda.";
} else {
    $_SESSION['error_message'] = "Gagal mendaftar. Silakan coba lagi nanti.";
}

header('Location: ../daftar');
exit;
