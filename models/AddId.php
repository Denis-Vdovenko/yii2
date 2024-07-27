<?php

namespace app\models;

use Yii;
use yii\base\Model;


class AddId extends Model
{   public $id;


    public function rules()
    {
        return [
            [['id'], 'required'],
        ];
    }
}