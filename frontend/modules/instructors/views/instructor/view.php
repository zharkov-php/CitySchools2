<?php

use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Instructor */

//$this->title = $model->name;


$this->title = $instructor->title_seo;
\Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' =>  $instructor->description_seo
]);
\Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' =>  $instructor->keywords_seo
]);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <img src="/image/1200_200.png" class="img-thumbnail" alt="Cinque Terre"></a>
        </div>

    </div><br>
    <button onclick="topFunction()" id="myBtnComment" title="Оставить отзыв">Оставить отзыв</button>

    <div class="col-lg-12">
        <div class="col-lg-4">
            <div class="thumbnail">
                <img src="<?php echo Yii::$app->request->baseUrl . $instructor->image; ?>" />
            </div>
            Likes: <span class="likes-count"><?php echo $instructor->countLikes(); ?></span>

            <a href="#" class="btn btn-primary button-unlike <?php echo ($currentUser && $instructor->isLikedBy($currentUser)) ? "" : "display-none"; ?>" data-id="<?php echo $instructor->id; ?>">
                Unlike&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down"></span>
            </a>
            <a href="#" class="btn btn-primary button-like <?php echo ($currentUser && $instructor->isLikedBy($currentUser)) ? "display-none" : ""; ?>" data-id="<?php echo $instructor->id; ?>">
                Like&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>
            </a>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">

            <div class="couponGray">
                <center><h3><b>Реклама </b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
            </div><br>

        </div>
    </div>

    <div class="col-lg-12">
    <div class="col-lg-9">

        <h3>ID - автошколы:</h3>
        <?php echo $instructor->avtoshkoly_id; ?>
        <hr>
        <hr>

        <h3>Город:</h3>
        <?php echo $instructor->city; ?>
        <hr>
        <hr>

        <h3>Стоимость урока:</h3>
        <?php echo $instructor->price; ?>
        <hr>
        <hr>

        <h3>Автомобиль:</h3>
        <?php echo $instructor->car; ?>
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

            <div class="couponGray">
                <center><h3><b>Реклама </b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
            </div><br>


            <div class="couponGray">
                <center><h3><b>Реклама </b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
            </div><br>

        </div>
    </div>

    </div>



    <div class="comment-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('comment', [
            'model' => $model,
            'instructor' => $instructor,
            'article' => $article,
            'comments' => $comments,
            'commentsInstructorForm' => $commentsInstructorForm
        ])?>

    </div><br>


    <div class="row">
        <div class="col-lg-12">
            <img src="/image/1200_200.png" class="img-thumbnail" alt="Cinque Terre"></a>
        </div>

    </div><br>

<?php $this->registerJsFile('@web/js/likesInstructors.js', [
    'depends' => JqueryAsset::className(),
]);?>