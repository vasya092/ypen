<?php
/**
 * Главная страница
 * 
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    cleartheme
 * @copyright  Copyright (c) 2021, Shtab
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?> 
<?php
get_header();
?> 
<div class="frontpage">
    <section class="main-block">
            <img src="/wp-content/uploads/2021/08/2.2-1-1.png" class="main-block__absolute" alt="">
                <div class="main-block__title">Создаем для обучения и игры</div>
                <div class="main-block__desc normal-text">Помогаем детям правильно держать ручку, писать с комфортом и без болей</div>
    </section>
    <section class="ypen-school">
        <div class="block-title ypen-school__block-title">Ypen для школы</div>
        <div class="ypen-school__wrapper">
            <div class="ypen-school__image"></div>
            <div class="ypen-school__info">
                <img src="/wp-content/uploads/2021/08/cloud-cut.svg" alt="" class="ypen-school__cloud-1">
                <img src="/wp-content/uploads/2021/08/cloud2.svg" alt="" class="ypen-school__cloud-2">
                <div class="ypen-school__title">Ручка-тренажер для учеников начальных классов</div>
                <div class="ypen-school__desc normal-text">Помогаем детям правильно держать ручку, писать с комфортом и без болей</div>
                <a href="#" class="button button_white onlymobile">Купить</a>
                <a href="#" class="button button_white onlypc">О ручке YPEN</a>
            </div>    
        </div>
    </section>
    <section class="slider-block">
        <div class="block-title slider-block__block-title">Худи на каждый день</div>
        <?do_shortcode( '[show-category-slider category="hudi"]');?>
    </section>
    
    <section class="slider-block">
        <div class="block-title slider-block__block-title">Футболки на каждый день</div>
        <?do_shortcode( '[show-category-slider category="hudi"]');?>
    </section>
    <section>
   
    </section>
    <div class="instagram">
        <section class="instagram__title">
            <div class="block-title">Следите за нами в Instagram</div>
            <a href="https://www.instagram.com/ypen.ru/" target="_blank" class="instagram__link">@ypen.ru</a>
        </section>
        <div class="instagram__photos">
            <a href="https://instagram.com/ypen.ru?utm_medium=copy_link" target="_blank"><img src="/wp-content/uploads/2021/08/inst1.jpg" alt="" class="instagram__img"></a>
            <a href="https://instagram.com/ypen.ru?utm_medium=copy_link" target="_blank"><img src="/wp-content/uploads/2021/08/inst2.jpg" alt="" class="instagram__img"></a>
            <a href="https://instagram.com/ypen.ru?utm_medium=copy_link" target="_blank"><img src="/wp-content/uploads/2021/09/inst3-2-1.jpg" alt="" class="instagram__img"></a>
            <a href="https://instagram.com/ypen.ru?utm_medium=copy_link" target="_blank"><img src="/wp-content/uploads/2021/09/inst-4-2.jpg" alt="" class="instagram__img"></a>
        </div>
    </div>
    <div class="main-bottom">
        <div class="main-bottom__item">
            <div class="main-bottom__top">
                <div class="main-bottom__title">История ручки-птички</div>
                <div class="main-bottom__desc">Всё началось с одной ручки и превратилось в нашу миссию.</div>
            </div>
            <a href="#" class="main-bottom__button button">Читать подробнее</a>
        </div>
        <div class="main-bottom__item">
            <div class="main-bottom__top">
                <div class="main-bottom__title">Отзывы о нашей продукции</div>
                <div class="main-bottom__desc">Впечатления и первый опыт от наших покупателей</div>
            </div>
            <a href="#" class="main-bottom__button button">Читать подробнее</a>
        </div>
        <div class="main-bottom__item">
            <div class="main-bottom__top">
                <div class="main-bottom__title">Инструкция YPEN</div>
                <div class="main-bottom__desc">У вас в руках YPEN — ручка-тренажер, что дальше?</div>
            </div>
            <a href="#" class="main-bottom__button button">Читать подробнее</a>
        </div>
    </div>
</div>
<?php
get_footer();