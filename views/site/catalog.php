<?php

/* @var $this yii\web\View */
/* @var $genre string */

use yii\helpers\Html;

$this->title = 'Каталог музыкальных альбомов — MUSIKZONE';
?>
<section class="screen-view active" id="screen-catalog" data-initial-genre="<?= Html::encode($genre) ?>" aria-labelledby="catalogMainHeading">

    <div class="section-header-row">
        <div>
            <h1 class="section-title" id="catalogMainHeading">Каталог музыкальных альбомов</h1>
            <div class="section-subtitle">Исследуйте дискографии, фильтруйте по рейтингу, жанрам и годам</div>
        </div>
    </div>

    <!-- Панель инструментов каталога: поиск и фильтрация -->
    <div class="catalog-toolbar">
        <div class="catalog-search-row">
            <div class="catalog-search-input-wrap">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="catalogSearchInput" class="form-control" placeholder="Поиск по альбому, исполнителю или стилю..." aria-label="Поиск по каталогу">
            </div>

            <div style="min-width: 180px;">
                <select id="catalogSortSelect" class="form-control" aria-label="Сортировка каталога">
                    <option value="rating-desc">По рейтингу (высокий)</option>
                    <option value="rating-asc">По рейтингу (низкий)</option>
                    <option value="year-desc">Сначала новые</option>
                    <option value="reviews-count">Больше всего рецензий</option>
                </select>
            </div>
        </div>

        <!-- Строка фильтров по жанрам и переключения вида -->
        <div class="catalog-filters-row">
            <div class="filter-chips-group" id="genreChipsContainer">
                <!-- Жанровые чипсы -->
            </div>

            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="min-width: 150px;">
                    <select id="ratingFilterSelect" class="form-control" style="padding: 6px 12px; font-size: 13px;" aria-label="Фильтр по рейтингу">
                        <option value="0">Любой рейтинг</option>
                        <option value="9.5">Рейтинг 9.5+</option>
                        <option value="9.0">Рейтинг 9.0+</option>
                        <option value="8.0">Рейтинг 8.0+</option>
                    </select>
                </div>

                <div class="catalog-view-switches">
                    <button type="button" class="view-toggle-btn active" id="viewGridBtn" title="Сетка" aria-label="Вид сеткой">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                    </button>
                    <button type="button" class="view-toggle-btn" id="viewListBtn" title="Список" aria-label="Вид списком">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Статистика выдачи -->
    <div class="catalog-results-header">
        <span id="catalogResultsCount">Найдено альбомов: 14</span>
        <span>Показана страница 1 из 1</span>
    </div>

    <!-- Контейнер карточек каталога -->
    <div id="albumsGridContainer" class="album-grid">
        <!-- Заполняется динамически -->
    </div>

</section>
