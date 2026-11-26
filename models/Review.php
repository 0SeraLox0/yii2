<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $album_id
 * @property int|null $user_id
 * @property string $author_name
 * @property string $author_avatar
 * @property string $author_role
 * @property int $rating
 * @property string $date_label
 * @property string $title
 * @property string $text
 * @property string $pros_json
 * @property string $cons_json
 * @property int $likes
 * @property string $status
 * @property int $created_at
 *
 * @property-read Album $album
 * @property-read User|null $user
 */
class Review extends ActiveRecord
{
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_HIDDEN = 'hidden';

    public static function tableName(): string
    {
        return '{{%review}}';
    }

    public function rules(): array
    {
        return [
            [['album_id', 'author_name', 'rating', 'title', 'text'], 'required'],
            [['album_id', 'user_id', 'rating', 'likes', 'created_at'], 'integer'],
            ['rating', 'integer', 'min' => 1, 'max' => 10],
            [['author_name', 'author_role'], 'string', 'max' => 128],
            ['author_avatar', 'string', 'max' => 512],
            ['date_label', 'string', 'max' => 64],
            ['title', 'string', 'max' => 255],
            [['text', 'pros_json', 'cons_json'], 'string'],
            ['status', 'in', 'range' => [self::STATUS_PUBLISHED, self::STATUS_HIDDEN]],
        ];
    }

    public function getAlbum(): ActiveQuery
    {
        return $this->hasOne(Album::class, ['id' => 'album_id']);
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getProsArray(): array
    {
        $decoded = json_decode((string)$this->pros_json, true);
        return is_array($decoded) ? $decoded : [];
    }

    public function getConsArray(): array
    {
        $decoded = json_decode((string)$this->cons_json, true);
        return is_array($decoded) ? $decoded : [];
    }
}
