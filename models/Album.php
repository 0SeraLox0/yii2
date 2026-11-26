<?php

declare(strict_types=1);

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $artist
 * @property int $year
 * @property string $release_date
 * @property int $genre_id
 * @property string $subgenres_json
 * @property string $label
 * @property string $duration
 * @property int $track_count
 * @property float $rating
 * @property int $critics_score
 * @property float $user_score
 * @property int $ratings_count
 * @property string $cover_image
 * @property string $badge
 * @property string|null $best_year_key
 * @property int|null $best_year_rank
 * @property string|null $best_year_badge
 * @property string|null $best_year_reason
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property-read Genre $genre
 * @property-read Track[] $tracks
 * @property-read Review[] $reviews
 */
class Album extends ActiveRecord
{
    public string $subgenresInput = '';

    public static function tableName(): string
    {
        return '{{%album}}';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules(): array
    {
        return [
            [['slug', 'title', 'artist', 'year', 'genre_id'], 'required', 'message' => 'Заполните обязательное поле.'],
            [['year', 'genre_id', 'track_count', 'critics_score', 'ratings_count', 'best_year_rank'], 'integer'],
            [['rating', 'user_score'], 'number', 'min' => 0, 'max' => 10],
            [['slug', 'label', 'badge', 'best_year_badge'], 'string', 'max' => 128],
            [['title', 'artist'], 'string', 'max' => 255],
            [['release_date', 'duration', 'best_year_key'], 'string', 'max' => 64],
            ['cover_image', 'string', 'max' => 512],
            [['subgenres_json', 'best_year_reason', 'description', 'subgenresInput'], 'string'],
            ['slug', 'unique'],
            ['best_year_key', 'default', 'value' => null],
            ['best_year_rank', 'default', 'value' => null],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'slug' => 'Slug (URL-идентификатор)',
            'title' => 'Название альбома',
            'artist' => 'Исполнитель',
            'year' => 'Год релиза',
            'release_date' => 'Дата релиза',
            'genre_id' => 'Жанр',
            'subgenresInput' => 'Поджанры (через запятую)',
            'label' => 'Лейбл',
            'duration' => 'Длительность',
            'track_count' => 'Кол-во треков',
            'rating' => 'Общий рейтинг (0–10)',
            'critics_score' => 'Оценка критиков (0–100)',
            'user_score' => 'Оценка слушателей (0–10)',
            'ratings_count' => 'Количество оценок',
            'cover_image' => 'URL обложки',
            'badge' => 'Бейдж',
            'best_year_key' => 'Подборка «Лучшее за год»',
            'best_year_rank' => 'Место в топе (1–4)',
            'best_year_badge' => 'Номинация / бейдж топа',
            'best_year_reason' => 'Причина попадания в топ',
            'description' => 'Описание альбома',
        ];
    }

    public function getGenre(): ActiveQuery
    {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
    }

    public function getTracks(): ActiveQuery
    {
        return $this->hasMany(Track::class, ['album_id' => 'id'])->orderBy(['number' => SORT_ASC]);
    }

    public function getReviews(): ActiveQuery
    {
        return $this->hasMany(Review::class, ['album_id' => 'id'])
            ->andWhere(['status' => Review::STATUS_PUBLISHED])
            ->orderBy(['id' => SORT_DESC]);
    }

    public function getAllReviews(): ActiveQuery
    {
        return $this->hasMany(Review::class, ['album_id' => 'id'])->orderBy(['id' => SORT_DESC]);
    }

    public function getSubgenresArray(): array
    {
        $decoded = json_decode((string)$this->subgenres_json, true);
        return is_array($decoded) ? $decoded : [];
    }

    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if ($this->subgenresInput !== '') {
            $parts = array_values(array_filter(array_map('trim', explode(',', $this->subgenresInput))));
            $this->subgenres_json = json_encode($parts, JSON_UNESCAPED_UNICODE);
        } elseif ($this->subgenres_json === '') {
            $this->subgenres_json = '[]';
        }
        return true;
    }

    public function afterFind(): void
    {
        parent::afterFind();
        $this->subgenresInput = implode(', ', $this->getSubgenresArray());
    }
}
