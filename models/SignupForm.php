<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Форма регистрации нового пользователя.
 */
class SignupForm extends Model
{
    public string $username = '';
    public string $email = '';
    public string $display_name = '';
    public string $password = '';
    public string $password_repeat = '';

    public function rules(): array
    {
        return [
            [['username', 'email', 'display_name', 'password', 'password_repeat'], 'required', 'message' => 'Заполните обязательное поле.'],
            [['username', 'email', 'display_name'], 'trim'],
            ['username', 'string', 'min' => 3, 'max' => 64],
            ['username', 'match', 'pattern' => '/^[a-zA-Z0-9_.-]+$/', 'message' => 'Допустимы только латинские буквы, цифры и символы _ . -'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Этот логин уже занят.'],
            ['email', 'email', 'message' => 'Введите корректный email.'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Этот email уже зарегистрирован.'],
            ['display_name', 'string', 'min' => 2, 'max' => 128],
            ['password', 'string', 'min' => 6, 'message' => 'Пароль должен быть не короче 6 символов.'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают.'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'username' => 'Логин',
            'email' => 'Email',
            'display_name' => 'Отображаемое имя',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }

    public function signup(): User|null
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->display_name = $this->display_name;
        $user->role = User::ROLE_USER;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ($user->save()) {
            Yii::$app->user->login($user, 3600 * 24 * 30);
            return $user;
        }

        return null;
    }
}
