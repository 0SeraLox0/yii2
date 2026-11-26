<?php

/* @var $this yii\web\View */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;

$this->title = 'Регистрация — MUSIKZONE';
?>
<section class="screen-view active" aria-labelledby="signupHeading">
    <div class="form-screen-container" style="max-width: 560px;">
        <header class="form-header-box">
            <span class="badge badge-primary" style="margin-bottom: 12px;">Новый участник</span>
            <h1 id="signupHeading">Регистрация в MusikZone</h1>
            <p>Создайте профиль слушателя и делитесь рецензиями с сообществом</p>
        </header>

        <?= Html::beginForm(['site/signup'], 'post') ?>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'username', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'username', ['class' => 'form-control', 'placeholder' => 'music_lover']) ?>
                    <?= Html::error($model, 'username', ['style' => 'color: var(--color-danger); font-size: 12px; margin-top: 6px;']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'email', ['class' => 'form-label']) ?>
                    <?= Html::activeInput('email', $model, 'email', ['class' => 'form-control', 'placeholder' => 'you@example.com']) ?>
                    <?= Html::error($model, 'email', ['style' => 'color: var(--color-danger); font-size: 12px; margin-top: 6px;']) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::activeLabel($model, 'display_name', ['class' => 'form-label']) ?>
                <?= Html::activeTextInput($model, 'display_name', ['class' => 'form-control', 'placeholder' => 'Например, Иван Петров']) ?>
                <?= Html::error($model, 'display_name', ['style' => 'color: var(--color-danger); font-size: 12px; margin-top: 6px;']) ?>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'password', ['class' => 'form-label']) ?>
                    <?= Html::activePasswordInput($model, 'password', ['class' => 'form-control', 'placeholder' => 'Минимум 6 символов']) ?>
                    <?= Html::error($model, 'password', ['style' => 'color: var(--color-danger); font-size: 12px; margin-top: 6px;']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'password_repeat', ['class' => 'form-label']) ?>
                    <?= Html::activePasswordInput($model, 'password_repeat', ['class' => 'form-control', 'placeholder' => 'Повторите пароль']) ?>
                    <?= Html::error($model, 'password_repeat', ['style' => 'color: var(--color-danger); font-size: 12px; margin-top: 6px;']) ?>
                </div>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-top: 24px;">
                <?= Html::a('Уже есть аккаунт? Войти', ['site/login'], ['class' => 'btn btn-ghost']) ?>
                <button type="submit" class="btn btn-primary btn-lg">Зарегистрироваться</button>
            </div>
        <?= Html::endForm() ?>
    </div>
</section>
