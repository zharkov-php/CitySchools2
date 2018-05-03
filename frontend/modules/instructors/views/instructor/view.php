<?php

use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Instructor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Instructors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <button onclick="topFunction()" id="myBtnComment" title="Оставить отзыв">Оставить отзыв</button>

<div class="instructor-view">

    <h1><?= Html::encode($this->title) ?></h1>


   <?php  echo $instructor->name;?><hr>
   <?php  echo $instructor->avtoshkoly_id;?>
    <hr>
    <hr>

    <div class="col-md-12">
        Likes: <span class="likes-count"><?php echo $instructor->countLikes(); ?></span>

        <a href="#" class="btn btn-primary button-unlike <?php echo ($currentUser && $instructor->isLikedBy($currentUser)) ? "" : "display-none"; ?>" data-id="<?php echo $instructor->id; ?>">
            Unlike&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-down"></span>
        </a>
        <a href="#" class="btn btn-primary button-like <?php echo ($currentUser && $instructor->isLikedBy($currentUser)) ? "display-none" : ""; ?>" data-id="<?php echo $instructor->id; ?>">
            Like&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>
        </a>

    </div>
    <br>

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

</div>


<?php $this->registerJsFile('@web/js/likesInstructors.js', [
    'depends' => JqueryAsset::className(),
]);?>