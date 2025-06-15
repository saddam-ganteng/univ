<?php
session_start();
$secret = 'dragon2025';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['key'] === $secret) {
        $_SESSION['is_admin'] = true;
        header("Location: /admin/dashboard");
        exit;
    } else {
        $error = "Kata kunci salah.";
    }
}
?>

<div class="min-h-screen bg-gradient-to-br from-amber-50 via-white to-red-100 flex items-center justify-center px-4">
    <div class="bg-white/80 backdrop-blur-md shadow-lg rounded-2xl w-full max-w-md p-8 border border-amber-200">
        <h2 class="text-2xl font-bold text-center text-amber-700 mb-6">Akses Admin</h2>
        <form method="POST" class="space-y-4">
            <div>
                <label for="key" class="block text-sm font-medium text-amber-800 mb-1">Kata Kunci Rahasia</label>
                <input type="text" name="key" id="key" placeholder="Masukkan Kata Kunci"
                    class="w-full px-4 py-2 border border-amber-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent bg-white"
                    required>
                <?php if (!empty($error)): ?>
                    <p class="text-sm text-red-600 mt-2"><?= $error ?></p>
                <?php endif; ?>
            </div>
            <button type="submit"
                class="w-full bg-amber-600 hover:bg-amber-700 transition-colors duration-200 text-white py-2 rounded-lg font-medium shadow-md">
                Masuk Admin
            </button>
        </form>
    </div>
</div>