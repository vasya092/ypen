document.querySelectorAll('.slider-block').forEach(n => {
    selectYourProduct = new Swiper(n.querySelector('.product-slider'), {
        direction: 'horizontal',
        navigation: {
            nextEl: n.querySelector('.swiper-button-next'),
            prevEl: n.querySelector('.swiper-button-prev'),
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            // when window width is >= 480px
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
    })
})


const swiper = new Swiper('.before-after__slider', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        type: 'fraction'
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

const popupSlider = new Swiper('.popup-slider', {
    // Optional parameters
    direction: 'horizontal',
    slidesPerView: 5,
    spaceBetween: 20,
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


const gallerySlider = new Swiper('.product-gallery-slider', {
    // Optional parameters
    direction: 'horizontal',
    // If we need pagination
    breakpoints: {
        320: {
            slidesPerView: 1.3,
            spaceBetween: 2,

        },
        // when window width is >= 480px
        768: {
            slidesPerView: 2,
            spaceBetween: 25,
            grid: {
                fill: 'row',
                rows: 3,
                spaceBetween: 0,
            },
        },
    },
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    
    pagination: {
        el: '.gallery-pagination',
    },
});