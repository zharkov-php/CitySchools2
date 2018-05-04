<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Avtoshkoly */

$this->title = 'Create Avtoshkoly';
$this->params['breadcrumbs'][] = ['label' => 'Avtoshkolies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avtoshkoly-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
