<?php
use app\assets\AppAsset;
AppAsset::register($this);
$this->registerCsrfMetaTags();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front page</title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
        <div class="container">
        <?= $content?>
        </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>