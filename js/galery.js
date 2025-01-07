// Select elements
const lightbox = document.getElementById("lightbox");
const lightboxImage = document.getElementById("lightbox-image");
const caption = document.getElementById("caption");
const closeBtn = document.querySelector(".close");

// Add event listeners to each image
document.querySelectorAll(".container img").forEach((image) => {
    image.addEventListener("click", function () {
        lightbox.style.display = "flex";
        lightboxImage.src = this.src;
        caption.innerHTML = this.alt;
    });
});

// Close lightbox when clicking on the close button
closeBtn.addEventListener("click", function () {
    lightbox.style.display = "none";
});

// Close lightbox when clicking outside the image
lightbox.addEventListener("click", function (e) {
    if (e.target === lightbox) {
        lightbox.style.display = "none";
    }
});
