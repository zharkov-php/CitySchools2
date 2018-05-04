<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Avtoshkoly */

$this->title = 'Update Avtoshkoly: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Avtoshkolies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="avtoshkoly-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
