const swiper = new Swiper('.product-slider', {
    direction: 'horizontal',
    breakpoints: {
        320: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        // when window width is >= 480px
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20,
        }
    }
});
