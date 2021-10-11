<? 

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_recomend_products', 20);

function woocommerce_output_recomend_products(){
    global $product;
    $recomendProducts = get_post_meta($product->id, 'product_recomends', true);
    if(!empty($recomendProducts)) :
    $recomendsID = explode(',', $recomendProducts);

    ?>
    <section class="related products slider-block">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Вам может быть интересно', 'woocommerce' ) );
		if ( $heading ) :
			?>
			<h2 class="mini-title"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		<div class="swiper product-slider">
        <img src="/wp-content/uploads/2021/08/arrow.svg" alt="" class="swiper-button-next swiper-arrow">
        <img src="/wp-content/uploads/2021/08/arrow.svg" alt="" class="swiper-button-prev swiper-arrow">
        <div class="swiper-wrapper">
            <?
                $productsIds = "";
				foreach ($recomendsID as $releated_product) {
                    ?>
                     <?
                     echo do_shortcode('[products ids="'.$releated_product.'" limit="1" columns="1" class="swiper-slide product-slider__item slider-item"]');?>
                    <?
                }
                ?>
			</div>
		</div>

	</section>
    <?
    endif;
}