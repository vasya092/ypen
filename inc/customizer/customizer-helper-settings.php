<?php
/**
 * Настройки
 *
 * @link       https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package    customizer-helper
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version    1.0.0
 */

/**
 * Загрузка класса хелпера
 */
if ( file_exists( dirname( __FILE__ ) . '/class-customizer-helper.php' ) ) {
	require_once dirname( __FILE__ ) . '/class-customizer-helper.php';
}

/**
 * Определение настроек кастомайзера
 */
function customizer_helper_settings() {

	$panels = array();

	$sections = array();

	$settings = array();


	$settings['navigation-bg-color'] = array(
		'section'  => 'colors',
		'id'       => 'navigation-bg-color',
		'label'    => esc_html__( 'Цвет меню', 'cleartheme' ),
		'type'     => 'color',
		'priority' => 41,
		'default'  => '#253e80',
	);

	$settings['panels'] = $panels;

	$settings['sections'] = $sections;

	$customizer_helper = Customizer_Helper::Instance();
	$customizer_helper->add_settings( $settings );

}
add_action( 'init', 'customizer_helper_settings' );
