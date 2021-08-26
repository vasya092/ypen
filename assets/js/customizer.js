/**
 * Customizer.js
 *
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

(function ($) {

	// Заголовок и описание сайта
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});

	// Цвет названия сайта
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.site-title a, .site-description').css({
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				});
			} else {
				$('.site-title a, .site-description').css({
					'clip': 'auto',
					'position': 'relative'
				});
				$('.site-title a').css({
					'color': to
				});
			}
		});
	});
})(jQuery);
