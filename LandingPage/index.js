document.addEventListener("DOMContentLoaded", function() {
    const carouselSlides = document.querySelectorAll(".carousel-slide");
    const prevButton = document.querySelector(".carousel-prev");
    const nextButton = document.querySelector(".carousel-next");
    const checkbox = document.querySelector('.checkbox');
    let currentSlide = 0;
    let isNavOpen = false; // Tambahkan variabel untuk melacak status hamburger navbarnya
  
    // Fungsi untuk menampilkan slide tertentu
    const showSlide = (slideIndex) => {
      carouselSlides.forEach((slide, index) => {
        if (index === slideIndex) {
          slide.classList.add('active');
          if (!isNavOpen) {
            slide.style.opacity = 1; // Jika hamburger navbar tidak dibuka, atur opacity menjadi 1
          } else {
            slide.style.opacity = 0.8; // Jika dibuka, atur opacity menjadi 0.7
          }
        } else {
          slide.classList.remove('active');
          slide.style.opacity = 0; // Sembunyikan gambar selain yang ditampilkan
        }
      });
    };
  
    // Event listener untuk tombol sebelumnya
    prevButton.addEventListener("click", () => {
      currentSlide = currentSlide === 0 ? carouselSlides.length - 1 : currentSlide - 1;
      showSlide(currentSlide);
    });
  
    // Event listener untuk tombol selanjutnya
    nextButton.addEventListener("click", () => {
      currentSlide = currentSlide === carouselSlides.length - 1 ? 0 : currentSlide + 1;
      showSlide(currentSlide);
    });
  
    // Event listener untuk menyesuaikan opacity saat tombol hamburger di klik
    checkbox.addEventListener('click', () => {
      isNavOpen = checkbox.checked; // Perbarui status hamburger navbar
      if (isNavOpen) {
        carouselSlides.forEach((slide, index) => {
          if (index !== currentSlide) {
            slide.style.opacity = 0; // Sembunyikan gambar selain yang ditampilkan
          } else {
            slide.style.opacity = 0.8; // Atur opacity gambar yang sedang ditampilkan
          }
        });
        prevButton.style.display = 'none'; // Menyembunyikan tombol previous
        nextButton.style.display = 'none'; // Menyembunyikan tombol next
      } else {
        showSlide(currentSlide); // Kembalikan opacity sesuai dengan slide yang sedang ditampilkan
      }
    });
  
    // Tampilkan slide pertama saat halaman dimuat
    showSlide(currentSlide);
});
