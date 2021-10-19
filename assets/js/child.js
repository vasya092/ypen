jQuery(document).ready(function ($) {


    $('.hamburger').click(function (e) {
        e.preventDefault();
        $('.hamburger').toggleClass('active');
        $('body').toggleClass('no-scroll');
    });

    $('#pa_color').attr('disabled', true)

    $('.spoiler__link').click(function (event) {
        event.preventDefault();
        $(this).parent().toggleClass('active');
        $(this).parent().children('div.spoiler__body').toggle('fast');
        return false;
    });

    $('.table-size-button').click(function (e) { 
        e.preventDefault();
        $('.popup__sizes').fadeIn('fast');
        $('.popup__overlay').fadeIn('fast');
    });

    $('.popup__overlay, .popup__close').click(function (e) { 
        e.preventDefault();
        $('.popup').hide();
        $('.popup__overlay').hide();
    });

    $('li.product   .vi-wpvs-option-wrap').click((e)=> {
        document.location.href = $(e.target).parents('a').attr('href')
    })

    $('.pen-feedback__item').click(function (e) { 
        e.preventDefault();
        $(e.target).next().fadeIn('fast');
    });
    $('.pen-feedback-popup__overlay, .pen-feedback__close').click(()=>{
        $('.pen-feedback__popup').hide();
    })

    $('.related-popup__overlay, .next-buy').click(function (e) { 
        e.preventDefault();
        $('.related-popup__wrap').removeClass('active');
        setTimeout(() => {
            $('.related-popup').hide();
        }, 200);
    });

});
