<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 * <?php the_header_image_tag(); ?>
 *
 * @link       https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses theme_header_style()
 */
function theme_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'scaffold_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'flex-width'         => true,
				'wp-head-callback'   => 'theme_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'theme_custom_header_setup' );

if ( ! function_exists( 'theme_header_style' ) ) :


	function theme_header_style() {

		?>
		<?php
	}
endif;
