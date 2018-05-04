<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 23.04.2018
 * Time: 15:39
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';


\Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' =>  ''
]);
\Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' =>  ''
]);
?>
    <div class="row">
        <div class="col-lg-6">
            <img src="/image/600_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
        </div>
        <div class="col-lg-6">
            <img src="/image/600_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
        </div>

    </div>
    <center><h4>Киев и Киевская область:</h4></center>

<?php include 'zone_Kiev_widget.php'; ?><br>
<?php include 'zone_Kiev_Oblast_widget.php'; ?>

    <div class="container">

    <div class="row">
        <div class="col-lg-9">

            <?php foreach ($avtoshkoly as $avtoshkola): ?>
                <div class="filterDiv5 <?php echo $avtoshkola->zone_widget;?> ">
                    <center><h4><b><?php echo '"' . Html::encode($avtoshkola->name) . '"'; ?></b></h4></center>
                    <center> <a href="<?php echo Url::to(['/avtoshkoly/avtoshkola/view', 'id' => $avtoshkola->id]); ?>" class="btn btn-warning">кат. <?php echo Html::encode($avtoshkola->category_widget);  ?></a>
                        <a href="<?php echo Url::to(['/avtoshkoly/avtoshkola/view', 'id' => $avtoshkola->id]); ?>" class="btn btn-info">Like: <span class="likes-count"><?php echo $avtoshkola->countLikes(); ?></span></a>
                    </center>
                    <div class="thumbnail">
                        <a href="<?php echo Url::to(['/avtoshkoly/avtoshkola/view', 'id' => $avtoshkola->id]); ?>"> <img src="<?php echo Yii::$app->request->baseUrl . $avtoshkola->card; ?>" /></a>
                    </div>
                </div>


            <?php endforeach;?>

        </div>

        <div class="col-lg-3">
            <div class="Image_block_reklama">
            <a href="#">Гугл реклама
                <img src="/images/img/300_250.jpg" class="img-thumbnail" alt="Cinque Terre"></a>
        <br>
        </div>
            <br>
            <div class="coupon1">
                <center><h3><b>Рекомендуем!!!</b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                    <p>Lorem ipsum..</p>
                </div>
            <br>
            <div class="coupon2">
                <center><h3><b>Рекомендуем!!!</b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                <p>Lorem ipsum..</p>
            </div>
            <br>
            <div class="coupon3">
                <center><h3><b>Рекомендуем!!!</b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                <p>Lorem ipsum..</p>
            </div>
            <br>
            <div class="coupon4">
                <center><h3><b>Рекомендуем!!!</b></h3></center>
                <img src="/images/img/300_250.jpg" alt="Avatar" style="width:100%;">
                <p>Lorem ipsum..</p>
            </div>

            </div>

    <div class="row">
        <div class="col-lg-12">
            <img src="/image/1200_200.png" class="img-thumbnail" alt="Cinque Terre"></a>
        </div>

        </div>







<?php  // отображаем ссылки на страницы
echo '<center>' .  LinkPager::widget([
        'pagination' => $pages,
    ]) . '<center>';?>