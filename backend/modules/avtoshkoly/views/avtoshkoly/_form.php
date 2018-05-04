<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Avtoshkoly */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avtoshkoly-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_schools')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lesson_length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lessons_grafic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'additional_lesson')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autopark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_birth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hide')->textInput() ?>

    <?= $form->field($model, 'category_widget')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zone_widget')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_widget')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_plus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lessons_schedule')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_seo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'keywords_seo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description_seo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
