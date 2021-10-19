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
				'footer-1' => esc_html__( 'Меню футер 1', 'cleartheme' ),
				'footer-2' => esc_html__( 'Меню футер 2', 'cleartheme' ),
				'footer-3' => esc_html__( 'Меню футер 3', 'cleartheme' ),
				'footer-mobile' => esc_html__( 'Мобильный футер', 'cleartheme' ),
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

add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
function myajax_data(){

	// Первый параметр 'twentyfifteen-script' означает, что код будет прикреплен к скрипту с ID 'twentyfifteen-script'
	// 'twentyfifteen-script' должен быть добавлен в очередь на вывод, иначе WP не поймет куда вставлять код локализации
	// Заметка: обычно этот код нужно добавлять в functions.php в том месте где подключаются скрипты, после указанного скрипта
	wp_localize_script( 'header-scripts', 'myajax',
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);

}

function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), TEMPLATE_VERSION );

	wp_enqueue_script( 'header-scripts', get_template_directory_uri() . '/assets/js/header-scripts.js');
	wp_enqueue_script( 'theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), TEMPLATE_VERSION, true );
	wp_enqueue_script( 'childjs', get_template_directory_uri() . '/assets/js/child.js', array(), TEMPLATE_VERSION, true );
	wp_enqueue_script( 'swiperjs', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', array(), TEMPLATE_VERSION, true );
	wp_enqueue_script( 'slidersjs', get_template_directory_uri() . '/assets/js/sliders.js', array(), TEMPLATE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'theme-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', 'theme-style', TEMPLATE_VERSION );
		wp_enqueue_style( 'swipercss','https://unpkg.com/swiper@7/swiper-bundle.min.css', 'theme-style', TEMPLATE_VERSION );
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
 * Функции действующие отдельно от шаблонов
 */
require get_template_directory() . '/inc/product-slider.php';

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

add_filter( 'big_image_size_threshold', '__return_false' );

add_action('wp_footer','custom_jquery_add_to_cart_script');
function custom_jquery_add_to_cart_script(){
    if ( is_product() ): 
        ?>
            <script type="text/javascript">
				jQuery(document).ready(function($){
					var data = {
						action: 'my_action',
						whatever: 1234
					};

					// 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()

				    $('.single_add_to_cart_button').on('click', function() { 
					
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
				});
            </script>
        <?php
    endif;
}


	add_action( 'wp_ajax_my_action', 'my_action_callback' );
	add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback' );
	function my_action_callback() {
			global $woocommerce;
			echo $woocommerce->cart->total;
		wp_die();
	}