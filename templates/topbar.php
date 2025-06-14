<div class="fixed top-0 left-0 w-full z-50 bg-amber-100 border-b border-amber-200">

  <div class="relative flex items-center justify-between flex-wrap lg:flex-nowrap px-4 lg:px-[10rem] py-4">

    <div class="flex items-center gap-10">
      <div>
        <img src="/assets/logo.png" alt="Logo" class="w-14 h-14">
      </div>
      <div class="hidden lg:flex items-center gap-10">
        <a href="home" class="text-stone-700 hover:text-amber-700 hover:underline transition-colors font-normal">
          Beranda
        </a>
        <a href="tentang" class="text-stone-700 hover:text-amber-700 hover:underline transition-colors font-normal">
          Tentang
        </a>
        <a href="fakultas" class="text-stone-700 hover:text-amber-700 hover:underline transition-colors font-normal">
          Fakultas
        </a>
        <a href="kontak" class="text-stone-700 hover:text-amber-700 hover:underline transition-colors font-normal">
          Kontak
        </a>
        <a href="jurnal" class="text-stone-700 hover:text-amber-700 hover:underline transition-colors font-normal">
          Jurnal
        </a>

      </div>

    </div>
    <?php if ($currentPage !== 'daftar'): ?>
      <div
        class="hidden lg:block bg-amber-600 hover:bg-amber-700 text-white px-5 py-2 rounded-xl text-sm font-medium shadow transition duration-200 hover:shadow-lg hover:cursor-pointer">
        <a href="daftar">Gabung Sekarang</a>
      </div>
    <?php endif; ?>

    <button id="hamburger-btn" class="lg:hidden text-stone-700">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
    </button>
  </div>

  <div id="mobile-menu" class="hidden lg:hidden absolute w-full bg-amber-100 border-t border-amber-200 
              transition-all ease-out duration-200 opacity-0 -translate-y-2">
    <a href="home"
      class="block px-3 py-2 rounded-md text-base font-medium text-stone-700 hover:text-amber-700 hover:bg-amber-200">Beranda</a>
    <a href="tentang"
      class="block px-3 py-2 rounded-md text-base font-medium text-stone-700 hover:text-amber-700 hover:bg-amber-200">Tentang</a>
    <a href="fakultas"
      class="block px-3 py-2 rounded-md text-base font-medium text-stone-700 hover:text-amber-700 hover:bg-amber-200">Fakultas</a>
    <a href="kontak"
      class="block px-3 py-2 rounded-md text-base font-medium text-stone-700 hover:text-amber-700 hover:bg-amber-200">Kontak</a>
    <a href="jurnal"
      class="block px-3 py-2 rounded-md text-base font-medium text-stone-700 hover:text-amber-700 hover:bg-amber-200">Jurnal</a>

  </div>

</div>


<script>
  // Menjalankan skrip setelah seluruh halaman dimuat
  document.addEventListener('DOMContentLoaded', () => {

    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    // Fungsi untuk membuka menu
    const openMenu = () => {
      mobileMenu.classList.remove('hidden');
      // Memberi sedikit waktu agar 'display' berubah sebelum transisi dimulai
      setTimeout(() => {
        mobileMenu.classList.remove('opacity-0', '-translate-y-2');
      }, 10);
    };

    // Fungsi untuk menutup menu
    const closeMenu = () => {
      mobileMenu.classList.add('opacity-0', '-translate-y-2');
      // Menunggu transisi selesai sebelum menyembunyikan elemen sepenuhnya
      mobileMenu.addEventListener('transitionend', () => {
        mobileMenu.classList.add('hidden');
      }, { once: true }); // 'once: true' agar event listener otomatis dihapus
    };

    // Event listener untuk tombol hamburger
    hamburgerBtn.addEventListener('click', (e) => {
      e.stopPropagation(); // Mencegah event "klik" menyebar ke dokumen
      // Cek apakah menu sedang terbuka atau tidak dengan class 'hidden'
      const isMenuOpen = !mobileMenu.classList.contains('hidden');
      if (isMenuOpen) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    // Event listener untuk menutup menu saat klik di luar area menu
    document.addEventListener('click', () => {
      const isMenuOpen = !mobileMenu.classList.contains('hidden');
      if (isMenuOpen) {
        closeMenu();
      }
    });

  });
</script>