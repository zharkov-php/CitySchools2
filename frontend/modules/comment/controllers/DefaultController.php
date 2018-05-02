<?php

namespace frontend\modules\comment\controllers;

use frontend\models\Comment;
use frontend\models\User;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `comment` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $allComments = Comment::find()->orderBy('id DESC');

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
