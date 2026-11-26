<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * ActiveRecord модель пользователя.
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $display_name
 * @property string $role
 * @property string $avatar
 * @property string $password_hash
 * @property string $auth_key
 * @property int $created_at
 * @property int $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';

    public static function tableName(): string
    {
        return '{{%user}}';
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
            [['username', 'email', 'display_name'], 'required'],
            [['username', 'email', 'display_name', 'avatar'], 'string', 'max' => 255],
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],
            ['email', 'email'],
            ['username', 'unique'],
            ['email', 'unique'],
        ];
    }

    public static function findIdentity($id): static|null
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null): static|null
    {
        return null;
    }

    public static function findByUsername(string $username): static|null
    {
        return static::find()
            ->where(['username' => $username])
            ->orWhere(['email' => $username])
            ->one();
    }

    public function getId(): int|string
    {
        return $this->id;
    }

    public function getAuthKey(): string|null
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword(string $password): void
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey(): void
    {
        $this->auth_key = Yii::$app->security->generateRandomString(32);
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }
}
