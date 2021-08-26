<?php
/**
 * Страница вывода результатов поиска
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

	<section class="content-area">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						printf( esc_html__( 'Найдено результатов: %s', 'cleartheme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			theme_the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</section><!-- .content-area -->

<?php
get_sidebar();
get_footer();
