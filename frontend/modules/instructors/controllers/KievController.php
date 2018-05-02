<?php
namespace frontend\modules\instructors\controllers;

use frontend\models\Instructor;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 20.04.2018
 * Time: 22:26
 */

class KievController extends InstructorController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {


        $kiev_allInstructors = Instructor::find()->where('status =1' )->orderBy('id DESC');
        $countQuery = clone $kiev_allInstructors;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 100]);
        $pages->pageSizeParam = false;
        $kiev_allInstructors = $countQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', [
            'kiev_allInstructors' => $kiev_allInstructors,
            'pages' => $pages,
        ]);
    }


}