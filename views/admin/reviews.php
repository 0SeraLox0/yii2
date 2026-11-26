<?php

/* @var $this yii\web\View */
/* @var $reviews app\models\Review[] */

use yii\helpers\Html;

$this->title = 'Модерация рецензий — Админка MUSIKZONE';
?>
<section class="screen-view active">
    <?= $this->render('_nav') ?>

    <div class="section-header-row" style="margin-bottom: 16px;">
        <h2 style="font-size: 18px; font-weight: 700;">Все рецензии (<?= count($reviews) ?>)</h2>
    </div>

    <div style="display: flex; flex-direction: column; gap: 12px;">
        <?php foreach ($reviews as $review): ?>
            <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); padding: 18px; display: flex; justify-content: space-between; align-items: flex-start; gap: 16px;">
                <div>
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px;">
                        <strong><?= Html::encode($review->title) ?></strong>
                        <span class="badge <?= $review->status === 'published' ? 'badge-primary' : 'badge-secondary' ?>">
                            <?= $review->status === 'published' ? 'Опубликована' : 'Скрыта' ?>
                        </span>
                        <span style="color: var(--color-rating-gold); font-weight: 700;">★ <?= $review->rating ?>/10</span>
                    </div>
                    <div style="font-size: 12px; color: var(--color-text-tertiary); margin-bottom: 8px;">
                        Автор: <?= Html::encode($review->author_name) ?> (<?= Html::encode($review->author_role) ?>) •
                        Альбом: <?= Html::encode($review->album->title ?? '—') ?> • <?= Html::encode($review->date_label) ?>
                    </div>
                    <p style="font-size: 13px; color: var(--color-text-secondary); line-height: 1.5;"><?= Html::encode($review->text) ?></p>
                </div>
                <div style="display: flex; gap: 8px; flex-shrink: 0;">
                    <?= Html::beginForm(['admin/review-toggle', 'id' => $review->id], 'post') ?>
                        <button type="submit" class="btn btn-sm btn-outline">
                            <?= $review->status === 'published' ? 'Скрыть' : 'Опубликовать' ?>
                        </button>
                    <?= Html::endForm() ?>
                    <?= Html::beginForm(['admin/review-delete', 'id' => $review->id], 'post') ?>
                        <button type="submit" class="btn btn-sm btn-ghost" style="color: var(--color-danger);" onclick="return confirm('Удалить рецензию?');">Удалить</button>
                    <?= Html::endForm() ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
