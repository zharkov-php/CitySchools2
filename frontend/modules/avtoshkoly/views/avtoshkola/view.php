<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 04.04.2018
 * Time: 23:34
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->title = $kiev_avtoshkola->title_seo;
//$this->keywords = $kiev_avtoshkola->description_seo;
\Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' =>  $kiev_avtoshkola->description_seo
]);
\Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' =>  $kiev_avtoshkola->keywords_seo
]);
?>
    <button onclick="topFunction()" id="myBtnComment" title="Оставить отзыв">Оставить отзыв</button>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <h2>Автошкола " <?php echo Html::encode($kiev_avtoshkola->name); ?> "</h2>


            <b>Рейтинг школы: </b><span class="likes-count"><div class="btn btn-danger"> <b><?php echo $kiev_avtoshkola->countLikes(); ?></b></div></span><br>

            <a href="#" class="btn btn-primary button-unlike <?php echo ($currentUser && $kiev_avtoshkola->isLikedBy($currentUser)) ? "" : "display-none"; ?>" data-id="<?php echo $kiev_avtoshkola->id; ?>">
                Unlike&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down"></span>
            </a>
            <a href="#" class="btn btn-primary button-like <?php echo ($currentUser && $kiev_avtoshkola->isLikedBy($currentUser)) ? "display-none" : ""; ?>" data-id="<?php echo $kiev_avtoshkola->id; ?>">
                Like&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>
            </a>

        </div>
        <div class="col-lg-4">
            <img src="<?php echo Yii::$app->request->baseUrl . $kiev_avtoshkola->card; ?>" />

        </div>
        <div class="col-lg-4">

        </div>
    </div>
    <hr>

    <div class="col-lg-12">
    <div class="col-lg-9">
        <h3>Цена за обучение в атошколе:</h3>
        <?php echo $kiev_avtoshkola->price_schools; ?>
        <hr>
        <hr>

        <h3>Скидки и Акции автошколы:</h3>
        <a class="btn btn-danger"> <?php echo $kiev_avtoshkola->sale; ?></a>
        <hr>
        <hr>

        <h3>Длительность обучения:</h3>
        <?php echo $kiev_avtoshkola->lesson_length; ?>
        <hr>
        <hr>

        <h3>График обучения:</h3>
        <?php echo $kiev_avtoshkola->lessons_grafic; ?>
        <hr>
        <hr>

        <h3>Филиалы автошколы:</h3>
        <?php echo $kiev_avtoshkola->adress; ?>
        <hr>
        <hr>

        <h3>Автомобили автошколы:</h3>
        <?php echo $kiev_avtoshkola->autopark; ?>
        <hr>
        <hr>

        <h3>Сайт автошколы:</h3>
        <?php echo $kiev_avtoshkola->site ?>
        <hr>
        <hr>

        <h3>Описание:</h3>
        <?php echo $kiev_avtoshkola->text ?>
        <hr>
        <hr>

        <h3>Фотогалерея:</h3>

        <hr>
        <hr>


    </div>
    <div class="col-lg-3">
        <div class="couponGray">
            <center><h3><b>Реклама </b></h3></center>
            <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
        </div><br>

        <div class="couponGray">
            <center><h3><b>Реклама </b></h3></center>
            <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
        </div><br>
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
        </div><br>
        <div class="couponGray">
            <center><h3><b>Реклама </b></h3></center>
            <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
        </div><br>
        <div class="couponGray">
            <center><h3><b>Реклама </b></h3></center>
            <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
        </div><br>
    </div>





    <div class="col-lg-12">

        <center><h3>Отзывы об автошколе : <?php echo '" ' . Html::encode($kiev_avtoshkola->name) . ' "'; ?></h3></center>



        <div class="comment-create">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('comment', [
                'model' => $model,
                'kiev_avtoshkola' => $kiev_avtoshkola,
                'article' => $article,
                'comments' => $comments,
                'commentForm' => $commentForm
            ])?>

        </div>

    </div>
    </div>


<?php $this->registerJsFile('@web/js/likes.js', [
    'depends' => JqueryAsset::className(),
]);?>