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

$categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');
$numbers = range(2, 9);

$f = ActiveForm::begin(); ?>
<?= $f->field($form, 'img')->dropDownList($numbers, ['prompt' => 'Выберите фотографию']); ?>
<?= $f->field($form, 'title')->textInput(['maxlength' => 255]) ?>
<?= $f->field($form, 'category')->dropDownList($categories, ['prompt' => 'Select Category']) ?>
<?= $f->field($form, 'excerpt')->textInput(['maxlength' => 255]) ?>
    <?php
echo Html::submitButton('Добавить пост', ['class' => 'btn btn-primary']);
if($added) {
    echo('<p class="alert alert-success">Пост успешно добавлен</p>');
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