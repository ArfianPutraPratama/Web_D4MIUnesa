let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.querySelectorAll('.slides');
    let dots = document.querySelectorAll('.dot');

    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active-dot'));

    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    // Logging untuk memeriksa indeks slide yang aktif
    console.log(`Slide yang aktif: ${slideIndex}`);

    slides[slideIndex - 1].classList.add('active');
    dots[slideIndex - 1].classList.add('active-dot');

    setTimeout(showSlides, 3000); // Ganti gambar setiap 3 detik
}


