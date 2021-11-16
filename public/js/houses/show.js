const photoPreviews = document.querySelectorAll("[data-photo]");
const photo = document.querySelector("#house-preview");

let photoPreview = new PhotoPreview (photo,photoPreviews);

const swiperNode = document.querySelector(".sim-swiper");

let swiper = new Swiper(".sim-swiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
});

