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

function showProductsSlider($atts) {
    $atts = shortcode_atts( array(
		'ids' => '',
	), $atts );
    $productIds = explode(" ", $atts['ids']);
    ?>
    <div class="swiper product-slider">
        <img src="/wp-content/uploads/2021/08/arrow.svg" alt="" class="swiper-button-next swiper-arrow">
        <img src="/wp-content/uploads/2021/08/arrow.svg" alt="" class="swiper-button-prev swiper-arrow">
        <div class="swiper-wrapper">
            <?
                foreach ($productIds as $productId) {
                    ?>
                     <?
                     echo do_shortcode('[products ids="'.$productId.'" limit="1" columns="1" class="swiper-slide product-slider__item slider-item"]');?>
                    <?
                }
                ?>
        </div>
    </div>
    <?
}


add_shortcode( 'show-products-slider', 'showProductsSlider' );

function showPopupSlider($atts) {
    global $product;
    $exclude_ids = array($product->id);
    $args = array(
        'post_type'              => array( 'product' ),
        'exclude'           => $exclude_ids,
        'orderby'     => 'rand',
      );
      
    
    $query = get_posts( $args );
    $atts = shortcode_atts( array(
		'ids' => '',
	), $atts );
    $productIds = explode(" ", $atts['ids']);
    ?>
    <div class="swiper popup-slider">
        <img src="/wp-content/uploads/2021/08/arrow.svg" alt="" class="swiper-button-next swiper-arrow">
        <img src="/wp-content/uploads/2021/08/arrow.svg" alt="" class="swiper-button-prev swiper-arrow">
        <div class="swiper-wrapper">
            <?
                foreach ($query as $item) {
                    ?>
                     <?
                     echo do_shortcode('[products ids="'.$item->ID.'" limit="1" columns="1" class="swiper-slide product-slider__item slider-item"]');?>
                    <?
                }
                ?>
        </div>
    </div>
    <?
}


add_shortcode( 'show-popup-slider', 'showPopupSlider' );