<?php
/**
 * Шаблон футера
 *
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

		</div><!-- .wrapper -->
	</div><!-- .site-content -->

	<footer class="footer">
		<div class="footer__wrapper">
			<div class="footer__logo"><img src="/wp-content/uploads/2021/08/logo-vertical.svg" alt="" class="footer__logo-img"></div>
			<div class="footer__license">
				<p class="footer__licence-first">Ypen® является зарегистрированным товарным знаком. Форма изделия является запатентованной, копирование изделия преследуется по закону.</p>
				<p>Декларация соответствия:<br><br>Разработано и произведено в России. Производитель: ИП Пайкачев Е.В. ИНН</p>
			</div>
			<div class="footer__menu">
				<?php wp_nav_menu( [
					'container_class' => 'footer-1',
					'theme_location'  => 'footer-1'
				] ); ?>
			</div>
			<div class="footer__menu">
				<?php wp_nav_menu( [
					'container_class' => 'footer-2',
					'theme_location'  => 'footer-2'
				] ); ?>
			</div>
			<div class="footer__menu">
				<?php wp_nav_menu( [
					'container_class' => 'footer-3',
					'theme_location'  => 'footer-3'
				] ); ?>
			</div>
			<div class="footer__social">
				<div class="footer__social-wrapper">
					<div class="footer__social-title">Связаться с нами:</div>
					<div class="footer__phone-block">
						<a href="tel:89215150004​" class="footer__phone">8 921 515-00-04​</a>
					</div>
					<div class="footer__icons">
						<a target="_blank" href="https://wa.me/89215150004" class="soc-icon"><img src="/wp-content/uploads/2021/08/whatsapp.svg" alt="" class="soc-icon__img"></a>
						<a target="_blank" href="tel:89215150004" class="soc-icon"><img src="/wp-content/uploads/2021/08/phone.svg" alt="" class="soc-icon__img"></a>
						<a target="_blank" href="https://www.instagram.com/ypen.ru/" class="soc-icon"><img src="/wp-content/uploads/2021/08/inst.svg" alt="" class="soc-icon__img"></a>
					</div>
				</div>
			</div>
			<div class="footer__menu mobile-footer-menu">
				<?php wp_nav_menu( [
					'container_class' => 'footer-mobile',
					'theme_location'  => 'footer-mobile'
				] ); ?>
			</div>
			<div class="footer__copyright footer__bottom-item">© 2021 YPEN. Все права защищены</div>
			<div class="footer__policy "><a class="footer__bottom-item" href="/policy/">Политика конфиденциальности</a></div>
			<div class="footer__cookie"><a class="footer__bottom-item" href="/cookies/">Правила cookie</a></div>
			<div class="footer__developed"><a class="footer__bottom-item" href="https://redshtab.ru/" target="_blank">Разработка сайта</a></div>
		</div>
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</div><!-- .site-wrapper -->

</body>
</html>
