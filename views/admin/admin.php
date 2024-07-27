<h1 class="a-header-title">Вход в административную панель</h1>



<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

if ($error){
echo('<p class="alert alert-danger" >Ошибка: '.$error.'</p>');
}
$f = ActiveForm::begin(); ?>
<?= $f->field($form, 'email') ?>
<?= $f->field($form, 'password') ?>
    <?php
echo Html::submitButton('Submit', ['class' => 'btn btn-primary']);
ActiveForm::end();
?>



<style>
    .a-header-title {
        margin-bottom: 150px;
    }
</style>