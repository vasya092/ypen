<?php
/**
 * Custom template tags for this theme
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'theme_the_custom_logo' ) ) :
	/**
	 * Вывод кастомного лого, если оно есть
	 */
	function theme_the_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();
		}

	}
endif;

if ( ! function_exists( 'theme_the_post_navigation' ) ) :
	/**
	 * Вывод навигации постов
	 */
	function theme_the_post_navigation() {
		$args = array(
			'prev_text' => __( 'Previous Post: <span>%title</span>', 'cleartheme' ),
			'next_text' => __( 'Next Post: <span>%title</span>', 'cleartheme' ),
		);

		the_post_navigation( $args );
	}
endif;


if ( ! function_exists( 'theme_the_posts_navigation' ) ) :
	/**
	 * Вывод навигации постов
	 */
	function theme_the_posts_navigation() {
		$args = array(
			'prev_text'          => esc_html__( '&larr; Older Posts', 'cleartheme' ),
			'next_text'          => esc_html__( 'Newer Posts &rarr;', 'cleartheme' ),
			'screen_reader_text' => esc_html__( 'Posts Navigation', 'cleartheme' ),
		);

		the_posts_navigation( $args );
	}
endif;

if ( ! function_exists( 'theme_thumbnail' ) ) :
	/**
	 * Вывод миниатюр, если существуют
	 *
	 * @param string $size
	 */
	function theme_thumbnail( $size = '' ) {

		if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">

				<?php if ( ! is_single() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( $size ); ?>
					</a>
				<?php else : ?>
					<?php the_post_thumbnail( $size ); ?>
				<?php endif; ?>

			</div><!-- .post-thumbnail -->
			<?php
		}

	}
endif;
