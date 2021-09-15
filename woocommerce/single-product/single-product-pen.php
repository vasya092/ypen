<section class="pen-product__main">
    <div class="pen-product__mobile">
        <img src="/wp-content/uploads/2021/09/mobile-pen-phone.jpg" alt="" class="pen-product__mobile-img">
    </div>
    <div class="sumary_fullwidth summary entry-summary pen-summary">
        <img src="/wp-content/uploads/2021/09/cat-money.svg" alt="" class="pen-summary__absolute-cat">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_excerpt - 7
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
        <img src="/wp-content/uploads/2021/09/wavesvg.svg" alt="" class="pen-summary__absolute-wave">
	</div>
</section>
