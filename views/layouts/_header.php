<?php

/* @var $this yii\web\View */

use app\models\Album;
use yii\helpers\Html;

$currentController = Yii::$app->controller->id ?? 'site';
$currentAction = Yii::$app->controller->action->id ?? 'index';
$albumsCount = (int)Album::find()->count();
$isGuest = Yii::$app->user->isGuest;
$identity = $isGuest ? null : Yii::$app->user->identity;
?>
<header class="site-header">
    <div class="header-inner">
        <!-- Логотип MusikZone -->
        <?= Html::a(
            '<span class="logo-vinyl-icon" aria-hidden="true"><span class="logo-vinyl-center"></span></span>'
            . '<span>MUSIC<span class="brand-text-accent">ZONE</span></span>',
            ['site/index'],
            ['class' => 'brand-logo']
        ) ?>

        <!-- Десктопная семантическая навигация -->
        <nav class="main-nav" aria-label="Основная навигация">
            <?= Html::a(
                '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>'
                . '<span>Главная</span>',
                ['site/index'],
                ['class' => 'nav-link' . ($currentController === 'site' && $currentAction === 'index' ? ' active' : '')]
            ) ?>
            <?= Html::a(
                '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>'
                . '<span>Каталог</span>'
                . '<span class="badge-counter">' . $albumsCount . '</span>',
                ['site/catalog'],
                ['class' => 'nav-link' . ($currentController === 'site' && ($currentAction === 'catalog' || $currentAction === 'album') ? ' active' : '')]
            ) ?>
            <?= Html::a(
                '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>'
                . '<span>Лучшее за год</span>',
                ['site/best-of-year'],
                ['class' => 'nav-link' . ($currentController === 'site' && $currentAction === 'best-of-year' ? ' active' : '')]
            ) ?>
            <?php if (!$isGuest && $identity->isAdmin()): ?>
                <?= Html::a(
                    '<span>Админка</span>',
                    ['admin/index'],
                    ['class' => 'nav-link' . ($currentController === 'admin' ? ' active' : '')]
                ) ?>
            <?php endif; ?>
        </nav>

        <!-- Действия в шапке -->
        <div class="header-actions">
            <?= Html::a(
                '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>'
                . '<span>Поиск альбома...</span>',
                ['site/catalog'],
                ['class' => 'search-quick-btn']
            ) ?>

            <?= Html::a('Написать рецензию', ['site/review'], ['class' => 'btn btn-primary']) ?>

            <?php if ($isGuest): ?>
                <?= Html::a('Войти', ['site/login'], ['class' => 'btn btn-outline btn-sm']) ?>
            <?php else: ?>
                <?= Html::beginForm(['site/logout'], 'post', ['style' => 'display: inline-flex; align-items: center; gap: 8px;']) ?>
                    <span style="font-size: 13px; color: var(--color-text-secondary); white-space: nowrap;">
                        <?= Html::encode($identity->username) ?>
                    </span>
                    <button type="submit" class="btn btn-outline btn-sm">Выйти</button>
                <?= Html::endForm() ?>
            <?php endif; ?>

            <?= Html::a('☰', ['site/catalog'], [
                'class' => 'mobile-menu-btn',
                'aria-label' => 'Открыть каталог на мобильном',
            ]) ?>
        </div>
    </div>
</header>
