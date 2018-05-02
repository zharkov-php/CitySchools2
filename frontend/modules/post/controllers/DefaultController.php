<?php

namespace frontend\modules\post\controllers;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use frontend\modules\post\models\forms\PostForm;
use frontend\models\Post;
use yii\web\Response;
/**
 * Default controller for the `post` module
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        $allPosts = Post::find()->orderBy('id DESC');
        $countQuery = clone $allPosts;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 3]);
        $pages->pageSizeParam = false;
        $allPosts = $countQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',[
            'allPosts' => $allPosts,
            'pages' => $pages,

        ]);
    }


}
