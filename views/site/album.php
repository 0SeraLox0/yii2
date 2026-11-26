<?php

/* @var $this yii\web\View */
/* @var $albumId string */

use yii\helpers\Html;

$this->title = 'Детали альбома — MUSIKZONE';
?>
<section class="screen-view active" id="screen-album-detail" data-album-id="<?= Html::encode($albumId) ?>" aria-label="Детальная страница альбома">
    <div id="albumDetailContent">
        <!-- Заполняется динамически через js/app.js -->
    </div>
</section>
