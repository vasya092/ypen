<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
		
	?>
		<?php while ( have_posts() ) : ?>
			
			<?php the_post();
			
			global $product;
			if($product->id != 97):
			?>
			<section class="woocommerce-product">
			<div class="">
			<? endif;?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
			<? if($product->id != 97): ?>
			</div>
		</section>
			<? endif;?>
		<?php endwhile; // end of the loop. ?>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		?>
		
		<?do_action( 'woocommerce_after_main_content' );?>
		<section class="popup popup__sizes">
			<div class="popup__overlay"></div>
			<div class="popup__content">
				<div class="popup__info">
					<div class="popup__title">Таблица размеров</div>
					<div class="popup__close">Закрыть</div>
				</div>
			<?echo get_post_meta($product->id, 'product_size-table', true);?>
			</div>
		</section>
<div class="modal-wrapper related-popup">
<div class="related-popup__overlay"></div>

<section class="related-popup__wrap">
	<div class="related-popup__block">
		<div class="related-popup__title">Товар успешно добавлен в корзину</div>
		<div class="related-popup__info discount-info">
				<div class="discount-info__loader"></div>
				<div class="discount-info__desc">
					<div class="discount-info__title">Добавьте товар в заказ и получите <span class="bold-text">дополнительную скидку до 15%</span></div>
					<div class="discount-info__progress">
						<div class="progress-bar__curent">0</div>
						<div class="progress-bar">
							<div class="progress-bar__item first">
							<div class="progress-bar__progress" style="width: 0%"></div></div>
							<div class="progress-bar__item second">
							<div class="progress-bar__progress" style="width: 0%"></div></div>
							<div class="progress-bar__item third">
							<div class="progress-bar__progress" style="width: 0%"></div></div>
						</div>
						<div class="progress-bar__numbers">
							<div class="progress-bar__number">0%<br>0 ₽</div>
							<div class="progress-bar__number">5%<br>1800 ₽</div>
							<div class="progress-bar__number">10%<br>4000 ₽</div>
							<div class="progress-bar__number">15%<br>7000 ₽</div>
						</div>
						<div class="progress-bar__checks">
							<ul class="progress-bar__list">
								<li class="progress-bar__check-item">Cкидка 5% при покупке от 1 800 ₽</li>
								<li class="progress-bar__check-item">Cкидка 10% при покупке от 4 000 ₽</li>
								<li class="progress-bar__check-item">Cкидка 15% при покупке от 7 000 ₽</li>
							</ul>
						</div>
					</div>
				</div>
				<?do_shortcode( '[show-category-slider category="hudi"]');?>
		</div>
	</div>
</section>	
</div>
		<?	
		?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
