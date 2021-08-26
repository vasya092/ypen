<?php
/**
 * Cleartheme  Customizer
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Добавление поддержки postMessage
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'theme_customize_register' );

/**
 * Бинд js оберток для приминения изменений динамически
 */
function theme_customize_preview_js() {
	wp_enqueue_script( 'theme_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'theme_customize_preview_js' );

/**
 * Поддержка изменения hex.
 *
 * @param string $hex 
 * @param int    $steps
 */
function theme_brightness( $hex, $steps ) {

	$steps = max( -255, min( 255, $steps ) );

	// Форматирование в шестнадцатеричную строку длиной в шесть символов.
	$hex = str_replace( '#', '', $hex );
	if ( strlen( $hex ) === 3 ) {
		$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
	}

	// Разделение на R G B
	$color_parts = str_split( $hex, 2 );
	$return      = '#';

	foreach ( $color_parts as $color ) {
		$color   = hexdec( $color ); 
		$color   = max( 0, min( 255, $color + $steps ) );
		$return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); 
	}

	return sanitize_hex_color( $return );
}

/**
 * Вывод CSS из кастомайзера в шапку
 */
function theme_customizer_css() {

	$bg_color = get_theme_mod( 'navigation-bg-color', '#253e80' );
	?>
	<style>
		.menu-1 {
			background-color: <?php echo sanitize_hex_color( $bg_color ); // WPCS: XSS ok. ?>;
		}
		.menu-1 li:hover, .menu-1 li.focus {
			background-color: <?php echo theme_brightness( $bg_color, -25 ); // WPCS: XSS ok. ?>;
		}
		.menu-1 ul ul li {
			background-color: <?php echo theme_brightness( $bg_color, -50 ); // WPCS: XSS ok. ?>;
		}
		.menu-1 .sub-menu li:hover {
			background-color: <?php echo theme_brightness( $bg_color, -75 ); // WPCS: XSS ok. ?>;
		}
		.menu-toggle {
			background-color: <?php echo sanitize_hex_color( $bg_color ); // WPCS: XSS ok. ?>;
		}
		.toggled .menu-toggle {
			background-color: <?php echo theme_brightness( $bg_color, -50 ); // WPCS: XSS ok. ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'theme_customizer_css' );
