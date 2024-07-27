<?php
$key = \Yii::$app->request->cookies->getValue('email');
if(!$key){
   return Yii::$app->response->redirect(['admin/index']);
}
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$f = ActiveForm::begin(); ?>
<?= $f->field($form, 'email') ?>
<?= $f->field($form, 'password') ?>
    <?php
echo Html::submitButton('Зарегистрировать администратора', ['class' => 'btn btn-primary']);
if($added) {
    echo('<p class="alert alert-success">Администратор '.$email.' успешно зарегистрирован</p>');
} 
if($error) {
    echo('<p class="alert alert-danger">'.$error.'</p>');
}
echo "<a href='" . Url::to(['admin/index']) . "'><h3>Назад</h3></a>";
ActiveForm::end();
?>
