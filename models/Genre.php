<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string $icon
 * @property string $color
 * @property int $sort_order
 *
 * @property-read Album[] $albums
 */
class Genre extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%genre}}';
    }

    public function rules(): array
    {
        return [
            [['slug', 'name'], 'required'],
            [['slug', 'icon'], 'string', 'max' => 64],
            ['name', 'string', 'max' => 128],
            ['color', 'string', 'max' => 32],
            ['sort_order', 'integer'],
            ['slug', 'unique'],
        ];
    }

    public function getAlbums(): ActiveQuery
    {
        return $this->hasMany(Album::class, ['genre_id' => 'id']);
    }
}
