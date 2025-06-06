<div class="h-screen overflow-hidden relative">
  <div id="slider" class="flex transition-transform duration-1000 ease-in-out h-full">
    <!-- Slide 1 -->
    <div class="min-w-screen h-screen flex items-center bg-amber-50 text-slate-800 px-[2rem] md:px-[10rem]">
      <div class="flex flex-col w-full space-y-4 justify-center">
        <p class="text-4xl font-bold leading-tight tracking-wide">
          Di Gerbang Dragonara,<br />
          <span class="text-amber-700">Ilmu dan Legenda Menyatu.</span>
        </p>
        <p class="text-sm text-slate-700 italic leading-relaxed">
          Tempat di mana para pencari ilmu memulai perjalanan epik menuju kejayaan.<br />
          Dibimbing oleh tradisi, didorong oleh imajinasi.
        </p>
      </div>
      <img src="assets/slider/slider4.png" alt="Slider"
        class="w-full md:w-[25%] object-contain drop-shadow-lg hidden md:block" />
    </div>
    <!-- Slide 2 -->
    <div class="min-w-screen h-screen flex items-center bg-amber-50 text-slate-800 px-[2rem] md:px-[10rem]">
      <div class="flex flex-col w-full space-y-4 justify-center">
        <p class="text-4xl font-bold leading-tight tracking-wide">
          Belajar di Benteng Para Cendekia,<br />
          <span class="text-amber-700">Dijaga Sayap Sang Naga.</span>
        </p>
        <p class="text-sm text-slate-700 italic leading-relaxed">
          Fasilitas modern dalam balutan arsitektur klasik. <br />
          Suasana magis yang membangkitkan semangat belajar dan keberanian menjelajah
        </p>
      </div>
      <img src="assets/slider/slider6.png" alt="Slider"
        class="w-full md:w-[25%] object-contain drop-shadow-lg hidden md:block" />
    </div>
    <!-- Slide 3 -->
    <div class="min-w-screen h-screen flex items-center bg-amber-50 text-slate-800 px-[2rem] md:px-[10rem]">
      <div class="flex flex-col w-full space-y-4 justify-center">
        <p class="text-4xl font-bold leading-tight tracking-wide">
          Siap Menaklukkan Dunia,<br />
          <span class="text-amber-700">Seperti Naga Menaklukkan Langit.</span>
        </p>
        <p class="text-sm text-slate-700 italic leading-relaxed">
          Kami tidak hanya mencetak sarjana, tapi penjelajah zaman. <br />
          Siap melesat menembus batas dengan api ambisi yang menyala
        </p>
      </div>
      <img src="assets/slider/slider5.png" alt="Slider"
        class="w-full md:w-[25%] object-contain drop-shadow-lg hidden md:block" />
    </div>
  </div>
</div>

<div class="min-h-screen">
  <div class="px-[2rem] md:px-[10rem] w-full mt-[5rem]">
    <div class="flex flex-col md:flex-row gap-8 items-center">
      <!-- Kiri (Teks) -->

      <div class="justify-center flex w-[100%] md:w-[60%]">
        <img src="assets/home/bard.png" alt="Penerimaan" class="object-cover" />
      </div>
      <!-- Kanan (Gambar) -->

      <div class="space-y-6 w-[100%] md:w-[40%] flex-col justify-center ">
        <h2 class="text-3xl md:text-4xl font-bold text-stone-800">
          Penerimaan & Dukungan
        </h2>
        <p class="text-stone-600 leading-relaxed">
          Kami membuka gerbang Dragonara bagi para calon penjelajah ilmu. Dalam lingkungan penuh inspirasi, kami
          membekalimu dengan bimbingan, fasilitas, dan semangat untuk menembus batas zaman.
        </p>
        <button class="bg-amber-600 hover:bg-amber-700 transition text-white px-6 py-2 rounded-xl shadow w-fit">
          <div class="flex items-center gap-2">
            <i class="fa-solid fa-scroll"></i> Lihat Ketentuan
          </div>
        </button>
      </div>
    </div>

    <!-- Bawah (Langkah-langkah) -->
    <div class="mt-16">
      <h3 class="text-2xl font-semibold text-stone-800 mb-8">Cara Bergabung</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div class="space-y-2">
          <div class="text-3xl">🪶</div>
          <h4 class="font-semibold text-lg text-stone-700">Kamu Mendaftar</h4>
          <p class="text-sm text-stone-600">Tulis kisah awal perjalananmu. Formulir hanya butuh beberapa menit untuk
            diselesaikan.</p>
        </div>
        <div class="space-y-2">
          <div class="text-3xl">🕯️</div>
          <h4 class="font-semibold text-lg text-stone-700">Kami Terhubung</h4>
          <p class="text-sm text-stone-600">Mentor akan menghubungimu dan membantumu menyusun langkah-langkah
            berikutnya.</p>
        </div>
        <div class="space-y-2">
          <div class="text-3xl">🛡️</div>
          <h4 class="font-semibold text-lg text-stone-700">Kamu Bersiap</h4>
          <p class="text-sm text-stone-600">Setelah diterima, kamu akan mendapatkan jadwal dan siap memasuki dunia ilmu
            dan legenda.</p>
        </div>
      </div>
      <div class="mt-6">
        <button class="bg-amber-600 hover:bg-amber-700 transition text-white px-6 py-2 rounded shadow w-fit">
          🔮 Lihat Semua Persyaratan
        </button>
      </div>
    </div>
  </div>
</div>


<script>
  const slider = document.getElementById("slider");
  const totalSlides = slider.children.length;
  let currentSlide = 0;
  const interval = 10000; // 10 detik

  function goToSlide(index) {
    currentSlide = index % totalSlides;
    slider.style.transition = 'transform 1s ease-in-out';
    slider.style.transform = `translateX(-${currentSlide * 100}vw)`;
  }

  function autoSlide() {
    setTimeout(() => {
      goToSlide(currentSlide + 1);
      autoSlide();
    }, interval);
  }

  // Init
  goToSlide(0);
  autoSlide();
</script>