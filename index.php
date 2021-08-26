<?php
/**
 * Основной шаблон
 * 
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

<div class="content-area">

	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>

			<header>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>

			<?php
		endif;

		while ( have_posts() ) :

			the_post();
			
			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;

		theme_the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</div><!-- .content-area -->

<?php
get_sidebar();
get_footer();
