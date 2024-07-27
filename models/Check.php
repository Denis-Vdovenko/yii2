<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Check extends Model
{
    public $password;
    public $email;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'], 
        ];
    }
}