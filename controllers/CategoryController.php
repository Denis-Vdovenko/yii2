<?php
namespace app\controllers;
use app\models\Category;
use yii\web\Controller;
use app\models\Post;
use yii\data\Pagination;
class CategoryController extends Controller
{
    public function actionView($alias){
        $id_category = Category::find()->where(['alias' => $alias])->one()->id;
        $query = Post::find()->with('category')->where(['category_id' => $id_category]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('posts', 'pages'));
    }
}

