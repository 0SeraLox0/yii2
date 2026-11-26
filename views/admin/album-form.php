<?php

/* @var $this yii\web\View */
/* @var $model app\models\Album */
/* @var $genres app\models\Genre[] */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$isNew = $model->isNewRecord;
$this->title = ($isNew ? 'Добавить альбом' : 'Редактировать: ' . $model->title) . ' — Админка MUSIKZONE';
$genreList = ArrayHelper::map($genres, 'id', 'name');
?>
<section class="screen-view active">
    <?= $this->render('_nav') ?>

    <div class="form-screen-container" style="max-width: 780px;">
        <h2 style="font-size: 22px; font-weight: 800; margin-bottom: 20px;">
            <?= $isNew ? 'Новый альбом в каталог' : 'Редактирование: ' . Html::encode($model->title) ?>
        </h2>

        <?= Html::beginForm('', 'post') ?>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'title', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'title', ['class' => 'form-control']) ?>
                    <?= Html::error($model, 'title', ['style' => 'color: var(--color-danger); font-size: 12px;']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'artist', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'artist', ['class' => 'form-control']) ?>
                    <?= Html::error($model, 'artist', ['style' => 'color: var(--color-danger); font-size: 12px;']) ?>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'slug', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'slug', ['class' => 'form-control', 'placeholder' => 'my-album-2026']) ?>
                    <?= Html::error($model, 'slug', ['style' => 'color: var(--color-danger); font-size: 12px;']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'genre_id', ['class' => 'form-label']) ?>
                    <?= Html::activeDropDownList($model, 'genre_id', $genreList, ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'year', ['class' => 'form-label']) ?>
                    <?= Html::activeInput('number', $model, 'year', ['class' => 'form-control']) ?>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'label', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'label', ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'duration', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'duration', ['class' => 'form-control', 'placeholder' => '45:10']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'rating', ['class' => 'form-label']) ?>
                    <?= Html::activeInput('number', $model, 'rating', ['class' => 'form-control', 'step' => '0.1', 'min' => '0', 'max' => '10']) ?>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'cover_image', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'cover_image', ['class' => 'form-control', 'placeholder' => 'https://...']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'subgenresInput', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'subgenresInput', ['class' => 'form-control', 'placeholder' => 'Synthpop, Disco, Electronic']) ?>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'best_year_key', ['class' => 'form-label']) ?>
                    <?= Html::activeDropDownList($model, 'best_year_key', [
                        '' => 'Не в подборке',
                        '2026' => '2026',
                        '2024' => '2024',
                        'all-time' => 'All-Time Classics',
                    ], ['class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'best_year_rank', ['class' => 'form-label']) ?>
                    <?= Html::activeInput('number', $model, 'best_year_rank', ['class' => 'form-control', 'min' => '1', 'max' => '10']) ?>
                </div>
                <div class="form-group">
                    <?= Html::activeLabel($model, 'best_year_badge', ['class' => 'form-label']) ?>
                    <?= Html::activeTextInput($model, 'best_year_badge', ['class' => 'form-control', 'placeholder' => 'Выбор критиков']) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::activeLabel($model, 'description', ['class' => 'form-label']) ?>
                <?= Html::activeTextarea($model, 'description', ['class' => 'form-control', 'rows' => 4]) ?>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                <?= Html::a('Отмена', ['admin/albums'], ['class' => 'btn btn-secondary']) ?>
                <button type="submit" class="btn btn-primary btn-lg">
                    <?= $isNew ? 'Создать альбом' : 'Сохранить изменения' ?>
                </button>
            </div>
        <?= Html::endForm() ?>
    </div>
</section>
