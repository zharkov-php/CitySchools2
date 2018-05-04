<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\avtoshkoly\models\AvtoshkolySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avtoshkoly-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_url') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'card') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'price_schools') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'lesson_length') ?>

    <?php // echo $form->field($model, 'lessons_grafic') ?>

    <?php // echo $form->field($model, 'additional_lesson') ?>

    <?php // echo $form->field($model, 'autopark') ?>

    <?php // echo $form->field($model, 'date_register') ?>

    <?php // echo $form->field($model, 'date_birth') ?>

    <?php // echo $form->field($model, 'hide') ?>

    <?php // echo $form->field($model, 'category_widget') ?>

    <?php // echo $form->field($model, 'zone_widget') ?>

    <?php // echo $form->field($model, 'price_widget') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'title_seo') ?>

    <?php // echo $form->field($model, 'keywords_seo') ?>

    <?php // echo $form->field($model, 'description_seo') ?>

    <?php // echo $form->field($model, 'price_plus') ?>

    <?php // echo $form->field($model, 'lessons_schedule') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
