<?php

function showCategorySlider($atts) {
    $atts = shortcode_atts( array(
		'category' => '',
	), $atts );
    
    $query_args = array(
        'category' => array( $atts['category'] ),
        'orderby' => 'date',
        'order' => 'ASC'
    );
    $products = wc_get_products( $query_args );
    ?>
    <div class="swiper product-slider">
        <img src="/wp-content/uploads/2021/08/arrow.svg" alt="" class="swiper-button-next swiper-arrow">
        <img src="/wp-content/uploads/2021/08/arrow.svg" alt="" class="swiper-button-prev swiper-arrow">
        <div class="swiper-wrapper">
            <?
                foreach ($products as $value) {
                    ?>
                     <?
                     echo do_shortcode('[products ids="'.$value->id.'" limit="1" columns="1" class="swiper-slide product-slider__item slider-item"]');?>
                    <?
                }
                ?>
        </div>
    </div>
    <?
}

add_shortcode( 'show-category-slider', 'showCategorySlider' );