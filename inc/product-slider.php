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
                    <div class="swiper-slide product-slider__item slider-item">
                        <a href="<?echo get_the_permalink( $value->id );?>">
                            <div class="slider-item__image">
                                <? echo show_sale_badge($value); ?>
                                <? echo get_the_post_thumbnail( $value->id, 'large'); ?>
                            </div>
                            <div class="slider-item__main-info">
                                <div class="slider-item__title"><?echo $value->name;?></div>
                                <div class="slider-item__price"><? echo $value->get_price_html(); ?></div>
                            </div>
                        </a>
                    </div>
                    <?
                }
                ?>
        </div>
    </div>
    <?
}

add_shortcode( 'show-category-slider', 'showCategorySlider' );