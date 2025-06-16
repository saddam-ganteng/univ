<div class="min-h-screen bg-stone-100 flex items-center justify-center px-4 py-10 w-full">
    <div class="bg-white shadow-xl rounded-2xl w-full max-w-2xl p-8">
        <h2 class="text-2xl md:text-3xl font-bold text-stone-800 mb-6 text-center">Tambah Jurnal Baru</h2>

        <form action="/admin/jurnal/tambah/proses" method="POST" enctype="multipart/form-data" class="space-y-5">

            <div>
                <label class="block text-sm font-semibold text-stone-700 mb-1">Judul Jurnal</label>
                <input type="text" name="judul" placeholder="Masukkan judul jurnal"
                    class="w-full border border-stone-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                    required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-stone-700 mb-1">Abstrak</label>
                <textarea name="abstrak" rows="5" placeholder="Tuliskan ringkasan jurnal..."
                    class="w-full border border-stone-300 px-4 py-2 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-amber-500"
                    required></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-stone-700 mb-1">Gambar</label>
                <input type="file" name="gambar" accept="image/*"
                    class="w-full text-stone-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-600 file:text-white hover:file:bg-amber-700 transition"
                    required>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-amber-600 hover:bg-amber-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-200">
                    Simpan Jurnal
                </button>
            </div>

        </form>
    </div>
</div>