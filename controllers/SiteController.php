<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\Album;
use app\models\LoginForm;
use app\models\Review;
use app\models\ReviewForm;
use app\models\SignupForm;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;

class SiteController extends Controller
{
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionCatalog(string $genre = 'all'): string
    {
        return $this->render('catalog', [
            'genre' => $genre,
        ]);
    }

    public function actionAlbum(string $id = 'ram-daftpunk'): string
    {
        return $this->render('album', [
            'albumId' => $id,
        ]);
    }

    public function actionReview(string $album = 'ram-daftpunk'): Response|string
    {
        $model = new ReviewForm();
        $model->albumId = $album;

        if (!Yii::$app->user->isGuest) {
            /** @var \app\models\User $user */
            $user = Yii::$app->user->identity;
            $model->authorName = $user->display_name ?: $user->username;
            $model->authorRole = $user->isAdmin() ? 'Администратор (MusikZone)' : 'Участник (MusikZone)';
        }

        if ($this->request->isPost) {
            $post = $this->request->post();
            $model->albumId = (string)($post['albumId'] ?? $album);
            $model->rating = max(1, min(10, (int)($post['rating'] ?? 10)));
            $model->authorName = trim((string)($post['authorName'] ?? '')) ?: 'Анонимный слушатель';
            $model->authorRole = trim((string)($post['authorRole'] ?? '')) ?: 'Слушатель (MusikZone)';
            $model->headline = trim((string)($post['headline'] ?? '')) ?: 'Впечатления от альбома';
            $model->content = trim((string)($post['content'] ?? ''));
            $model->prosJson = (string)($post['prosJson'] ?? '[]');
            $model->consJson = (string)($post['consJson'] ?? '[]');
            $model->recommend = !empty($post['recommend']);

            if ($model->content !== '') {
                $albumRecord = Album::findOne(['slug' => $model->albumId]);
                if ($albumRecord !== null) {
                    $review = new Review();
                    $review->album_id = $albumRecord->id;
                    $review->user_id = Yii::$app->user->isGuest ? null : (int)Yii::$app->user->id;
                    $review->author_name = $model->authorName;
                    $review->author_avatar = !Yii::$app->user->isGuest
                        ? Yii::$app->user->identity->avatar
                        : 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80';
                    $review->author_role = $model->authorRole;
                    $review->rating = $model->rating;
                    $review->date_label = 'Только что';
                    $review->title = $model->headline;
                    $review->text = $model->content;
                    $review->pros_json = $model->prosJson;
                    $review->cons_json = $model->consJson;
                    $review->likes = 1;
                    $review->status = Review::STATUS_PUBLISHED;
                    $review->created_at = time();

                    if ($review->save()) {
                        $albumRecord->updateCounters(['ratings_count' => 1]);
                        Yii::$app->session->setFlash('toast', 'Рецензия успешно сохранена в базу данных!');
                        return $this->redirect(['site/album', 'id' => $albumRecord->slug]);
                    }
                }
            }

            $model->addError('content', 'Пожалуйста, напишите текст вашей рецензии!');
        }

        return $this->render('review', [
            'model' => $model,
            'albumId' => $album,
        ]);
    }

    public function actionBestOfYear(string $year = '2026'): string
    {
        return $this->render('best-of-year', [
            'year' => $year,
        ]);
    }

    public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load($this->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('toast', 'Добро пожаловать, ' . Yii::$app->user->identity->display_name . '!');
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();
        if ($model->load($this->request->post()) && ($user = $model->signup()) !== null) {
            Yii::$app->session->setFlash('toast', 'Аккаунт создан! Добро пожаловать, ' . $user->display_name . '!');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogout(): Response
    {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('toast', 'Вы вышли из аккаунта.');
        return $this->goHome();
    }
}
