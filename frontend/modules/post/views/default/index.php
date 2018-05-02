<?php

use yii\helpers\Url;
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'My Yii Application';
?>



        <div class="row">
            <div class="col-lg-2">
                <div class="couponGray">
                    <center><h3><b>Реклама </b></h3></center>
                    <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                </div><br>
                <div class="couponGray">
                    <center><h3><b>Реклама </b></h3></center>
                    <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                </div><br>
                <div class="couponGray">
                    <center><h3><b>Реклама </b></h3></center>
                    <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                </div><br>
                <div class="couponGray">
                    <center><h3><b>Реклама </b></h3></center>
                    <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                </div>
            </div>

                <div class="col-lg-8">
                    <?php foreach ($allPosts as $post): ?>
                    <h2> <?php echo $post->title = \yii\helpers\StringHelper::truncate($post['title'], 30, '...'); ?></h2>
                    <p><?php echo $post->text = \yii\helpers\StringHelper::truncate($post['text'], 150, '...'); ?></p>
                    <p><a class="btn btn-default" href="<?php echo Url::to(['/post/post/view', 'id' => $post->id]); ?>">Читать далее&raquo;</a></p>

            <?php endforeach; ?>
                </div>
            <div class="col-lg-2">
                <div class="couponGray">
                    <center><h3><b>Реклама </b></h3></center>
                    <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                </div><br>
                <div class="couponGray">
                    <center><h3><b>Реклама </b></h3></center>
                    <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                </div><br>
                <div class="couponGray">
                    <center><h3><b>Реклама </b></h3></center>
                    <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                </div><br>
                <div class="couponGray">
                    <center><h3><b>Реклама </b></h3></center>
                    <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                </div>
            </div>
        </div>


<center><?php  // отображаем ссылки на страницы
echo LinkPager::widget([
    'pagination' => $pages,
]);?></center>