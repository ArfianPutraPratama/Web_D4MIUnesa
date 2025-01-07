document.getElementById('search-input').addEventListener('input', function () {
    const searchQuery = this.value.toLowerCase();
    const newsItems = document.querySelectorAll('.news-item');
    let firstMatch = null;

    newsItems.forEach(item => {
        const newsTitle = item.querySelector('.news-details h3').textContent.toLowerCase();

        // Tampilkan hanya item yang cocok dengan pencarian
        if (newsTitle.includes(searchQuery)) {
            item.style.display = 'block';
            if (!firstMatch) firstMatch = item; // Simpan elemen pertama yang cocok
        } else {
            item.style.display = 'none';
        }
    });

    // Scroll ke item pertama yang cocok jika ada
    if (firstMatch) {
        firstMatch.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});

