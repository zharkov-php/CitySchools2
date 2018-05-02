<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 07.04.2018
 * Time: 23:57
 */

/* @var $this yii\web\View */
/* @var $post frontend\models\Post */
use yii\helpers\Html;
use yii\web\JqueryAsset;
?>
<div class="post-default-index">

    <div class="row">

        <div class="col-md-12">

                <?php echo $post->title; ?>

        </div>



        <div class="col-md-12">
            <?php echo Html::encode($post->description); ?>
        </div>
        <hr>



    </div>



</div>


</div>