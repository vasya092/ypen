<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="custom-cart">
<?
do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
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
					</div>
					
					<div class="progress-bar__remains">Чтобы получить дополнительную скидку добавьте в корзину товары на сумму 900 руб.</div>
				</div>
		</div>
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


						<td class="product-thumbnail">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('medium'), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
						</td>

						<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
						<div class="product-name__wrapper">
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}
						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
						?>
						</div>
						<?
						echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'woocommerce_cart_item_remove_link',
							sprintf(
								'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">Удалить</a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								esc_html__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							),
							$cart_item_key
						);
						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
						</td>


						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</td>

						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">

					

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>

</section> 
<script type="text/javascript">
				jQuery(document).ready(function($){
					var data = {
						action: 'my_action',
						whatever: 1234
					};

					// 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()

					
						$('.discount-info__loader').show();
						setTimeout(() => {
							jQuery.post( myajax.url, data, function(response) {
								$('.progress-bar__curent').text(response);
								let steps = [1800, 4000, 7000];
								for (let step = 0; step < steps.length; step++) {
									if(response <= steps[step])
									{	
										let currentPercent = 0;
										if(step > 0) {
											currentPercent = (response-steps[step-1])/(steps[step] - steps[step-1]);
											console.log(currentPercent, response, step);
											$('.progress-bar .progress-bar__item:nth-child('+(step)+') .progress-bar__progress').css("width", "100%");
											$('.progress-bar .progress-bar__item:nth-child('+(step)+') .progress-bar__progress').addClass("full");
											$('.progress-bar__list .progress-bar__check-item:nth-child('+(step)+')').addClass("active");
											$('.progress-bar__numbers .progress-bar__number:nth-child('+(step+1)+')').addClass("active");
										}
										else {
											currentPercent = response/steps[step];
										}
										
										if(response > steps[0]) {
											$('.progress-bar .progress-bar__item:nth-child(1) .progress-bar__progress').css("width", "100%");
											$('.progress-bar .progress-bar__item:nth-child(1) .progress-bar__progress').addClass("full");
											$('.progress-bar__list .progress-bar__check-item:nth-child(1)').addClass("active");
											$('.progress-bar__numbers .progress-bar__number:nth-child(2)').addClass("active");
										}
										if(currentPercent >= 1) {
											currentPercent  = 100;
											$('.progress-bar .progress-bar__item:nth-child('+(step+1)+') .progress-bar__progress').css("width", currentPercent+"%");
											$('.progress-bar .progress-bar__item:nth-child('+(step+1)+') .progress-bar__progress').css("width", currentPercent+"%");
											$('.progress-bar__list .progress-bar__check-item:nth-child('+(step+1)+')').addClass("active");
											$('.progress-bar__numbers .progress-bar__number:nth-child('+(step+2)+')').addClass("active");
										}
										else {
											currentPercent = currentPercent * 100;
											$('.progress-bar .progress-bar__item:nth-child('+(step+1)+') .progress-bar__progress').css("width", currentPercent+"%");
											$('.progress-bar__numbers .progress-bar__number').addClass("active");
										}
										console.log('response: ', response, ' steps[step]: ',steps[step], ' is cp:', currentPercent, 'step: ', step);
										console.log('.progress-bar__list .progress-bar__check-item:nth-child('+(step+1)+')');
										break;
									}
									if(step == 2) {
										if(response >= steps[step]){
											$('.progress-bar .progress-bar__item .progress-bar__progress').css("width", "100%");
											$('.progress-bar .progress-bar__item .progress-bar__progress').addClass("full");
											$('.progress-bar__list .progress-bar__check-item').addClass("active");
										}
									}
								}
								$('.discount-info__loader').hide();
							});
						}, 600);
						$('.related-popup').show();
						setTimeout(() => {
							$('.related-popup__wrap').addClass('active');
						}, 200);
				    });
            </script>