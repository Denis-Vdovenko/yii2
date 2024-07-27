<?php
$key = \Yii::$app->request->cookies->getValue('email');
 if(!$key){
    return Yii::$app->response->redirect(['admin/index']);
 }
 use yii\helpers\Url;
?>

<h1> <?=$key?> </h1>

<form method="GET" action="exit">
  <button type="submit">Выйти</button>
</form>
<a href="<?=Url::to(['admin/add'])?>"><h3>Добавить администратора</h3></a>
<a href="<?=Url::to(['admin/del'])?>"><h3>Удалить администратора</h3></a>
 <a href="<?=Url::to(['admin/add_post'])?>"><h3>Добавить пост</h3></a>
 <a href="<?=Url::to(['admin/del_post'])?>"><h3>Удалить пост</h3></a>
 <a href="<?=Url::to(['admin/edit_post'])?>"><h3>Редактировать пост</h3></a>
