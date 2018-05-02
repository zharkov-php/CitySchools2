<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="/images/banner_1400_500/Baner_CitySchools_1400_500.png" alt="Chania">
            <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>LA is always so much fun!</p>
            </div>
        </div>

        <div class="item">
            <img src="/images/banner_1400_500/Baner_CitySchools_1400_500.png" alt="Chicago">
            <div class="carousel-caption">
                <h3>Chicago</h3>
                <p>Thank you, Chicago!</p>
            </div>
        </div>

        <div class="item">
            <img src="/images/banner_1400_500/Baner_CitySchools_1400_500.png" alt="New York">
            <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
            </div>
        </div>
    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div><br>



    <div class="row ">
        <div class="col-lg-3 ">
            <div>
                <center><h3><b>Автошколы:</b></h3></center>
                <?php foreach ($avtoshkoly as $avtoshkola): ?>
                    <a href="<?php echo Url::to(['/avtoshkoly/avtoshkola/view', 'id' => $avtoshkola->id]); ?>">
                    <div class="couponGray">
                        <center><h5><b>"<?php echo  $avtoshkola->name; ?>"</b></h5></center>
                        <img src="<?php echo $avtoshkola->card;?>"style="width:100%;">
                        <center><a href="<?php echo Url::to(['/avtoshkoly/avtoshkola/view', 'id' => $avtoshkola->id]); ?>" class="btn btn-warning">кат. <?php echo $avtoshkola->category_widget;?></a></center>

                    </div>
                    </a>
                    <br>
                <?php endforeach; ?>
            </div>


            <div class="couponGray">
                <center><h3><b>Реклама </b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
            </div>
            <br>
            <div class="couponGray">
                <center><h3><b>Реклама </b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
            </div>
            <br>
        </div>

        <div class="col-lg-7">
            <div>
            <img src="/image/700_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
            </div>
            <div>
                <center><h3><b>Статьи:</b></h3></center>
                <?php foreach ($posts as $post): ?>

                    <h4><b><?php echo $post->title = \yii\helpers\StringHelper::truncate($post['title'], 50, '...'); ?></b></h4>

                    <p><?php echo $post->text  = \yii\helpers\StringHelper::truncate($post['text'], 200, '...'); ?></p>
                    <p><a class="btn btn-default" href="<?php echo Url::to(['/post/post/view', 'id' => $post->id]); ?>">Читать  &raquo;</a></p>
            <?php endforeach; ?>
            </div>
            <div>
                <img src="/image/700_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
            </div>

            <div>
                <center><h3><b>Последние отзывы об Автошколах:</b></h3></center>
                <?php foreach ($comments as $comment): ?>
                    <?php echo 'Автор:  '. '<b>' . Html::encode($comment->name). '</b>'?><br>
                    <?php echo 'Автошкола:  '. '<b>' . Html::encode($comment->avtoshkoly_id). '</b>'?>

                    <p> <?= Html::encode($comment->text = \yii\helpers\StringHelper::truncate($comment['text'], 150, '...')); ?></p>
                    <p><a class="btn btn-default" href="<?php echo Url::to(['/comment/default/index']); ?>">Читать  &raquo;</a></p>
                    <?php echo $comment->getDate() ?>
                <?php endforeach; ?>
            </div>




            <div>
                <img src="/image/700_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
            </div>



            <div>
                <center><h3><b>Последние отзывы об Инструкторах:</b></h3></center>
                <?php foreach ($comments_instructors as $comment): ?>
                    <?php echo 'Автор:  '. '<b>' . Html::encode($comment->name). '</b>'?><br>
                    <?php echo 'Инструктор:  '. '<b>' . Html::encode($comment->instructor_id). '</b>'?>

                    <p> <?= Html::encode($comment->text = \yii\helpers\StringHelper::truncate($comment['text'], 150, '...')); ?></p>
                    <p><a class="btn btn-default" href="<?php echo Url::to(['/comment_instructor/default/index']); ?>">Читать  &raquo;</a></p>
                    <?php echo $comment->getDate() ?>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="col-lg-2 ">
            <div>
                <center><h3><b>Инструктора:</b></h3></center>
            <?php foreach ($instructors as $instructor): ?>
           <a href="<?php echo Url::to(['/instructors/instructor/view', 'id' => $instructor->id]); ?>">
            <div class="couponGray">
                <center><h5><b><?php echo  $instructor->city; ?></b></h5></center>
                <img src="<?php echo $instructor->image;?>"style="width:100%;">
                <center><h5><b><?php echo  $instructor->name; ?></b></h5></center>
            </div><br></a>
            <?php endforeach; ?>
        </div>

            <div class="couponGray">
                <center><h3><b>Реклама </b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
            </div>
            <br>
            <div class="couponGray">
                <center><h3><b>Реклама </b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
            </div>
            <br>
            <div class="couponGray">
                <center><h3><b>Реклама </b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
            </div>
            <br>
        </div>


    </div>


