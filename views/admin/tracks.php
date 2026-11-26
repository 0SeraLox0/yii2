<?php

/* @var $this yii\web\View */
/* @var $album app\models\Album */
/* @var $tracks app\models\Track[] */
/* @var $newTrack app\models\Track */

use yii\helpers\Html;

$this->title = 'Треки: ' . $album->title . ' — Админка MUSIKZONE';
?>
<section class="screen-view active">
    <?= $this->render('_nav') ?>

    <div class="section-header-row" style="margin-bottom: 16px;">
        <div>
            <h2 style="font-size: 18px; font-weight: 700;">Треклист: <?= Html::encode($album->artist . ' — ' . $album->title) ?></h2>
            <div class="section-subtitle">Всего треков: <?= count($tracks) ?></div>
        </div>
        <?= Html::a('← К альбомам', ['admin/albums'], ['class' => 'btn btn-sm btn-outline']) ?>
    </div>

    <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); padding: 20px; margin-bottom: 24px;">
        <h3 style="font-size: 15px; font-weight: 700; margin-bottom: 14px;">Добавить трек</h3>
        <?= Html::beginForm(['admin/tracks', 'album_id' => $album->id], 'post') ?>
            <div style="display: grid; grid-template-columns: 80px 1fr 110px 110px 90px auto; gap: 10px; align-items: end;">
                <div>
                    <?= Html::activeLabel($newTrack, 'number', ['class' => 'form-label']) ?>
                    <?= Html::activeInput('number', $newTrack, 'number', ['class' => 'form-control']) ?>
                </div>
                <div>
                    <?= Html::activeLabel($newTrack, 'title', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($newTrack, 'title', ['class' => 'form-control', 'placeholder' => 'Название композиции']) ?>
                </div>
                <div>
                    <?= Html::activeLabel($newTrack, 'duration', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($newTrack, 'duration', ['class' => 'form-control']) ?>
                </div>
                <div>
                    <?= Html::activeLabel($newTrack, 'plays', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($newTrack, 'plays', ['class' => 'form-control']) ?>
                </div>
                <div style="padding-bottom: 10px;">
                    <label class="custom-checkbox">
                        <?= Html::activeCheckbox($newTrack, 'is_hit', ['label' => false]) ?>
                        <span class="checkbox-mark"></span>
                        <span>Хит</span>
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
        <?= Html::endForm() ?>
    </div>

    <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); padding: 16px;">
        <?php foreach ($tracks as $track): ?>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; border-bottom: 1px solid var(--color-border-subtle);">
                <div>
                    <strong><?= $track->number ?>.</strong> <?= Html::encode($track->title) ?>
                    <?php if ($track->is_hit): ?>
                        <span class="badge badge-gold" style="font-size: 10px; margin-left: 6px;">ХИТ</span>
                    <?php endif; ?>
                    <span style="color: var(--color-text-tertiary); font-size: 12px; margin-left: 10px;"><?= Html::encode($track->duration) ?> • <?= Html::encode($track->plays) ?></span>
                </div>
                <?= Html::beginForm(['admin/track-delete', 'id' => $track->id], 'post', ['style' => 'display: inline;']) ?>
                    <button type="submit" class="btn btn-sm btn-ghost" style="color: var(--color-danger);">Удалить</button>
                <?= Html::endForm() ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
