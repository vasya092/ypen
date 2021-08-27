<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="site-content">
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site-wrapper">

	<header class="header">
	<div class="header__wrapper">
		<div class="hamburger" id="headerBurger">
		</div>
		<div class="mobile-menu">
			<?php wp_nav_menu( [
				'container_class' => 'mobile-menu__wrapper',
				'theme_location'  => 'menu-mobile'
			] ); ?>
		</div>
		<div class="header__products">
			<div class="header__nav">
				<a href="#" class="header__link">Ручка-тренажёр</a>
				<a href="#" class="header__link">Детская одежда</a>
			</div>
		</div>
		<div class="header__logo"><img src="/wp-content/uploads/2021/08/logo.svg" alt="Логотип сайта" class="header__logo-img"></div>
		<div class="header__about">
			<div class="header__nav">
				<a href="#" class="header__link">О нас</a>
				<a href="#" class="header__link">Инструкция YPEN</a>
			</div>
		</div>
		<div class="header__cart">
			<img src="/wp-content/uploads/2021/08/cart.svg" alt="" class="header__cart-img">
		</div>
	</div>
	</header><!-- .site-header -->

	<div class="site-content">
		<div class="wrapper">
