<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Instructor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Instructors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'avtoshkoly_id',
            'name',
            'image:ntext',
            'email:email',
            'title',
            'adress',
            'phone',
            'price',
            'price_plus',
            'lesson_grafic',
            'sale',
            'car',
            'city',
            'text:ntext',
            'date_register',
            'status',
            'zone_widget',
            'price_widget',
            'category_widget',
            'title_seo:ntext',
            'keywords_seo:ntext',
            'description_seo:ntext',
        ],
    ]) ?>

</div>
