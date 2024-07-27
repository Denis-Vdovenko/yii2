<?php 

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord{
    public static function tableName() {
        return 'category';
    }
    public function getPost(){
        return $this->hasOne(Post::class, ['category_id' => 'id']);
    }

}

?>