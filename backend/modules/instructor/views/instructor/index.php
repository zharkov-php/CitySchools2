<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\instructor\models\InstructorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instructors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Instructor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'avtoshkoly_id',
            'name',
            'image:ntext',
            'email:email',
            //'title',
            //'adress',
            //'phone',
            //'price',
            //'price_plus',
            //'lesson_grafic',
            //'sale',
            //'car',
            //'city',
            //'text:ntext',
            //'date_register',
            //'status',
            //'zone_widget',
            //'price_widget',
            //'category_widget',
            //'title_seo:ntext',
            //'keywords_seo:ntext',
            //'description_seo:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
