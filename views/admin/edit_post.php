<?php
$key = \Yii::$app->request->cookies->getValue('email');
if(!$key){
   return Yii::$app->response->redirect(['admin/index']);
}
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Category;

$f = ActiveForm::begin(); ?>
<?= $f->field($form, 'id'); ?>

    <?php
echo Html::submitButton('Найти пост', ['class' => 'btn btn-primary']);
// if($id) {
//     echo('<p class="alert alert-success">Пост '.$id.' успешно добавлен</p>');
// } 
ActiveForm::end();
?>
<?php
$categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');
$numbers = range(2, 9);
preg_match('/post-image(\d+).jpg/', $img_bd, $matches);

$f1 = ActiveForm::begin(); ?>
<?= $f1->field($form1, 'img')->dropDownList($numbers, ['prompt' => 'Выберите фотографию', 'value' => $matches[1]-2]); ?>
<?= $f1->field($form1, 'title')->textInput(['maxlength' => 255 , 'value' => $title_bd]) ?>
<?= $f1->field($form1, 'category')->dropDownList($categories, ['prompt' => 'Select Category' , 'value' => $category_bd]) ?>
<?= $f1->field($form1, 'excerpt')->textInput(['maxlength' => 255, 'value' => $excerpt_bd]) ?>
    <?php
echo Html::submitButton('Изменить пост', ['class' => 'btn btn-primary']);
if($added) {
    echo('<p class="alert alert-success">Пост успешно изменен</p>');
} 

echo "<a href='" . Url::to(['admin/index']) . "'><h3>Назад</h3></a>";
ActiveForm::end();
?>
<div class="image-container">
  <label class="image-label">2</label>
  <?= yii\helpers\Html::img("@web/img/post-image2.jpg") ?>
</div>

<div class="image-container">
  <label class="image-label">3</label>
  <?= yii\helpers\Html::img("@web/img/post-image3.jpg") ?>
</div>

<div class="image-container">
  <label class="image-label">4</label>
  <?= yii\helpers\Html::img("@web/img/post-image4.jpg") ?>
</div>

<div class="image-container">
  <label class="image-label">5</label>
  <?= yii\helpers\Html::img("@web/img/post-image5.jpg") ?>
</div>

<div class="image-container">
  <label class="image-label">6</label>
  <?= yii\helpers\Html::img("@web/img/post-image6.jpg") ?>
</div>

<div class="image-container">
  <label class="image-label">7</label>
  <?= yii\helpers\Html::img("@web/img/post-image7.jpg") ?>
</div>

<div class="image-container">
  <label class="image-label">8</label>
  <?= yii\helpers\Html::img("@web/img/post-image8.jpg") ?>
</div>
<style>
  .image-container {
    position: relative; 
    display: inline-block; 
  }

  .image-label {
    position: absolute;
    top: 10px; 
    left: 10px;
    background-color: rgba(0, 0, 0, 0.5); 
    color: white; 
    padding: 5px 10px; 
    border-radius: 5px; 
  }
</style>