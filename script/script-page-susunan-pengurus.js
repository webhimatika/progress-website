var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1, // This should be set to 'auto' to respect the CSS width
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    // when window width is >= 320px
    1000: {
      slidesPerView: 4, // 1 slide per view for small screens
      spaceBetween: 10,
    },
    800: {
      slidesPerView: 3, // 1 slide per view for small screens
      spaceBetween: 20,
    },
    600: {
      slidesPerView: 2, // 1 slide per view for small screens
      spaceBetween: 20,
    },
    400: {
      slidesPerView: 1, // 1 slide per view for small screens
      spaceBetween: 50,
    },
  },
});
