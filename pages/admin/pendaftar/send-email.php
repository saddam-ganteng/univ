<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libs/phpmailer/PHPMailer.php';
require 'libs/phpmailer/SMTP.php';
require 'libs/phpmailer/Exception.php';

function kirimEmailPendaftaran($tujuanEmail, $nama, $status) {
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.testmail.app';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey'; // pakai literal "apikey"
        $mail->Password = '81757a6d-f613-4c22-bf61-21693cf0c766'; // ganti dengan API key kamu
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email pengirim & penerima
        $mail->setFrom('admin@dragonara.ac.id', 'Admin Pendaftaran');
        $mail->addAddress($tujuanEmail, $nama);

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = "Status Pendaftaran Kamu: " . ucfirst($status);
        $mail->Body = "
            <p>Halo <strong>{$nama}</strong>,</p>
            <p>Pendaftaran kamu telah <strong style='color:" . ($status === 'terima' ? 'green' : 'red') . ";'>" . strtoupper($status) . "</strong>.</p>
            <p>Terima kasih telah mendaftar ke Universitas Dragonara.</p>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return $mail->ErrorInfo;
    }
}
