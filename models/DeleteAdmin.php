<?php

namespace app\models;

use Yii;
use yii\base\Model;


class DeleteAdmin extends Model
{
    public $email;

    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'email'], 
        ];
    }
}