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
                <div class="button button_white">О ручке YPEN</div>
            </div>    
        </div>
    </section>
</div>
<?php
get_footer();