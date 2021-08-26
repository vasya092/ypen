<?php
/**
 * Шаблон для вывода постов
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<article <?php post_class(); ?>>

	<?php theme_thumbnail( 'theme-blog' ); ?>

	<header class="entry-header">

		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>

			<div class="entry-meta">
				
			</div>

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( esc_html__( 'Continue reading &rarr;', 'cleartheme' ) );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleartheme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
