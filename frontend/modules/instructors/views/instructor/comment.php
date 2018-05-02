<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 22.04.2018
 * Time: 11:34
 */

use yii\helpers\Html;

if(!empty($comments)):?>

    <?php foreach($comments as $comment):?>

        <div class="alert alert-info" role="alert">

            <div class="bottom-comment"><!--bottom comment-->
                <div class="comment-text">
                    <h5><?= Html::encode($comment->user->username);?></h5>
                    <p class="comment-date">
                        <?= Html::encode($comment->getDate());?>
                </div>
            </div>

            <div class="alert alert-info" role="alert">
                <b>
                    </p><p class="para"><?= Html::encode($comment->text); ?></p>
                </b>
            </div>

        </div>
        <hr>

    <?php endforeach;?>

<?php endif;?>
<!-- end bottom comment-->






<?php if(!Yii::$app->user->isGuest):?>

    <div class="leave-comment"><!--leave comment-->
        <h4>Оставьте комментарий автошколе <?php echo '" ' . Html::encode($instructor->name) . ' "'; ?> : </h4>
        <?php if(Yii::$app->session->getFlash('comment')):?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>


        <?php endif;?>

        <?php $form = \yii\widgets\ActiveForm::begin([
            'action'=>['/instructors/instructor/comment', 'id' => $article->id],
            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
        <div class="form-group">
            <div class="col-md-12">

                <?= $form->field($commentsInstructorForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Напишите комментарий...'])->label(false)?>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Отправить</button>

        <?php \yii\widgets\ActiveForm::end();?>

    </div><!--end leave comment-->
<?php else :?>
    <?php  echo  '<h1>' . '<div class="alert alert-danger">
  <strong> Здравствуйте, если Вы хотите оставить комментарий - зарегистрируйтесь пожалуйста!!!</strong>
</div>'  . '</h1>' ;?>

<?php endif;?>