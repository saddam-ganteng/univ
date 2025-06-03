<div class="h-screen overflow-hidden relative">
  <div id="slider" class="flex transition-transform duration-1000 ease-in-out w-[300%] h-full">
    <!-- Slide 1 -->
    <div class="w-screen h-screen flex items-center bg-amber-50 text-slate-800">
      <div class="flex flex-col w-full space-y-4 bg-red-400">
        <p class="text-4xl font-bold leading-tight tracking-wide">
          Di Gerbang Dragonara,<br />
          <span class="text-amber-700">Ilmu dan Legenda Menyatu.</span>
        </p>
        <p class="text-sm text-slate-700 italic leading-relaxed">
          Tempat di mana para pencari ilmu memulai perjalanan epik menuju kejayaan.<br />
          Dibimbing oleh tradisi, didorong oleh imajinasi.
        </p>
      </div>
      <!-- <img src="assets/slider/slider4.png" alt="Slider" class="w-full md:w-[25%] object-contain drop-shadow-lg bg-red-400 hidden md:block" /> -->
    </div>
    <!-- Slide 2 -->
    <!-- <div class="w-screen h-screen flex px-[10rem] justify-evenly items-center bg-amber-50 text-slate-800">
      <div class="flex flex-col w-[60%] space-y-4">
        <p class="text-4xl font-bold leading-tight tracking-wide">
          Belajar di Benteng Para Cendekia,<br />
          <span class="text-amber-700">Dijaga Sayap Sang Naga.</span>
        </p>
        <p class="text-sm text-slate-700 italic leading-relaxed">
          Fasilitas modern dalam balutan arsitektur klasik. <br /> Suasana magis yang membangkitkan semangat belajar dan
          keberanian menjelajah
        </p>
      </div>
      <img src="assets/slider/slider6.png" alt="Slider" class="w-[25%] object-contain drop-shadow-lg" />
    </div> -->
    <!-- Slide 3 -->
    <!-- <div class="w-screen h-screen flex px-[10rem] justify-evenly items-center bg-amber-50 text-slate-800">
      <div class="flex flex-col w-[60%] space-y-4">
        <p class="text-4xl font-bold leading-tight tracking-wide">
          Siap Menaklukkan Dunia,<br />
          <span class="text-amber-700">Seperti Naga Menaklukkan Langit.</span>
        </p>
        <p class="text-sm text-slate-700 italic leading-relaxed">
          Kami tidak hanya mencetak sarjana, tapi penjelajah zaman. <br /> Siap melesat menembus batas dengan api ambisi
          yang
          menyala
        </p>
      </div>
      <img src="assets/slider/slider5.png" alt="Slider" class="w-[25%] object-contain drop-shadow-lg" />
    </div> -->
  </div>
</div>
<div class="h-screen">
  <div class="px-[10rem]">
    sad
  </div>
</div>

<script>
  let currentSlide = 0;
  const totalSlides = 3; // Sesuaikan jika jumlah slide berubah
  const slider = document.getElementById("slider");
  const slideWidthVw = 100; // Lebar setiap slide dalam vw

  const originalTransitionDuration = "1000ms"; // Dari kelas duration-1000 Tailwind

  function updateSlider(animate = true) {
    if (animate) {
      slider.style.transition = `transform ${originalTransitionDuration} ease-in-out`;
    } else {
      slider.style.transition = 'none';
    }
    slider.style.transform = `translateX(-${currentSlide * slideWidthVw}vw)`;
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlider();
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlider();
  }

  // Auto-slide (opsional)
  // let autoSlideInterval = 10000;
  // let autoSlideTimer;
  // function startAutoSlide() {
  //   stopAutoSlide();
  //   autoSlideTimer = setInterval(nextSlide, autoSlideInterval);
  // }
  // function stopAutoSlide() {
  //   clearInterval(autoSlideTimer);
  // }
  // startAutoSlide();

  let isDown = false;
  let startX;
  let currentTranslateX = 0;
  let dragMovedX = 0;

  function getInitialTranslateX() {
    const slidePixelWidth = window.innerWidth;
    return -currentSlide * slidePixelWidth;
  }

  slider.addEventListener("mousedown", (e) => {
    // stopAutoSlide();
    isDown = true;
    startX = e.clientX;
    currentTranslateX = getInitialTranslateX();
    slider.style.transition = 'none';
    // slider.style.cursor = 'grabbing'; // Dihapus
    dragMovedX = 0;
  });

  slider.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    dragMovedX = e.clientX - startX;
    slider.style.transform = `translateX(${currentTranslateX + dragMovedX}px)`;
  });

  function handleDragEnd() {
    if (!isDown) return;
    isDown = false;
    // slider.style.cursor = 'grab'; // Dihapus
    slider.style.transition = `transform ${originalTransitionDuration} ease-in-out`;

    if (dragMovedX < -50) {
      nextSlide();
    } else if (dragMovedX > 50) {
      prevSlide();
    } else {
      updateSlider();
    }
    // startAutoSlide();
  }

  slider.addEventListener("mouseup", handleDragEnd);
  slider.addEventListener("mouseleave", () => { // Handle mouseleave terpisah agar tidak selalu menjalankan logika drag end
    if (isDown) { // Hanya jika mouse masih ditekan saat keluar
      isDown = false;
      // slider.style.cursor = 'grab'; // Dihapus
      slider.style.transition = `transform ${originalTransitionDuration} ease-in-out`;
      updateSlider(); // Kembali ke posisi slide saat ini
      // startAutoSlide();
    }
  });


  slider.addEventListener("touchstart", (e) => {
    // stopAutoSlide();
    isDown = true;
    startX = e.touches[0].clientX;
    currentTranslateX = getInitialTranslateX();
    slider.style.transition = 'none';
    dragMovedX = 0;
  }, { passive: true });

  slider.addEventListener("touchmove", (e) => {
    if (!isDown) return;
    dragMovedX = e.touches[0].clientX - startX;
    slider.style.transform = `translateX(${currentTranslateX + dragMovedX}px)`;
  });

  slider.addEventListener("touchend", handleDragEnd);

  updateSlider(false);

</script>