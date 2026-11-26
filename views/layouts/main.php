<?php

/* @var $this yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\models\MusicDataHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

AppAsset::register($this);

$appConfig = [
    'homeUrl' => Url::to(['site/index']),
    'catalogUrl' => Url::to(['site/catalog']),
    'albumUrlTemplate' => Url::to(['site/album', 'id' => '__ID__']),
    'reviewUrlTemplate' => Url::to(['site/review', 'album' => '__ID__']),
    'bestOfYearUrl' => Url::to(['site/best-of-year']),
    'flashToast' => Yii::$app->session->getFlash('toast'),
];
$dbMusicData = MusicDataHelper::getFrontendData();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody(); ?>

    <?= $this->render('_header') ?>

    <main class="main-wrapper" id="mainContent">
        <?= $content ?>
    </main>

    <?= $this->render('_mini_player') ?>

    <?= $this->render('_mobile_nav') ?>

    <?= $this->render('_footer') ?>

    <!-- Всплывающее уведомление (Toast) -->
    <div class="toast-notification" id="toastNotification" role="alert" aria-live="polite">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <span class="toast-message">Действие успешно выполнено!</span>
    </div>

    <script>
        window.APP_CONFIG = <?= Json::htmlEncode($appConfig) ?>;
        window.DB_MUSIC_DATA = <?= Json::htmlEncode($dbMusicData) ?>;
    </script>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
