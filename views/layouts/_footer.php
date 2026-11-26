<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-col">
            <div class="brand-logo" style="margin-bottom: 14px;">
                <span class="logo-vinyl-icon" aria-hidden="true"><span class="logo-vinyl-center"></span></span>
                <span>MUSIK<span class="brand-text-accent">ZONE</span></span>
            </div>
            <p style="font-size: 13px; color: var(--color-text-secondary); line-height: 1.6; max-width: 320px;">
                Каталог музыкальных альбомов с честным рейтингом, экспертными рецензиями критиков и ежегодными релизами года.
            </p>
        </div>

        <div class="footer-col">
            <h4>Навигация</h4>
            <ul class="footer-links">
                <li><?= Html::a('Главная страница', ['site/index']) ?></li>
                <li><?= Html::a('Каталог релизов', ['site/catalog']) ?></li>
                <li><?= Html::a('Лучшее за год', ['site/best-of-year']) ?></li>
                <li><?= Html::a('Оставить отзыв', ['site/review']) ?></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Популярные стили</h4>
            <ul class="footer-links">
                <li><?= Html::a('Электроника', ['site/catalog', 'genre' => 'electronic']) ?></li>
                <li><?= Html::a('Рок &amp; Прогрессив', ['site/catalog', 'genre' => 'rock']) ?></li>
                <li><?= Html::a('Хип-хоп &amp; Нео-Соул', ['site/catalog', 'genre' => 'hip-hop']) ?></li>
                <li><?= Html::a('Джаз &amp; Эмбиент', ['site/catalog', 'genre' => 'jazz']) ?></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Сообщество</h4>
            <ul class="footer-links">
                <li><?= Html::a('Написать рецензию', ['site/review']) ?></li>
                <li><?= Html::a('Правила модерации', ['site/index']) ?></li>
                <li><?= Html::a('Для звукозаписывающих лейблов', ['site/catalog']) ?></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div>© 2026 MusikZone. Каталог музыкальных альбомов, рейтинги и рецензии.</div>
        <div>Семантическая верстка • HTML5, CSS Grid, Flexbox • Yii2 MVC</div>
    </div>
</footer>
