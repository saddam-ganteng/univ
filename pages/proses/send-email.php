<?php

require 'libs/phpmailer/Exception.php';
require 'libs/phpmailer/PHPMailer.php';
require 'libs/phpmailer/SMTP.php';
include_once "configs/db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ambil parameter dari URL
$id = $_GET['id'] ?? '';
$status = $_GET['status'] ?? '';

if (!$id || !$status) {
    die("❌ Permintaan tidak valid. ID dan status harus disediakan.");
}

$ch = curl_init(SUPABASE_URL . "/rest/v1/pendaftaran?id=eq.$id&select=nama,email");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apikey: ' . SUPABASE_KEY,
    'Authorization: Bearer ' . SUPABASE_KEY,
    'Content-Type: application/json',
    'Accept: application/json',
]);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
if (!$data || empty($data)) {
    die("❌ Pendaftar tidak ditemukan.");
}

$nama = $data[0]['nama'] ?? '';
$email = $data[0]['email'] ?? '';

if (!$email || !$nama) {
    die("❌ Data pendaftar tidak lengkap.");
}

$subjek = $status === 'terima' ? 'Pendaftaran Diterima' : 'Pendaftaran Ditolak';
$pesan = $status === 'terima'
    ? "Selamat $nama, pendaftaran kamu telah <b>diterima</b>."
    : "Maaf $nama, pendaftaran kamu <b>tidak diterima</b>.";

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.sendgrid.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'apikey';
    $mail->Password = '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';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('noreply@saddam.me', 'Universitas Dragonara');
    $mail->addAddress($email, $nama);
    $mail->isHTML(true);
    $mail->Subject = $subjek;
    $mail->Body = $pesan;

    $mail->send();
    echo "✅ Email berhasil dikirim ke $email";
} catch (Exception $e) {
    echo "❌ Gagal mengirim email. Error: {$mail->ErrorInfo}";
}
