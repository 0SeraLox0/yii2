<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<aside class="mini-player-bar" aria-label="Музыкальный аудиоплеер">
    <div class="player-inner">
        <!-- Трек и обложка -->
        <div class="player-track-info">
            <img src="https://images.unsplash.com/photo-1614613535308-eb5fbd3d2c17?w=100&auto=format&fit=crop&q=80" alt="Сейчас играет" class="player-thumb" id="playerThumb">
            <div class="player-track-details">
                <span class="player-track-title" id="playerTrackTitle">Instant Crush (feat. Julian Casablancas)</span>
                <span class="player-track-artist" id="playerTrackArtist">Daft Punk</span>
            </div>
        </div>

        <!-- Управление -->
        <div class="player-controls">
            <div class="player-buttons-row">
                <button type="button" class="btn btn-ghost btn-sm" title="Предыдущий" aria-label="Предыдущий трек" style="padding: 4px;">⏮</button>
                <button type="button" class="btn btn-primary btn-icon-only" id="playerPlayBtn" title="Воспроизвести / Пауза" aria-label="Воспроизвести" style="width: 40px; height: 40px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <button type="button" class="btn btn-ghost btn-sm" title="Следующий" aria-label="Следующий трек" style="padding: 4px;">⏭</button>
            </div>
            <div class="player-progress-row">
                <span>1:42</span>
                <div class="progress-bar-container" id="playerProgressBar" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar-fill" style="width: 32%;"></div>
                </div>
                <span>5:37</span>
            </div>
        </div>

        <!-- Громкость и рецензия -->
        <div style="display: flex; align-items: center; gap: 12px;">
            <button type="button" class="btn btn-ghost btn-sm" title="Громкость" aria-label="Громкость">🔊</button>
            <?= Html::a('Рецензия', ['site/review'], ['class' => 'btn btn-outline btn-sm']) ?>
        </div>
    </div>
</aside>
