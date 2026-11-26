<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$currentAction = Yii::$app->controller->action->id ?? 'index';
?>
<nav class="mobile-bottom-nav" aria-label="Мобильная навигация">
    <?= Html::a(
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>'
        . '<span>Главная</span>',
        ['site/index'],
        ['class' => 'mobile-nav-item' . ($currentAction === 'index' ? ' active' : '')]
    ) ?>
    <?= Html::a(
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>'
        . '<span>Каталог</span>',
        ['site/catalog'],
        ['class' => 'mobile-nav-item' . ($currentAction === 'catalog' || $currentAction === 'album' ? ' active' : '')]
    ) ?>
    <?= Html::a(
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>'
        . '<span>Топ года</span>',
        ['site/best-of-year'],
        ['class' => 'mobile-nav-item' . ($currentAction === 'best-of-year' ? ' active' : '')]
    ) ?>
    <?= Html::a(
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>'
        . '<span>Отзыв</span>',
        ['site/review'],
        ['class' => 'mobile-nav-item' . ($currentAction === 'review' ? ' active' : '')]
    ) ?>
</nav>
