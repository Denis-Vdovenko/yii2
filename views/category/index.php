<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="blog-post-area-style">
                <div class="col-md-12">
                    <div class="single-post-big">
                        <div class="big-image">
                            <?= yii\helpers\Html::img("@web/img/post-image1.jpg") ?>

                        </div>
                        <div class="big-text">
                            <h3><a href="">Post Title Goes Here.</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <h4><span class="date">25 February 2017</span><span class="author">Posted By: <span class="author-name">Kabbo Liate</span></span>
                            </h4>
                        </div>
                    </div>
                </div>
                <?php
                foreach($posts as $post):
                    ?>
                    <div class="col-md-3">
                        <div class="single-post">

                            <?= yii\helpers\Html::img("@web/{$post->img}") ?>
                            <h3><a href="<?=yii\helpers\Url::to(['post/view', 'id' => $post->id])?>"><?=$post->title?></a></h3>
                            <h4><span>Category: <span class="author-name">
                                        <a href="<?=
                                        yii\helpers\Url::to(['category/view', 'alias' => $post->category->alias])
                                        ?>">
                                            <strong>
                                            <?=$post->category->title?>
                                            </strong>
                                        </a>
                                </span></span>

                            </h4>
                            <p><?=$post->excerpt?></p>
                            <h4><span><?=Yii::$app->formatter->asDate($post->created_at)?></span></h4>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <div class="pegination">
        <div class="nav-links">
            <?= yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ])?>
            <!--<span class="page-numbers current">1</span>
            <a class="page-numbers" href="#">2</a>
            <a class="page-numbers" href="#">3</a>
            <a class="page-numbers" href="#">4</a>
            <a class="page-numbers" href="#">5</a>
            <a class="page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>!-->
        </div>
</section>