<?php
include_once "configs/db.php";

$id = $_GET['id'] ?? '';
$status = $_GET['status'] ?? '';

// Validasi input parameter yang diperlukan
if (!$id || !$status) {
  $_SESSION['error_message'] = "❌ Permintaan tidak valid. ID dan status harus disediakan.";
  header("Location: /admin/pendaftar");
  exit;
}

// curl untuk mengambil data pendaftar dari Supabase
$ch = curl_init(SUPABASE_URL . "/rest/v1/pendaftaran?id=eq.$id&select=nama,email");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'apikey: ' . SUPABASE_KEY,
  'Authorization: Bearer ' . SUPABASE_KEY,
  'Accept: application/json',
]);
$response = curl_exec($ch);
curl_close($ch);

// Cek apakah pendaftar ditemukan
$data = json_decode($response, true);
if (!$data || empty($data)) {
  $_SESSION['error_message'] = "❌ Pendaftar tidak ditemukan.";
  header("Location: /admin/pendaftar");
  exit;
}

// Ambil nama dan email dari data pendaftar
$nama = $data[0]['nama'] ?? '';
$email = $data[0]['email'] ?? '';

// Validasi nama dan email
if (!$email || !$nama) {
  $_SESSION['error_message'] = "❌ Data pendaftar tidak lengkap.";
  header("Location: /admin/pendaftar");
  exit;
}

// Update status pendaftaran
$subjek = $status === 'terima' ? 'Pendaftaran Diterima' : 'Pendaftaran Ditolak';
$pesan = $status === 'terima'
  ? "Selamat $nama, pendaftaran kamu telah <b>diterima</b>."
  : "Maaf $nama, pendaftaran kamu <b>tidak diterima</b>.";

// Kirim email menggunakan SendGrid
$payload = [
  "personalizations" => [
    [
      // gunakan email dan nama pendaftar
      "to" => [["email" => $email, "name" => $nama]],
      // gunakan subjek sesuai status
      "subject" => $subjek
    ]
  ],
  // gunakan email pengirim
  "from" => ["email" => "noreply@saddam.me", "name" => "Universitas Dragonara"],
  "content" => [
    [
      // gunakan tipe konten HTML
      "type" => "text/html",
      // gunakan pesan sesuai status
      "value" => $pesan
    ]
  ]
];

// Inisialisasi cURL untuk mengirim email
$ch = curl_init("https://api.sendgrid.com/v3/mail/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Authorization: Bearer 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",
  "Content-Type: application/json"
]);

// Eksekusi cURL untuk mengirim email
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Cek apakah email berhasil dikirim
if ($httpcode === 202) {
  $_SESSION['success_message'] = "Email berhasil dikirim ke $email";
} else {
  $_SESSION['error_message'] = "Gagal mengirim email ke $email";
}

// redirect ke halaman daftar pendaftar
header("Location: /admin/pendaftar");
exit;
