<?php
/**
 * Функции и определения для woocommerce
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2020, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'theme_wc_checkout_link' ) ) {
	/**
	 * Показывать ссылку заказа если в корзине что-то есть
	 */
	function theme_wc_checkout_link() {
		global $woocommerce;

		if ( count( $woocommerce->cart->cart_contents ) > 0 ) :

			echo '<a href="' . esc_url( $woocommerce->cart->get_checkout_url() ) . '" title="' . esc_attr__( 'Заказ', 'cleartheme' ) . '">' . esc_html__( 'Заказать', 'cleartheme' ) . '</a>';

		endif;
	}
}
