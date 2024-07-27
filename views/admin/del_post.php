<?php
$key = \Yii::$app->request->cookies->getValue('email');
if(!$key){
   return Yii::$app->response->redirect(['admin/index']);
}

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


$f = ActiveForm::begin(); ?>
<p>Введите id поста</p>
<?= $f->field($form, 'id') ?>
    <?php
echo Html::submitButton('Удалить пост', ['class' => 'btn btn-primary']);
ActiveForm::end();
if($deleted) {
    echo('<p class="alert alert-success">Пост '.$id.' успешно удален</p>');
} 
echo "<a href='" . Url::to(['admin/index']) . "'><h3>Назад</h3></a>";

?>