<?php
/**
 * The template for displaying all single pages
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

	<div class="content-area">

		<?php
		while ( have_posts() ) :

			the_post();

			?>

			<article <?php post_class(); ?>>

				<?php theme_thumbnail( 'theme-blog' ); ?>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<?php
				if ( get_edit_post_link() ) :

					edit_post_link( esc_html__( '(Изменить)', 'cleartheme' ), '<p class="edit-link">', '</p>' );

				endif;
				?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleartheme' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

			<?php

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>

	</div><!-- .content-area -->

<?php
get_sidebar();
get_footer();
