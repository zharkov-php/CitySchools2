<?php

namespace frontend\modules\comment_instructor\controllers;

use frontend\models\CommentsInstructor;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Default controller for the `comment_instructor` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $allComments = CommentsInstructor::find()->orderBy('id DESC');

        $countQuery = clone $allComments;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        $allComments = $countQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'allComments' => $allComments,
            'pages' => $pages,



        ]);
    }
}
