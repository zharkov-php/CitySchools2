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
        <div class="col-lg-12">
            <center><h3><b><?php echo Html::encode($post->title); ?></b></h3></center>
        </div>
        </div><hr>

        <div class="col-lg-12">
                <?php echo $post->text; ?>
        </div>


    </div>



</div>


</div>