<?php

/* @var $this yii\web\View */
/* @var $albums app\models\Album[] */

use yii\helpers\Html;

$this->title = 'Альбомы (Админка) — MUSIKZONE';
?>
<section class="screen-view active">
    <?= $this->render('_nav') ?>

    <div class="section-header-row" style="margin-bottom: 16px;">
        <h2 style="font-size: 18px; font-weight: 700;">Все альбомы (<?= count($albums) ?>)</h2>
        <?= Html::a('+ Добавить альбом', ['admin/album-create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>

    <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <thead>
                <tr style="border-bottom: 1px solid var(--color-border-subtle); text-align: left; color: var(--color-text-tertiary); font-size: 12px; text-transform: uppercase;">
                    <th style="padding: 14px 16px;">Альбом</th>
                    <th style="padding: 14px 16px;">Жанр</th>
                    <th style="padding: 14px 16px;">Год</th>
                    <th style="padding: 14px 16px;">Рейтинг</th>
                    <th style="padding: 14px 16px;">Треки / Отзывы</th>
                    <th style="padding: 14px 16px; text-align: right;">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($albums as $album): ?>
                    <tr style="border-bottom: 1px solid var(--color-border-subtle);">
                        <td style="padding: 12px 16px;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <img src="<?= Html::encode($album->cover_image) ?>" alt="" style="width: 44px; height: 44px; object-fit: cover; border-radius: 8px;">
                                <div>
                                    <div style="font-weight: 700;"><?= Html::encode($album->title) ?></div>
                                    <div style="font-size: 12px; color: var(--color-text-tertiary);"><?= Html::encode($album->artist) ?></div>
                                </div>
                            </div>
                        </td>
                        <td style="padding: 12px 16px;"><span class="badge badge-secondary"><?= Html::encode($album->genre->name ?? '—') ?></span></td>
                        <td style="padding: 12px 16px;"><?= $album->year ?></td>
                        <td style="padding: 12px 16px;">★ <?= number_format($album->rating, 1) ?></td>
                        <td style="padding: 12px 16px; color: var(--color-text-secondary);">
                            <?= count($album->tracks) ?> / <?= count($album->allReviews) ?>
                        </td>
                        <td style="padding: 12px 16px; text-align: right; white-space: nowrap;">
                            <?= Html::a('Треки', ['admin/tracks', 'album_id' => $album->id], ['class' => 'btn btn-sm btn-ghost']) ?>
                            <?= Html::a('Изменить', ['admin/album-update', 'id' => $album->id], ['class' => 'btn btn-sm btn-outline']) ?>
                            <?= Html::beginForm(['admin/album-delete', 'id' => $album->id], 'post', ['style' => 'display: inline;']) ?>
                                <button type="submit" class="btn btn-sm btn-ghost" style="color: var(--color-danger);" onclick="return confirm('Удалить альбом и все его треки/рецензии?');">Удалить</button>
                            <?= Html::endForm() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
