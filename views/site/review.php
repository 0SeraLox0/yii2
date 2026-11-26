<?php

/* @var $this yii\web\View */
/* @var $model app\models\ReviewForm */
/* @var $albumId string */

use yii\helpers\Html;

$this->title = 'Оставить рецензию на альбом — MUSIKZONE';
?>
<section class="screen-view active" id="screen-review-form" data-album-id="<?= Html::encode($albumId) ?>" aria-labelledby="formTitleHeading">

    <div class="form-screen-container">

        <header class="form-header-box">
            <span class="badge badge-primary" style="margin-bottom: 12px;">Модуль рецензий</span>
            <h1 id="formTitleHeading">Оставить рецензию на альбом</h1>
            <p>Поделитесь своим мнением с сообществом ценителей хорошей музыки</p>
        </header>

        <?= Html::beginForm(['site/review'], 'post', ['id' => 'albumReviewForm', 'novalidate' => true]) ?>
            <?= Html::hiddenInput('rating', $model->rating, ['id' => 'formRatingInput']) ?>
            <?= Html::hiddenInput('prosJson', $model->prosJson, ['id' => 'formProsJson']) ?>
            <?= Html::hiddenInput('consJson', $model->consJson, ['id' => 'formConsJson']) ?>

            <!-- Выбор альбома -->
            <div class="form-group">
                <label for="formAlbumSelect" class="form-label">
                    <span>Выберите альбом для оценки <span style="color: var(--color-danger);">*</span></span>
                    <span class="form-label-helper">Из каталога MusikZone</span>
                </label>
                <select id="formAlbumSelect" name="albumId" class="form-control" required>
                    <!-- Заполняется JS -->
                </select>
            </div>

            <!-- Интерактивный выбор рейтинга (1-10) -->
            <div class="rating-input-highlight-box">
                <span style="font-size: 13px; font-weight: 700; color: var(--color-text-secondary); text-transform: uppercase; letter-spacing: 0.5px;">
                    Ваша оценка альбома (от 1 до 10)
                </span>

                <div style="display: flex; align-items: center; gap: 8px;">
                    <div class="rating-selector" id="formRatingSelector">
                        <!-- 10 звёзд рендерятся через JS -->
                    </div>
                    <div class="rating-value-badge" id="formRatingBadge">10.0</div>
                </div>

                <div class="rating-verdict-label" id="formRatingVerdict">Безусловный шедевр (10/10)</div>
            </div>

            <!-- Имя и роль автора -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <label for="reviewAuthorName" class="form-label">Ваше имя или псевдоним</label>
                    <input type="text" id="reviewAuthorName" name="authorName" class="form-control" placeholder="Например, Артем Соколов" value="<?= Html::encode($model->authorName) ?>">
                </div>
                <div class="form-group">
                    <label for="reviewAuthorRole" class="form-label">Ваш статус</label>
                    <input type="text" id="reviewAuthorRole" name="authorRole" class="form-control" value="<?= Html::encode($model->authorRole) ?>" readonly style="opacity: 0.7;">
                </div>
            </div>

            <!-- Заголовок рецензии -->
            <div class="form-group">
                <label for="reviewHeadline" class="form-label">
                    <span>Заголовок рецензии <span style="color: var(--color-danger);">*</span></span>
                    <span class="form-label-helper">Главная мысль одним предложением</span>
                </label>
                <input type="text" id="reviewHeadline" name="headline" class="form-control" placeholder="Например: Невероятное погружение в аналоговую глубину звука" value="<?= Html::encode($model->headline) ?>" required>
            </div>

            <!-- Плюсы альбома (Теги) -->
            <div class="form-group">
                <label class="form-label">
                    <span style="color: #6ee7b7;">✔ Главные достоинства (Pros)</span>
                    <span class="form-label-helper">Введите текст и нажмите Enter</span>
                </label>
                <div class="tag-input-box" id="prosTagsContainer">
                    <!-- Теги из JS -->
                </div>
            </div>

            <!-- Минусы альбома (Теги) -->
            <div class="form-group">
                <label class="form-label">
                    <span style="color: #fca5a5;">✖ Недостатки (Cons, если есть)</span>
                    <span class="form-label-helper">Введите текст и нажмите Enter</span>
                </label>
                <div class="tag-input-box" id="consTagsContainer">
                    <!-- Теги из JS -->
                </div>
            </div>

            <!-- Текст рецензии -->
            <div class="form-group">
                <label for="reviewContent" class="form-label">
                    <span>Текст рецензии <span style="color: var(--color-danger);">*</span></span>
                    <span class="form-label-helper">Минимум 50 символов</span>
                </label>
                <textarea id="reviewContent" name="content" class="form-control" placeholder="Опишите ваши впечатления от звучания, продакшена, текстов и эмоционального воздействия композиций..." required><?= Html::encode($model->content) ?></textarea>
            </div>

            <!-- Чекбокс рекомендации -->
            <div class="form-group">
                <label class="custom-checkbox">
                    <input type="checkbox" id="reviewRecommendCheck" name="recommend" value="1" <?= $model->recommend ? 'checked' : '' ?>>
                    <span class="checkbox-mark"></span>
                    <span>Я рекомендую этот альбом к обязательному прослушиванию</span>
                </label>
            </div>

            <!-- Кнопки действий формы -->
            <div style="display: flex; gap: 14px; margin-top: 28px; justify-content: flex-end;">
                <?= Html::a('Отмена', ['site/catalog'], ['class' => 'btn btn-secondary']) ?>
                <button type="submit" class="btn btn-primary btn-lg">
                    🚀 Опубликовать рецензию
                </button>
            </div>

        <?= Html::endForm() ?>
    </div>

</section>
