<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $album_id
 * @property int $number
 * @property string $title
 * @property string $duration
 * @property string $plays
 * @property int $is_hit
 *
 * @property-read Album $album
 */
class Track extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%track}}';
    }

    public function rules(): array
    {
        return [
            [['album_id', 'number', 'title'], 'required', 'message' => 'Заполните обязательное поле.'],
            [['album_id', 'number'], 'integer', 'min' => 1],
            ['title', 'string', 'max' => 255],
            [['duration', 'plays'], 'string', 'max' => 32],
            ['is_hit', 'boolean'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'album_id' => 'Альбом',
            'number' => '№ трека',
            'title' => 'Название трека',
            'duration' => 'Длительность',
            'plays' => 'Прослушивания',
            'is_hit' => 'Хит',
        ];
    }

    public function getAlbum(): ActiveQuery
    {
        return $this->hasOne(Album::class, ['id' => 'album_id']);
    }
}
