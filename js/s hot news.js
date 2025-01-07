const popup = document.getElementById('popup');
const popupImg = document.getElementById('popup-img');
const popupImgFull = document.getElementById('popup-img-full');
const closePopup = document.getElementById('close-popup');
const zoomSlider = document.getElementById("zoom-slider");

// Ketika gambar diklik
popupImg.addEventListener('click', function () {
    popupImgFull.src = this.src; // Set gambar pop-up dengan gambar yang diklik
    popup.style.display = 'flex'; // Tampilkan pop-up
    setTimeout(() => {
        popup.classList.add('show'); // Tambahkan kelas 'show' untuk menampilkan pop-up
    }, 10); // Tunggu sedikit untuk memastikan pop-up ditampilkan
});

// Ketika tombol tutup diklik
closePopup.addEventListener('click', function () {
    popup.classList.remove('show'); // Hapus kelas 'show' untuk menyembunyikan pop-up
    setTimeout(() => {
        popup.style.display = 'none'; // Sembunyikan pop-up setelah transisi selesai
    }, 500); // Durasi harus sama dengan waktu transisi CSS
});

// Tutup pop-up jika area di luar gambar diklik
popup.addEventListener('click', function (e) {
    if (e.target === this) {
        popup.classList.remove('show'); // Hapus kelas 'show'
        setTimeout(() => {
            popup.style.display = 'none'; // Sembunyikan pop-up setelah transisi selesai
        }, 500);
    }
});
