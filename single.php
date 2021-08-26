<?php
/**
 * The template for displaying all single posts
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

			get_template_part( 'template-parts/content', get_post_format() );

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			theme2_the_post_navigation();

		endwhile;
		?>

	</div><!-- .content-area -->

<?php
get_sidebar();
get_footer();
