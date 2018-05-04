<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Avtoshkoly */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Avtoshkolies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avtoshkoly-view">

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
            'name',
            'name_url:url',
            'city',
            'logo',
            'card',
            'text:ntext',
            'adress:ntext',
            'phone',
            'mail',
            'price',
            'price_schools:ntext',
            'sale',
            'lesson_length',
            'lessons_grafic',
            'additional_lesson',
            'autopark:ntext',
            'date_register',
            'date_birth',
            'hide',
            'category_widget',
            'zone_widget',
            'price_widget',
            'link',
            'site',
            'title',
            'title_seo',
            'keywords_seo',
            'description_seo:ntext',
            'price_plus',
            'lessons_schedule',

            'title_seo',
            'keywords_seo',
            'description_seo',
        ],
    ]) ?>

</div>
