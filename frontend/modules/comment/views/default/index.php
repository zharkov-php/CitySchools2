<?php use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<div class="row">
    <div class="col-lg-6">
        <img src="/image/600_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
    </div>
    <div class="col-lg-6">
        <img src="/image/600_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
    </div>

</div>
<center><h1>Все Отзывы об Автошколах: </h1></center>
<?php foreach ($allComments as $comment): ?>

    <div class="alert alert-info" role="alert">
        <div class="row">
            <div class="col-md-3">
                <?php echo 'Автор:  '. '<b>' . Html::encode($comment->name). '</b>'?>
            </div>
            <div class="col-md-3">
                <?php echo 'ID - автошколы ' . '<b>' . Html::encode($comment->avtoshkoly_id)  . '</b>'?>
            </div>
            <div class="col-md-3">
                <?php echo $comment->getDate() ?>
            </div>
            <div class="col-md-3">
                <?php echo 'Отзыв: № ' .'<b>' . Html::encode($comment->id). '</b>'?>
            </div>
            <b>
        </div>
        <div class="alert alert-info" role="alert">
            <?= Html::encode($comment->text); ?>

            </b>
        </div>
        <div class="fb-like" data-href="<?= Html::encode($comment->text); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
    </div>
    <hr>
<?php endforeach;?>
    <div class="row">
        <div class="col-lg-6">
            <img src="/image/600_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
        </div>
        <div class="col-lg-6">
            <img src="/image/600_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
        </div>

    </div>
<?php  // отображаем ссылки на страницы
echo '<center>' .  LinkPager::widget([
    'pagination' => $pages,
]) . '<center>';?>