<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$action = Yii::$app->controller->action->id;
?>
<div class="section-header-row" style="margin-bottom: 24px;">
    <div>
        <span class="badge badge-gold" style="margin-bottom: 8px;">Панель администратора</span>
        <h1 class="section-title">Управление MusikZone</h1>
    </div>
    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
        <?= Html::a('Обзор', ['admin/index'], ['class' => 'btn btn-sm ' . ($action === 'index' ? 'btn-primary' : 'btn-outline')]) ?>
        <?= Html::a('Альбомы', ['admin/albums'], ['class' => 'btn btn-sm ' . (in_array($action, ['albums', 'album-create', 'album-update', 'tracks'], true) ? 'btn-primary' : 'btn-outline')]) ?>
        <?= Html::a('Рецензии', ['admin/reviews'], ['class' => 'btn btn-sm ' . ($action === 'reviews' ? 'btn-primary' : 'btn-outline')]) ?>
        <?= Html::a('Пользователи', ['admin/users'], ['class' => 'btn btn-sm ' . ($action === 'users' ? 'btn-primary' : 'btn-outline')]) ?>
    </div>
</div>
