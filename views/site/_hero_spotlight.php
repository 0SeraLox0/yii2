<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<a href="<?= Html::encode(Url::to(['site/album', 'id' => 'ram-daftpunk'])) ?>" class="hero-spotlight-card" data-album-id="ram-daftpunk" style="text-decoration: none; color: inherit;">
    <img src="https://images.unsplash.com/photo-1614613535308-eb5fbd3d2c17?w=600&auto=format&fit=crop&q=80" alt="Обложка альбома Random Access Memories" class="hero-spotlight-cover">
    <div>
        <span class="badge badge-gold" style="margin-bottom: 8px;">Альбом месяца</span>
        <h2 style="font-size: 20px; font-weight: 800; margin-bottom: 4px;">Random Access Memories</h2>
        <div style="font-size: 14px; color: var(--color-text-secondary); margin-bottom: 12px;">Daft Punk • 2013</div>
        <div class="album-rating-badge" style="position: static; margin-bottom: 14px;">
            ★ 9.6 / 10 • 3 840 отзывов
        </div>
        <p style="font-size: 13px; color: var(--color-text-tertiary); line-height: 1.4;">
            Триумф аналогового звучания с участием Джорджо Мородера и Найла Роджерса.
        </p>
    </div>
</a>
