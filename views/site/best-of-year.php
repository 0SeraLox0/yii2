<?php

/* @var $this yii\web\View */
/* @var $year string */

use yii\helpers\Html;

$this->title = 'Лучшее за год — MUSIKZONE';
?>
<section class="screen-view active" id="screen-best-of-year" data-initial-year="<?= Html::encode($year) ?>" aria-labelledby="bestYearTitle">

    <header class="best-year-header-banner">
        <span class="badge badge-gold" style="font-size: 13px; padding: 6px 14px;">Ежегодный Зал Славы</span>
        <h1 class="hero-title" style="margin-top: 14px;" id="bestYearTitle">Главные музыкальные релизы года</h1>
        <p class="hero-description" style="margin: 0 auto;" id="bestYearSubtitle">
            Кураторские подборки, отмеченные международными критиками и слушателями MusikZone
        </p>

        <!-- Переключатель годов -->
        <div class="year-tabs-nav" id="yearTabsContainer">
            <button type="button" class="year-tab-btn <?= $year === '2026' ? 'active' : '' ?>" data-year="2026">2026</button>
            <button type="button" class="year-tab-btn <?= $year === '2024' ? 'active' : '' ?>" data-year="2024">2024</button>
            <button type="button" class="year-tab-btn <?= $year === 'all-time' ? 'active' : '' ?>" data-year="all-time">All-Time Classics</button>
        </div>
    </header>

    <!-- Пьедестал топ-3 релиза -->
    <div class="podium-container" id="bestOfYearPodium">
        <!-- Рендерится через JS -->
    </div>

</section>
