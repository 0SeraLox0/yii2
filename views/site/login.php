<?php

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;

$this->title = 'Вход в аккаунт — MUSIKZONE';
?>
<section class="screen-view active" aria-labelledby="loginHeading">
    <div class="form-screen-container" style="max-width: 520px;">
        <header class="form-header-box">
            <span class="badge badge-primary" style="margin-bottom: 12px;">Аккаунт</span>
            <h1 id="loginHeading">Вход в MusikZone</h1>
            <p>Авторизуйтесь, чтобы оставлять рецензии от своего имени или управлять каталогом</p>
        </header>

        <?= Html::beginForm(['site/login'], 'post') ?>
            <div class="form-group">
                <?= Html::activeLabel($model, 'username', ['class' => 'form-label']) ?>
                <?= Html::activeTextInput($model, 'username', [
                    'class' => 'form-control',
                    'placeholder' => 'admin или demo',
                    'autofocus' => true,
                ]) ?>
                <?= Html::error($model, 'username', ['style' => 'color: var(--color-danger); font-size: 12px; margin-top: 6px;']) ?>
            </div>

            <div class="form-group">
                <?= Html::activeLabel($model, 'password', ['class' => 'form-label']) ?>
                <?= Html::activePasswordInput($model, 'password', [
                    'class' => 'form-control',
                    'placeholder' => 'Введите пароль',
                ]) ?>
                <?= Html::error($model, 'password', ['style' => 'color: var(--color-danger); font-size: 12px; margin-top: 6px;']) ?>
            </div>

            <div class="form-group">
                <label class="custom-checkbox">
                    <?= Html::activeCheckbox($model, 'rememberMe', ['label' => false]) ?>
                    <span class="checkbox-mark"></span>
                    <span>Запомнить меня</span>
                </label>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-top: 24px;">
                <?= Html::a('Создать аккаунт', ['site/signup'], ['class' => 'btn btn-ghost']) ?>
                <button type="submit" class="btn btn-primary btn-lg">Войти</button>
            </div>
        <?= Html::endForm() ?>

        <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--color-border-subtle); font-size: 12px; color: var(--color-text-tertiary); line-height: 1.6;">
            <div><strong>Тестовый администратор:</strong> логин <code>admin</code>, пароль <code>admin123</code></div>
            <div><strong>Тестовый слушатель:</strong> логин <code>demo</code>, пароль <code>demo123</code></div>
        </div>
    </div>
</section>
