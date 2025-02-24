<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
    public $login;
    public $password;

    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login'], 'string', 'max' => 255],
            [['login'], 'unique', 'targetClass' => User::class, 'message' => 'Этот логин уже используется.'],
            [['password'], 'string', 'min' => 6],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->login = $this->login;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if (User::find()->count() === 0) {
            $user->role = 'admin';
        } else {
            $user->role = 'user';
        }

        return $user->save() ? $user : null;
    }
}