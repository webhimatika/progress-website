var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1, // This should be set to 'auto' to respect the CSS width
  spaceBetween: 0,
  loop: true,
  autoplay: {
    delay: 6000,
    disableOnInteraction: false,
  },
  keyboard: {
    enabled: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    400: {
      slidesPerView: 1, // 1 slide per view for small screens
      spaceBetween: 50,
    },
  },
});
