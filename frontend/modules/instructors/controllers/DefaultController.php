<?php

namespace frontend\modules\instructors\controllers;

use frontend\models\Instructor;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Default controller for the `instructors` module
 */
class DefaultController extends InstructorController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $ukraine_allInstructors = Instructor::find()->orderBy('id DESC');
        $countQuery = clone $ukraine_allInstructors;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        $ukraine_allInstructors = $countQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'ukraine_allInstructors' => $ukraine_allInstructors,
            'pages' => $pages,
        ]);
    }







}
