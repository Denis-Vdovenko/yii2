<?php
$key = \Yii::$app->request->cookies->getValue('email');
if(!$key){
   return Yii::$app->response->redirect(['admin/index']);
}

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


$f = ActiveForm::begin(); ?>
<p>Введите е-mail администратора</p>
<?= $f->field($form, 'email') ?>
    <?php
echo Html::submitButton('Удалить администратора', ['class' => 'btn btn-primary']);
ActiveForm::end();
if($deleted) {
    echo('<p class="alert alert-success">Администратор '.$email.' успешно удален</p>');
} 
echo "<a href='" . Url::to(['admin/index']) . "'><h3>Назад</h3></a>";

?>