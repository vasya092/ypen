<?php
/**
 * Другие функции действующие отдельно от шаблона
 *
 * В конечном счете, некоторые функции здесь могут быть заменены основными функциями.
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Добавление классов к body
 *
 * @param array $classes Классы для body
 * @return array
 */
function theme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Клас для не одиночных страниц
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_post_type_archive() && ! comments_open() ) {
		$classes[] = 'comments-closed';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );

/**
 * Добавление авто пингбека
 */
function theme_pingback_header() {

	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}

}
add_action( 'wp_head', 'theme_pingback_header' );

/**
 * Замена read more
 */
function new_excerpt_more() {
	global $post;
	return '&hellip; <p><a class="moretag" href="' . get_permalink( $post->ID ) . '">' . esc_html__( 'Read the full article', 'cleartheme' ) . '</a></p>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
