<?php
/**
 * Clear Theme functions and definitions
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

define( 'TEMPLATE_VERSION', '1.0.0' );

if ( ! function_exists( 'theme_setup' ) ) :
	function theme_setup() {

		// Авто RSS
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		/*
		 * Поддержка миниаютр изображений
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Регистрация мест для размещения меню
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'cleartheme' ),
				'menu-mobile' => esc_html__( 'Мобильное меню', 'cleartheme' ),
			)
		);

		/*
		 * Для поддержки html5 разметки
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Добавляет возможность менять фон из админки
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		);

		// Поддержка «Selective Refresh» (выборочное обновление) для виджетов в кастомайзере
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Файл стиля для редактирования стилей из админки
		add_editor_style( '/assets/css/editor-style.css' );

		// Поддержка кастомного лога
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		// Поддержка woocommerce.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
	wp_enqueue_script( 'jquery' );
}
/**
 * Подключение стилей и скриптов
 */
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), TEMPLATE_VERSION );

	wp_enqueue_script( 'theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), TEMPLATE_VERSION, true );
	wp_enqueue_script( 'childjs', get_template_directory_uri() . '/assets/js/child.js', array(), TEMPLATE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'theme-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', 'theme-style', TEMPLATE_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Кастомный хедер.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Кастомные теги
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Функции действующие отдельно от шаблонов
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Настройка кастомайзера.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Загрузка настроек кастомайзера
 */
require get_template_directory() . '/inc/customizer/customizer-helper-settings.php';

/**
 * Загрузка функций для woocommerce
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/woocommerce/functions.php';
}
