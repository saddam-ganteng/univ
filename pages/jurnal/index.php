<?php
include_once "configs/db.php";

// Ambil data jurnal dan penulis dari Supabase (JOIN manual)
$url = SUPABASE_URL . "/rest/v1/jurnal?select=id,judul,abstrak,gambar,created_at,profile(nama)";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'apikey: ' . SUPABASE_KEY,
  'Authorization: Bearer ' . SUPABASE_KEY,
  'Content-Type: application/json'
]);

$response = curl_exec($ch);
curl_close($ch);

$journals = json_decode($response, true);
?>

<div class="min-h-screen bg-gradient-to-b from-stone-50 via-white to-rose-100 px-6 py-16 pt-30">
  <div class="h-full w-full max-w-7xl mx-auto space-y-12">

    <div class="text-center">
      <h1 class="text-4xl font-bold text-stone-800 mb-2">Jurnal Akademik Dragonara</h1>
      <p class="text-stone-600 text-lg">Penelitian dari seluruh fakultas yang terbit resmi</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
      <?php foreach ($journals as $j): ?>
        <div
          class="bg-white/80 border border-stone-200 backdrop-blur-md rounded-xl shadow hover:shadow-lg transition overflow-hidden">
          <!-- <img src="<?= $j['gambar'] ?>" alt="Gambar jurnal" class="w-full h-48 object-cover"> -->
          <img src="<?= htmlspecialchars($supabaseStorageUrl . htmlspecialchars($j['gambar'])) ?>"
            class="w-full h-64 object-cover rounded-xl shadow" alt="Cover Jurnal">
          <div class="p-4">
            <h2 class="text-lg font-semibold text-stone-800"><?= htmlspecialchars($j['judul']) ?></h2>
            <p class="text-sm text-stone-500">Oleh <?= htmlspecialchars($j['profile']['nama']) ?> —
              <?= date('F j, Y', strtotime($j['created_at'])) ?>
            </p>
            <p class="text-stone-700 mt-2 line-clamp-3"><?= htmlspecialchars($j['abstrak']) ?></p>
            <div class="mt-4">
              <a href="/jurnal/detail?id=<?= $j['id'] ?>"
                class="text-amber-600 hover:text-amber-800 text-sm font-medium">Baca selengkapnya →</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>