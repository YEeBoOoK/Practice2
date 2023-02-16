<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Problem[] $problems
 */
class RegForm extends User
{

    public $password_confirm;
    public $agree;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password', 'password_confirm', 'agree'], 'required'],
            ['fio', 'match', 'pattern' => '/^[А-Яа-я\s\-]{8,}$/u', 'message' => 'Допускаются только кирилица, пробелы и дефис'],
            ['login', 'match', 'pattern' => '/^[A-Za-z]{2,}$/u', 'message' => 'Допускаются только латинские буквы'],
            ['login', 'unique', 'message' => 'Такой логин уже используется'],
            ['email', 'email', 'message' => 'Некорректный email'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => ''],
            [['admin'], 'integer'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'fio' => 'ФИО',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'admin' => 'Admin',
            'password_confirm' => 'Подтверждение пароля',
            'agree' => 'Согласие на обработку данных',
        ];
    }
}