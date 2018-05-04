<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\instructor\models\InstructorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instructor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'avtoshkoly_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'price_plus') ?>

    <?php // echo $form->field($model, 'lesson_grafic') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'car') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'date_register') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'zone_widget') ?>

    <?php // echo $form->field($model, 'price_widget') ?>

    <?php // echo $form->field($model, 'category_widget') ?>

    <?php // echo $form->field($model, 'title_seo') ?>

    <?php // echo $form->field($model, 'keywords_seo') ?>

    <?php // echo $form->field($model, 'description_seo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
