<div
  class="min-h-screen bg-gradient-to-b from-amber-50 via-white to-red-50 px-6 py-16 flex items-center justify-center">
  <div class="w-full max-w-2xl bg-white/80 border border-stone-200 backdrop-blur-md p-8 rounded-2xl shadow-lg">
    <h2 class="text-3xl font-bold text-stone-800 mb-4 text-center">Formulir Pendaftaran</h2>
    <p class="text-center text-sm text-stone-600 mb-8">
      Bergabunglah dengan Akademi Dragonara dan pilih jalanmu sebagai pahlawan masa depan.
    </p>

    <?php if (!empty($_SESSION['success_message'])): ?>
      <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        <?= $_SESSION['success_message'];
        unset($_SESSION['success_message']); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error_message'])): ?>
      <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
        <?= $_SESSION['error_message'];
        unset($_SESSION['error_message']); ?>
      </div>
    <?php endif; ?>


    <form action="/daftar/proses" method="post">
      <div class="grid grid-cols-1 gap-6">
        <div>
          <label class="block text-stone-700 font-medium mb-1">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="w-full rounded-lg border border-stone-300 px-4 py-2" required>
        </div>
        <div>
          <label class="block text-stone-700 font-medium mb-1">Email</label>
          <input type="email" name="email" class="w-full rounded-lg border border-stone-300 px-4 py-2" required>
        </div>
        <div>
          <label class="block text-stone-700 font-medium mb-1">Fakultas Pilihan</label>
          <select name="fakultas_dipilih" class="w-full rounded-lg border border-stone-300 px-4 py-2" required>
            <option value="">-- Pilih Fakultas --</option>
            <option value="Aegis">Aegis</option>
            <option value="Sylvaran">Sylvaran</option>
            <option value="Draconis">Draconis</option>
            <option value="Orc">Orc</option>
            <option value="Wizard">Wizard</option>
          </select>
        </div>
        <!-- alasan -->
        <div>
          <label class="block text-stone-700 font-medium mb-1">Alasan Bergabung</label>
          <textarea name="alasan" rows="4" class="w-full rounded-lg border border-stone-300 px-4 py-2"
            required></textarea>
        </div>
      </div>
      <div class="mt-8">
        <button type="submit"
          class="w-full bg-amber-600 hover:bg-amber-700 text-white font-medium py-3 rounded-lg transition duration-200">
          Kirim Pendaftaran
        </button>
      </div>
    </form>
  </div>
</div>
<?php ob_end_flush(); ?>