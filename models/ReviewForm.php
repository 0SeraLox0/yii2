<?php

declare(strict_types=1);

namespace app\models;

use yii\base\Model;

/**
 * ReviewForm represents the album review submission form.
 */
class ReviewForm extends Model
{
    public string $albumId = 'ram-daftpunk';
    public int $rating = 10;
    public string $authorName = 'Артем Соколов';
    public string $authorRole = 'Слушатель (MusikZone)';
    public string $headline = '';
    public string $prosJson = '["Идеальный аналоговый мастеринг","Звездный состав"]';
    public string $consJson = '["Требует внимательного прослушивания"]';
    public string $content = 'Эта пластинка полностью переворачивает представление о жанре. Исключительный уровень продюсирования, живые инструменты и глубина сведения заставляют переслушивать треки снова и снова.';
    public bool $recommend = true;

    public function rules(): array
    {
        return [
            [['albumId', 'headline', 'content'], 'required', 'message' => 'Заполните обязательное поле.'],
            [['albumId', 'authorName', 'authorRole', 'headline', 'prosJson', 'consJson', 'content'], 'string'],
            ['rating', 'integer', 'min' => 1, 'max' => 10],
            ['recommend', 'boolean'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'albumId' => 'Выберите альбом для оценки',
            'rating' => 'Ваша оценка альбома (от 1 до 10)',
            'authorName' => 'Ваше имя или псевдоним',
            'authorRole' => 'Ваш статус',
            'headline' => 'Заголовок рецензии',
            'content' => 'Текст рецензии',
            'recommend' => 'Я рекомендую этот альбом к обязательному прослушиванию',
        ];
    }
}
