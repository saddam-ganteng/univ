<?php
$journals = require __DIR__ . '/../../data/journals.php';

if (!isset($_GET['id'])) {
    echo "<p class='text-center mt-20 text-red-600'>Jurnal tidak ditemukan.</p>";
    return;
}

$id = $_GET['id'];
$jurnal = null;

foreach ($journals as $j) {
    if ($j['id'] == $id) {
        $jurnal = $j;
        break;
    }
}

if (!$jurnal) {
    echo "<p class='text-center mt-20 text-red-600'>Jurnal tidak ditemukan.</p>";
    return;
}
?>

<div class="min-h-screen bg-gradient-to-b from-white via-stone-50 to-amber-50 px-6 py-16 pt-30">
    <div class="max-w-3xl mx-auto space-y-8">
        <img src="<?= $jurnal['gambar'] ?>" class="w-full h-64 object-cover rounded-xl shadow" alt="Cover Jurnal">

        <h1 class="text-3xl font-bold text-stone-800"><?= htmlspecialchars($jurnal['judul']) ?></h1>
        <p class="text-stone-500">Oleh <span class="font-medium"><?= htmlspecialchars($jurnal['penulis']) ?></span> —
            <?= date('F j, Y', strtotime($jurnal['tanggal'])) ?>
        </p>

        <div class="text-stone-800 leading-relaxed mt-4">
            <?= nl2br(htmlspecialchars($jurnal['isi'])) ?>
        </div>

        <a href="/jurnal" class="inline-block mt-8 text-amber-600 hover:text-amber-800 text-sm font-medium">← Kembali ke
            daftar jurnal</a>
    </div>
</div>