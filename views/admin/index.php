<?php

/* @var $this yii\web\View */
/* @var $albumsCount int */
/* @var $tracksCount int */
/* @var $reviewsCount int */
/* @var $usersCount int */
/* @var $recentReviews app\models\Review[] */

use yii\helpers\Html;

$this->title = 'Панель администратора — MUSIKZONE';
?>
<section class="screen-view active">
    <?= $this->render('_nav') ?>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 18px; margin-bottom: 32px;">
        <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); padding: 22px;">
            <div style="font-size: 13px; color: var(--color-text-tertiary); margin-bottom: 6px;">Альбомов в БД</div>
            <div style="font-size: 32px; font-weight: 800; color: var(--color-text-primary);"><?= $albumsCount ?></div>
            <div style="margin-top: 12px;"><?= Html::a('Управлять →', ['admin/albums'], ['class' => 'btn btn-sm btn-outline']) ?></div>
        </div>
        <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); padding: 22px;">
            <div style="font-size: 13px; color: var(--color-text-tertiary); margin-bottom: 6px;">Треков в БД</div>
            <div style="font-size: 32px; font-weight: 800; color: var(--color-text-primary);"><?= $tracksCount ?></div>
            <div style="margin-top: 12px;"><?= Html::a('К альбомам →', ['admin/albums'], ['class' => 'btn btn-sm btn-outline']) ?></div>
        </div>
        <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); padding: 22px;">
            <div style="font-size: 13px; color: var(--color-text-tertiary); margin-bottom: 6px;">Рецензий</div>
            <div style="font-size: 32px; font-weight: 800; color: var(--color-text-primary);"><?= $reviewsCount ?></div>
            <div style="margin-top: 12px;"><?= Html::a('Модерация →', ['admin/reviews'], ['class' => 'btn btn-sm btn-outline']) ?></div>
        </div>
        <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); padding: 22px;">
            <div style="font-size: 13px; color: var(--color-text-tertiary); margin-bottom: 6px;">Пользователей</div>
            <div style="font-size: 32px; font-weight: 800; color: var(--color-text-primary);"><?= $usersCount ?></div>
            <div style="margin-top: 12px;"><?= Html::a('Аккаунты →', ['admin/users'], ['class' => 'btn btn-sm btn-outline']) ?></div>
        </div>
    </div>

    <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); padding: 24px;">
        <div class="section-header-row" style="margin-bottom: 16px;">
            <h2 style="font-size: 18px; font-weight: 700;">Последние рецензии</h2>
            <?= Html::a('+ Добавить альбом', ['admin/album-create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px;">
            <?php foreach ($recentReviews as $review): ?>
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px; padding: 14px; background: rgba(255,255,255,0.02); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-md);">
                    <div>
                        <div style="font-weight: 700; font-size: 14px;">
                            <?= Html::encode($review->title) ?>
                            <span class="badge <?= $review->status === 'published' ? 'badge-primary' : 'badge-secondary' ?>" style="margin-left: 8px;">
                                <?= $review->status === 'published' ? 'Опубликована' : 'Скрыта' ?>
                            </span>
                        </div>
                        <div style="font-size: 12px; color: var(--color-text-tertiary); margin-top: 4px;">
                            <?= Html::encode($review->author_name) ?> • ★ <?= $review->rating ?>/10 • Альбом: <?= Html::encode($review->album->title ?? '—') ?>
                        </div>
                    </div>
                    <?= Html::a('Открыть', ['admin/reviews'], ['class' => 'btn btn-sm btn-ghost']) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
