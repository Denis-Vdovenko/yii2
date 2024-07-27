<?php
use app\assets\AppAsset;
AppAsset::register($this);
$this->registerCsrfMetaTags();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front page</title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <h2><a href="#">Classic</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="menu">
                            <ul>
                                <li class="active"><a href="http://localhost/yii/web">Home</a></li>
                                <li><a href="http://localhost/yii/web/category/lifestyle">lifestyle</a></li>
                                <li><a href="http://localhost/yii/web/category/food">Food</a></li>
                                <li><a href="http://localhost/yii/web/category/nature">Nature</a></li>
                                <li><a href="http://localhost/yii/web/category/photography">photography</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
        <?= $content?>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bg">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="footer-menu">
                                        <ul>
                                            <li class="active"><a href="#">Home</a></li>
                                            <li><a href="#">lifestyle</a></li>
                                            <li><a href="#">Food</a></li>
                                            <li><a href="#">Nature</a></li>
                                            <li><a href="#">photography</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="footer-icon">
                                        <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></p>
                                    </div>
                                </div>
                            </div> .
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>