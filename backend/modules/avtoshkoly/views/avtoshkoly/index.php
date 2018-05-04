<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\avtoshkoly\models\AvtoshkolySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Автошколы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avtoshkoly-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Автошколу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'name_url:url',
            'city',
           // 'logo',
            'card',
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
            //'link',
            'site',
            //'title',
            'title_seo',
            'keywords_seo',
            'description_seo:ntext',
            'price_plus',
            'lessons_schedule',
            'text:ntext',



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
