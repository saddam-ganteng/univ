<?php
include_once "configs/db.php";

$pendaftar = supabase_fetch('jurnal');

$title = "Jurnal | Universitas Dragonara";
?>

<div class="p-6 flex flex-col w-full">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold mb-4 text-amber-700">Daftar Jurnal</h2>
        <button class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-md hover:cursor-pointer"
            type="button" onclick="window.location.href='jurnal/tambah'">
            Tambah Jurnal
        </button>
    </div>
    <div class="overflow-x-auto bg-white border rounded-lg shadow border-stone-200">
        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-amber-100 text-stone-800">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">No</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Judul</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Penulis</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Abstrak</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Gambar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100 text-sm text-stone-700">
                <?php foreach ($pendaftar as $index => $p): ?>
                    <tr class="hover:bg-amber-50 transition">
                        <td class="px-6 py-4"><?= $index + 1 ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($p['judul']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($p['profile_id']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($p['created_at']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($p['abstrak']) ?></td>
                        <td class="px-6 py-4">
                            <?php if (!empty($p['gambar'])): ?>
                                <img src="<?= $supabaseStorageUrl . htmlspecialchars($p['gambar']) ?>" alt="Gambar Jurnal"
                                    class="h-16 object-cover rounded" />
                            <?php else: ?>
                                <span class="text-stone-400 italic">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>