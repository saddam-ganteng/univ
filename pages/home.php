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

<div class="h-screen">
  <div class="px-[10rem]">
    sad
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