<?php
include_once "configs/db.php";
$title = "Detail Jurnal | Universitas Dragonara";
// Validasi ID dari URL
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
  $error = "Jurnal tidak ditemukan.";
} else {
  // Ambil data jurnal berdasarkan ID, termasuk nama penulis (relasi profile)
  $url = SUPABASE_URL . "/rest/v1/jurnal?id=eq.$id&select=id,judul,abstrak,gambar,created_at,abstrak,profile(nama)";
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apikey: ' . SUPABASE_KEY,
    'Authorization: Bearer ' . SUPABASE_KEY,
    'Content-Type: application/json'
  ]);

  // Eksekusi request
  $response = curl_exec($ch);
  curl_close($ch);

  // Decode JSON response
  $data = json_decode($response, true);
  $jurnal = $data[0] ?? null;

  // Cek apakah jurnal ditemukan
  if (!$jurnal) {
    $error = "Jurnal tidak ditemukan.";
  }
}
?>

<div class="min-h-screen bg-gradient-to-b from-white via-stone-50 to-amber-50 px-6 py-16 pt-30">
  <div class="max-w-3xl mx-auto space-y-8">
    <?php if (isset($error)): ?>
      <div class="text-center mt-20">
        <p class="text-red-600 text-lg font-semibold bg-white px-6 py-4 rounded-lg shadow inline-block">
          ❌ <?= htmlspecialchars($error) ?>
        </p>
        <div class="mt-4">
          <a href="/jurnal" class="text-amber-600 hover:text-amber-800 text-sm font-medium">← Kembali ke daftar
            jurnal</a>
        </div>
      </div>
    <?php else: ?>
      <img src="<?= $supabaseStorageUrl . htmlspecialchars($jurnal['gambar']) ?>"
        class="w-full h-64 object-cover rounded-xl shadow" alt="Cover Jurnal">

      <h1 class="text-3xl font-bold text-stone-800"><?= htmlspecialchars($jurnal['judul']) ?></h1>
      <p class="text-stone-500">
        Oleh <span class="font-medium"><?= htmlspecialchars($jurnal['profile']['nama'] ?? 'Tidak Diketahui') ?></span> —
        <?= date('F j, Y', strtotime($jurnal['created_at'])) ?>
      </p>

      <div class="text-stone-800 leading-relaxed mt-4 whitespace-pre-line">
        <?= htmlspecialchars($jurnal['abstrak']) ?>
      </div>

      <a href="/jurnal" class="inline-block mt-8 text-amber-600 hover:text-amber-800 text-sm font-medium">← Kembali ke
        daftar jurnal</a>
    <?php endif; ?>
  </div>
</div>