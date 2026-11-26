<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\Album;
use app\models\Genre;
use app\models\Review;
use app\models\Track;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Панель администратора MusikZone.
 */
class AdminController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => static function (): bool {
                            return !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin();
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'album-delete' => ['post'],
                    'track-delete' => ['post'],
                    'review-toggle' => ['post'],
                    'review-delete' => ['post'],
                    'user-role' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index', [
            'albumsCount' => (int)Album::find()->count(),
            'tracksCount' => (int)Track::find()->count(),
            'reviewsCount' => (int)Review::find()->count(),
            'usersCount' => (int)User::find()->count(),
            'recentReviews' => Review::find()->with('album')->orderBy(['id' => SORT_DESC])->limit(5)->all(),
        ]);
    }

    public function actionAlbums(): string
    {
        $albums = Album::find()->with(['genre', 'tracks', 'allReviews'])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('albums', [
            'albums' => $albums,
        ]);
    }

    public function actionAlbumCreate(): Response|string
    {
        $model = new Album();
        $model->year = (int)date('Y');
        $model->rating = 9.0;
        $model->critics_score = 90;
        $model->user_score = 9.0;
        $model->ratings_count = 1;

        if ($model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('toast', 'Альбом «' . $model->title . '» создан.');
            return $this->redirect(['admin/albums']);
        }

        return $this->render('album-form', [
            'model' => $model,
            'genres' => Genre::find()->orderBy(['sort_order' => SORT_ASC])->all(),
        ]);
    }

    public function actionAlbumUpdate(int $id): Response|string
    {
        $model = Album::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException('Альбом не найден.');
        }

        if ($model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('toast', 'Альбом «' . $model->title . '» обновлён.');
            return $this->redirect(['admin/albums']);
        }

        return $this->render('album-form', [
            'model' => $model,
            'genres' => Genre::find()->orderBy(['sort_order' => SORT_ASC])->all(),
        ]);
    }

    public function actionAlbumDelete(int $id): Response
    {
        $model = Album::findOne($id);
        if ($model !== null) {
            $title = $model->title;
            $model->delete();
            Yii::$app->session->setFlash('toast', 'Альбом «' . $title . '» удалён.');
        }

        return $this->redirect(['admin/albums']);
    }

    public function actionTracks(int $album_id): Response|string
    {
        $album = Album::findOne($album_id);
        if ($album === null) {
            throw new NotFoundHttpException('Альбом не найден.');
        }

        $track = new Track();
        $track->album_id = $album->id;
        $track->number = (int)Track::find()->where(['album_id' => $album->id])->count() + 1;
        $track->duration = '3:45';
        $track->plays = '10M';

        if ($track->load($this->request->post()) && $track->save()) {
            $album->track_count = (int)Track::find()->where(['album_id' => $album->id])->count();
            $album->save(false, ['track_count']);
            Yii::$app->session->setFlash('toast', 'Трек «' . $track->title . '» добавлен.');
            return $this->redirect(['admin/tracks', 'album_id' => $album->id]);
        }

        return $this->render('tracks', [
            'album' => $album,
            'tracks' => $album->tracks,
            'newTrack' => $track,
        ]);
    }

    public function actionTrackDelete(int $id): Response
    {
        $track = Track::findOne($id);
        if ($track === null) {
            throw new NotFoundHttpException('Трек не найден.');
        }
        $albumId = $track->album_id;
        $track->delete();
        Yii::$app->session->setFlash('toast', 'Трек удалён.');

        return $this->redirect(['admin/tracks', 'album_id' => $albumId]);
    }

    public function actionReviews(): string
    {
        $reviews = Review::find()->with(['album', 'user'])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('reviews', [
            'reviews' => $reviews,
        ]);
    }

    public function actionReviewToggle(int $id): Response
    {
        $review = Review::findOne($id);
        if ($review !== null) {
            $review->status = $review->status === Review::STATUS_PUBLISHED
                ? Review::STATUS_HIDDEN
                : Review::STATUS_PUBLISHED;
            $review->save(false, ['status']);
            Yii::$app->session->setFlash('toast', 'Статус рецензии обновлён.');
        }

        return $this->redirect(['admin/reviews']);
    }

    public function actionReviewDelete(int $id): Response
    {
        $review = Review::findOne($id);
        if ($review !== null) {
            $review->delete();
            Yii::$app->session->setFlash('toast', 'Рецензия удалена.');
        }

        return $this->redirect(['admin/reviews']);
    }

    public function actionUsers(): string
    {
        $users = User::find()->orderBy(['id' => SORT_ASC])->all();
        return $this->render('users', [
            'users' => $users,
        ]);
    }

    public function actionUserRole(int $id): Response
    {
        $user = User::findOne($id);
        if ($user !== null && (int)$user->id !== (int)Yii::$app->user->id) {
            $user->role = $user->isAdmin() ? User::ROLE_USER : User::ROLE_ADMIN;
            $user->save(false, ['role']);
            Yii::$app->session->setFlash('toast', 'Роль пользователя ' . $user->username . ' изменена на ' . $user->role . '.');
        }

        return $this->redirect(['admin/users']);
    }
}
