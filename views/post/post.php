<div class="container-123">
    <div class="col-md-3">
        <div class="single-post">
            <?= yii\helpers\Html::img("@web/{$img}") ?><br>
            <h1><?=$title?></h1> 
            <h2>
                <span>Category: <span class="author-name">
                    <a href="<?=
                    yii\helpers\Url::to(['category/view', 'alias' => $category])
                    ?>">
                        <strong>
                        <?=$category?>
                        </strong>
                    </a><br>
                </span></span>
            </h2>
            <p class='exc'><?=$excerpt?></p>
        </div>
    </div>
</div>

<style>
.container-123 {
    display: flex;
    justify-content: center;
}

.exc {
    font-size: 20px;
}

.col-md-3 {
    margin-top: 100px;
    margin-bottom: 100px;
}
</style>
