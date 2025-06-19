<?php
include_once "configs/db.php";

$pendaftar = supabase_fetch('pendaftaran');

$title = "Pendaftar | Universitas Dragonara";
?>

<div class="p-6 flex flex-col w-full">
    <h2 class="text-2xl font-bold mb-4 text-amber-700">Daftar Pendaftar</h2>
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 border border-green-300 rounded relative">
            <?= $_SESSION['success_message'] ?>
            <button onclick="this.parentElement.style.display='none'"
                class="absolute right-3 top-2 text-lg font-bold">&times;</button>
        </div>
    <?php unset($_SESSION['success_message']); ?>
    <?php elseif (isset($_SESSION['error_message'])): ?>
        <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 border border-red-300 rounded relative">
            <?= $_SESSION['error_message'] ?>
            <button onclick="this.parentElement.style.display='none'"
                class="absolute right-3 top-2 text-lg font-bold">&times;</button>
        </div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
    <div class="overflow-x-auto bg-white border rounded-lg shadow border-stone-200">
        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-amber-100 text-stone-800">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">No</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Fakultas</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Alasan</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100 text-sm text-stone-700">
                <?php foreach ($pendaftar as $index => $p): ?>
                    <tr class="hover:bg-amber-50 transition">
                        <td class="px-6 py-4"><?= $index + 1 ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($p['nama']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($p['email']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($p['fakultas']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($p['alasan_mendaftar']) ?></td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="/admin/pendaftar/send-email?id=<?= $p['id'] ?>&status=terima"
                                class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                Terima
                            </a>
                            <a href="/admin/pendaftar/send-email?id=<?= $p['id'] ?>&status=tolak"
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Tolak
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>