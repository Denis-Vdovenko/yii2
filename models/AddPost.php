<?php

namespace app\models;

use Yii;
use yii\base\Model;


class AddPost extends Model
{
    public $img;
    public $title;
    public $category;
    public $excerpt;

    public function rules()
    {
        return [
            [['img', 'title', 'category', 'excerpt'], 'required'],
        ];
    }
}