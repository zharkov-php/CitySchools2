<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 04.04.2018
 * Time: 23:34
 */

use yii\helpers\Html;
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
<?php echo Html::encode($kiev_avtoshkola->name); ?>
<hr>
<hr>

<div class="col-md-12">
    Likes: <span class="likes-count"><?php echo $kiev_avtoshkola->countLikes(); ?></span>

    <a href="#" class="btn btn-primary button-unlike <?php echo ($currentUser && $kiev_avtoshkola->isLikedBy($currentUser)) ? "" : "display-none"; ?>" data-id="<?php echo $kiev_avtoshkola->id; ?>">
        Unlike&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down"></span>
    </a>
    <a href="#" class="btn btn-primary button-like <?php echo ($currentUser && $kiev_avtoshkola->isLikedBy($currentUser)) ? "display-none" : ""; ?>" data-id="<?php echo $kiev_avtoshkola->id; ?>">
        Like&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>
    </a>

</div>
<br>
<center><h3>Комментарии об автошколе : <?php echo '" ' . Html::encode($kiev_avtoshkola->name) . ' "'; ?></h3></center>




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



<?php $this->registerJsFile('@web/js/likes.js', [
    'depends' => JqueryAsset::className(),
]);?>