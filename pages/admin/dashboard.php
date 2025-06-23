<?php
$title = "Dashboard | Universitas Dragonara";

include_once "configs/db.php";
$pendaftar = supabase_fetch('pendaftaran');
$totalPendaftar = count($pendaftar);

$jumlahAegis = 0;
$jumlahWizard = 0;
$jumlahSylvaran = 0;
$jumlahOrc = 0;
$jumlahDraconis = 0;

foreach ($pendaftar as $p) {
  switch (strtolower($p['fakultas'])) {
    case 'aegis':
      $jumlahAegis++;
      break;
    case 'wizard':
      $jumlahWizard++;
      break;
    case 'sylvaran':
      $jumlahSylvaran++;
      break;
    case 'orc':
      $jumlahOrc++;
      break;
    case 'draconis':
      $jumlahDraconis++;
      break;
  }
}
?>

<div class="p-8 w-full space-y-6">
  <h1 class="text-3xl font-bold text-amber-700">Dashboard</h1>

  <div class="flex flex-col md:flex-row gap-4 w-full">
    <div class="flex-1 bg-white border border-amber-200 shadow-md rounded-xl p-6">
      <h2 class="text-xl font-semibold text-stone-700 mb-2">Total Pendaftar</h2>
      <p class="text-3xl font-bold text-amber-600"><?= $totalPendaftar ?></p>
    </div>
    <div class="flex-1 bg-white border border-amber-200 shadow-md rounded-xl p-6">
      <h2 class="text-xl font-semibold text-stone-700 mb-2">Aegis</h2>
      <p class="text-3xl font-bold text-red-600"><?= $jumlahAegis ?></p>
    </div>
    <div class="flex-1 bg-white border border-amber-200 shadow-md rounded-xl p-6">
      <h2 class="text-xl font-semibold text-stone-700 mb-2">Wizard</h2>
      <p class="text-3xl font-bold text-blue-600"><?= $jumlahWizard ?></p>
    </div>
    <div class="flex-1 bg-white border border-amber-200 shadow-md rounded-xl p-6">
      <h2 class="text-xl font-semibold text-stone-700 mb-2">Sylvaran</h2>
      <p class="text-3xl font-bold text-green-600"><?= $jumlahSylvaran ?></p>
    </div>
    <div class="flex-1 bg-white border border-amber-200 shadow-md rounded-xl p-6">
      <h2 class="text-xl font-semibold text-stone-700 mb-2">Orc</h2>
      <p class="text-3xl font-bold text-yellow-600"><?= $jumlahOrc ?></p>
    </div>
    <div class="flex-1 bg-white border border-amber-200 shadow-md rounded-xl p-6">
      <h2 class="text-xl font-semibold text-stone-700 mb-2">Draconis</h2>
      <p class="text-3xl font-bold text-purple-600"><?= $jumlahDraconis ?></p>
    </div>
  </div>
</div>