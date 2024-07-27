<?php
namespace app\controllers;
use Yii;
use app\models\Admin;
use yii\web\Controller;
use app\models\Check;
use yii\helpers\Url;
use app\models\DeleteAdmin;
use app\models\DeletePost;
use app\models\Post;
use app\models\AddPost;
use app\models\EditPost;
use app\models\AddId;
class AdminController extends Controller
{ 
    public function actionIndex(){ 
        $this->layout = '@app/views/layouts/admin.php';
        if (\Yii::$app->request->cookies->getValue('email')){
            return $this->render('admin_yes');
        }
        $form = new Check();
        $error = '';
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $email = $form->email;
            $password = $form->password;
            
            $hash = Admin::find()->where(['email' => $email])->select('password')->scalar();

            if(password_verify($password, $hash)) {
                $error ='';
                \Yii::$app->response->cookies->add(new \yii\web\Cookie([
                    'name' => 'email',
                    'value' => $email,
                    'expire' => time() + 86400
                ]));
           
           return $this->render('admin_yes');
            } else {
                $error = 'Введенны неправельные данные';
            }
        } else {
            $email = '';
            $password = '';
        }
        
        return $this->render('admin', compact('form', 'email', 'password', 'error'));
    
}

    public function actionSuccess() {
        $this->layout = '@app/views/layouts/admin.php';
        return $this->render('admin_yes');
    }
    public function actionAdd() {
        $this->layout = '@app/views/layouts/admin.php';
        $form = new Check();
        $error='';
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $email = $form->email;
            $password = $form->password;
            $new = new Admin();
            $new->password = password_hash($password, PASSWORD_BCRYPT);
            if ($new->email = $email) {
             $error = '';
            } else {
                $error = 'Администратор уже зарегистрирован';
            }
            $new->save();
            $added = TRUE;
        } else {
            $email = '';
            $added = FALSE;
        }
        return $this->render('add_admin', compact('form', 'added', 'email', 'error'));
    }

    public function actionDel(){
        $this->layout = '@app/views/layouts/admin.php';
        $form = new DeleteAdmin();
        $deleted = FALSE;
        $email ='';
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $email = $form->email;
            $customer = Admin::find()->where(['email' => $email])->one();
            if($customer->delete()){
                $deleted = TRUE;
            }}
        return $this->render('del_admin', compact('form', 'deleted', 'email'));
    }

    public function actionExit(){
        Yii::$app->response->cookies->remove('email');
        Yii::$app->response->redirect('.');
    }

    public function actionDel_post(){
        $this->layout = '@app/views/layouts/admin.php';
        $form = new DeletePost();
        $deleted = FALSE;
        $id = '';
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $id = $form->id;
            $customer = Post::find()->where(['id' => $id])->one();
            if($customer->delete()){
                $deleted = TRUE;
            }}
        return $this->render('del_post', compact('form', 'deleted', 'id'));
    }
    public function actionAdd_post(){
        $this->layout = '@app/views/layouts/admin.php';
        $form = new AddPost();
        $added = FALSE;
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $img = $form->img+2;
            $img = 'img/post-image'.$img.'.jpg';
            $title = $form->title;
            $excerpt = $form->excerpt;
            $category = $form->category;
            $new = new Post();
            $new->img = $img;
            $new->title = $title;
            $new->excerpt = $excerpt;
            $new->category_id = $category;
            $new->created_at = date("Y-m-d H:i:s");
            if($new->save()){
                $added = TRUE;
            }
        }
        return $this->render('add_post', compact('form', 'added'));
    }
    // public function actionEdit_post(){
    //     $this->layout = '@app/views/layouts/admin.php';
    //     $form = new AddId();
    //     $added = FALSE;
    //     $added_id = FALSE;
    //         $img_db = '';    
    //         $title_db = '';    
    //         $excerpt_db = '';     
    //         $category_db = '';     
    //         $id = $form->id;
    //         $customer = Post::find()->where(['id' => $id])->one();
    //         if($customer){
    //         $added_id = TRUE;
    //         $img_db = $customer->img;     
    //         $title_db = $customer->title;  
    //         $excerpt_db = $customer->excerpt;  
    //         $category_db = $customer->category->title;         
    //         }
    //         $form1 = new Post();


    //     // $values = [
    //     //     'img' => $img,
    //     //     'title' => $title,
    //     //     'excerpt' => $excerpt,
    //     //     'category_id' => $category,
    //     // ];
    //     // $customer->attributes = $values;
    //     // $customer->save();
    //     return $this->render('edit_post', compact('form','form1', 'id', 'added', 'added_id', 'img_db', 'title_db', 'excerpt_db', 'category_db'));
    // } 
    public function actionEdit_post() {
        $this->layout = '@app/views/layouts/admin.php';
        $form = new Addid();    
        $title_bd = '';
        $added = FALSE;
        $img_bd = '';
        $excerpt_bd = '';
        $category_bd ='';
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $id = (int)$form->id;
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'id',
                'value' => $id,
            ]));
        }
            $id_k = Yii::$app->request->cookies->getValue('id');
            $bd_Post = Post::find()->where(['id' => $id_k])->one();
            $title_bd = $bd_Post->title;
            $excerpt_bd = $bd_Post->excerpt;
            $img_bd = $bd_Post->img;
            $category_bd = $bd_Post->category_id;
        
        $form1 = new AddPost();
        if($form1->load(Yii::$app->request->post()) && $form1->validate()) {
            $img = $form1->img+2;
            $bd_Post->img = 'img/post-image'.$img.'.jpg';
            $bd_Post->title = $form1->title;
            $bd_Post->excerpt = $form1->excerpt;
            $bd_Post->category_id = $form1->category;
            $bd_Post->save();
            $added = TRUE;
        }
        return $this->render('edit_post', compact('form',  'form1', 'title_bd', 'added', 'img_bd', 'excerpt_bd', 'category_bd'));
    
}
}
    



// public function actionAdd($password_new, $email_new) {
//     $this->layout = '@app/views/layouts/admin.php';
//     $new = new Admin();
//     $new->password = password_hash($password_new, PASSWORD_BCRYPT);
//     $new->email = $email_new;
//     $new->save();
// }
// }

// if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//     // Обработка данных формы
//     $name = $model->name;
//     $email = $model->email;

//     // Допустим, здесь можно сохранить данные в базу данных

//     // Отправляем пользователя на страницу "Success"
//     return $this->redirect(['success']);
// } else{
// $this->layout = '@app/views/layouts/admin.php';
// $emails = Admin::find()->select('email')->column();
// $passwords = Admin::find()->select('password')->column();
// return $this->render('admin', compact('emails', 'passwords'));}
