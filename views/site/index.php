<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'MUSIKZONE — Каталог музыкальных альбомов, рейтинги и рецензии';
?>
<section class="screen-view active" id="screen-home" aria-label="Главная страница каталога">

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-content">
            <span class="hero-tagline">Музыкальный гид 2026</span>
            <h1 class="hero-title">Открывайте шедевры звука, читайте честные рецензии</h1>
            <p class="hero-description">
                Каталог музыкальных альбомов от классики рока до футуристичной электроники и свежих релизов. Оценки критиков, рейтинги слушателей и ежегодные списки лучших.
            </p>
            <div class="hero-actions-row">
                <?= Html::a('Перейти в каталог', ['site/catalog'], ['class' => 'btn btn-primary btn-lg']) ?>
                <?= Html::a('Топ релизов года', ['site/best-of-year'], ['class' => 'btn btn-gold btn-lg']) ?>
            </div>

            <div class="hero-stats-strip">
                <div class="stat-item">
                    <span class="stat-number">14 800+</span>
                    <span class="stat-label">Альбомов в базе</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">86 400+</span>
                    <span class="stat-label">Рецензий критиков</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">9.8</span>
                    <span class="stat-label">Средний топ-балл</span>
                </div>
            </div>
        </div>

        <!-- Промо-карточка в Hero (partial) -->
        <?= $this->render('_hero_spotlight') ?>
    </div>

    <!-- Жанры (Карусель быстрого доступа) -->
    <section style="margin-bottom: 40px;" aria-labelledby="genresHeading">
        <div class="section-header-row">
            <div>
                <h2 class="section-title" id="genresHeading">Жанровые направления</h2>
                <div class="section-subtitle">Выберите интересующий стиль для быстрой фильтрации</div>
            </div>
            <?= Html::a('Все жанры →', ['site/catalog'], ['class' => 'btn btn-sm btn-ghost']) ?>
        </div>
        <div class="genre-pills-scroll" id="homeGenresScroll">
            <!-- Заполняется динамически -->
        </div>
    </section>

    <!-- Популярные альбомы -->
    <section style="margin-bottom: 48px;" aria-labelledby="popularHeading">
        <div class="section-header-row">
            <div>
                <h2 class="section-title" id="popularHeading">Популярные альбомы с высоким рейтингом</h2>
                <div class="section-subtitle">Пластинки с оценкой 9.0 и выше по версии сообщества MusikZone</div>
            </div>
            <?= Html::a('Смотреть все альбомы', ['site/catalog'], ['class' => 'btn btn-sm btn-outline']) ?>
        </div>
        <div class="album-grid" id="homeFeaturedGrid">
            <!-- Заполняется динамически -->
        </div>
    </section>

    <!-- Свежие рецензии сообщества -->
    <section style="margin-bottom: 32px;" aria-labelledby="recentReviewsHeading">
        <div class="section-header-row">
            <div>
                <h2 class="section-title" id="recentReviewsHeading">Свежие рецензии и мнения</h2>
                <div class="section-subtitle">Что думают музыкальные критики и слушатели прямо сейчас</div>
            </div>
            <?= Html::a('Написать свой отзыв', ['site/review'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
        <div class="review-grid" id="homeRecentReviewsGrid">
            <!-- Заполняется динамически -->
        </div>
    </section>

</section>
