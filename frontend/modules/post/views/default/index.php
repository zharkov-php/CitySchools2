<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">



    <div class="body-content">

        <div class="row">
            <?php use yii\helpers\Html;
            use yii\widgets\LinkPager;?>
              <?php foreach ($allPosts as $post): ?>
                <div class="col-lg-6">
                    <h2> <?php echo $post->title; ?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>
                    <p><a class="btn btn-default" href="<?php echo Url::to(['/post/post/view', 'id' => $post->id]); ?>">Читать далее&raquo;</a></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php  // отображаем ссылки на страницы
echo LinkPager::widget([
    'pagination' => $pages,
]);?>