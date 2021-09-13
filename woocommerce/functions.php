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

//Замена стандартного вывода цены
require_once "custom_get_price_html.php";

//Замена бейджа скидки
require_once "custom_woocommerce_sale_flash.php";

add_filter('woocommerce_loop_add_to_cart_link', 'variation_on_category');

function variation_on_category(){

    global $product;

    if ($product->is_type('variable')) {

        // Enqueue variation scripts.
        wp_enqueue_script('wc-add-to-cart-variation');

        // Get Available variations?
        $get_variations = count($product->get_children()) <= apply_filters('woocommerce_ajax_variation_threshold', 30, $product);
        $available_variations = $get_variations ? $product->get_available_variations() : false;
        $attributes = $product->get_variation_attributes();
        $selected_attributes = $product->get_default_attributes();
        $attribute_keys = array_keys($attributes);
        ?>

        <form class="variations_form cart"
              action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
              method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>"
              data-product_variations="<?php echo htmlspecialchars(wp_json_encode($available_variations)); // WPCS: XSS ok. ?>">
            <?php do_action('woocommerce_before_variations_form'); ?>

            <?php if (empty($available_variations) && false !== $available_variations) : ?>
                <p class="stock out-of-stock"><?php esc_html_e('This product is currently out of stock and unavailable.', 'woocommerce'); ?></p>
            <?php else : ?>
                <table class="variations" cellspacing="0">
                    <tbody>
                    <?php foreach ($attributes as $attribute_name => $options) : ?>
                        <tr>
                            <td class="label"><label
                                        for="<?php echo esc_attr(sanitize_title($attribute_name)); ?>"><?php echo wc_attribute_label($attribute_name); // WPCS: XSS ok. ?></label>
                            </td>
                            <td class="value">
                                <?php
                                wc_dropdown_variation_attribute_options(array(
                                    'options' => $options,
                                    'attribute' => $attribute_name,
                                    'product' => $product,
                                ));
                                echo end($attribute_keys) === $attribute_name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__('Clear', 'woocommerce') . '</a>')) : '';
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="single_variation_wrap">
                    <?php
                    /**
                     * Hook: woocommerce_before_single_variation.
                     */
                    do_action('woocommerce_before_single_variation');

                    /**
                     * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
                     *
                     * @since 2.4.0
                     * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                     * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                     */
                    do_action('woocommerce_single_variation');

                    /**
                     * Hook: woocommerce_after_single_variation.
                     */
                    do_action('woocommerce_after_single_variation');
                    ?>
                </div>
            <?php endif; ?>

            <?php do_action('woocommerce_after_variations_form'); ?>
        </form>

    <?php } else {

        $args = array();
        $defaults = array(
            'quantity' => 1,
            'class' => implode(' ', array_filter(array(
                'button',
                'product_type_' . $product->get_type(),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
            ))),
            'attributes' => array(
                'data-product_id' => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label' => $product->add_to_cart_description(),
                'rel' => 'nofollow',
            ),
        );

        $args = wp_parse_args($args, $defaults);

        if (isset($args['attributes']['aria-label'])) {
            $args['attributes']['aria-label'] = strip_tags($args['attributes']['aria-label']);
        }

        echo sprintf('<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url($product->add_to_cart_url()),
            esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
            esc_attr(isset($args['class']) ? $args['class'] : 'button'),
            isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
            esc_html($product->add_to_cart_text())
        );

    }
}

//Вывод минимальной цены для товаров с вариацией
//TODO: Доработать вывод скидки
add_filter('woocommerce_variable_price_html', 'mycustom_variation_price', 10, 2);
add_filter('woocommerce_variable_sale_price_html', 'mycustom_variation_price', 10, 2 );
 
function mycustom_variation_price( $price, $product ) {
	if ( ! is_admin() && ((is_shop() || is_product_category() || is_home() || is_page()))) {
     $price = '';
     $price .= woocommerce_price($product->get_price());
    } 
    return $price;
}

//remove action
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
function showTest() {
    return "test";
}
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 5 );