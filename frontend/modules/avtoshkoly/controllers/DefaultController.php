<?php

namespace frontend\modules\avtoshkoly\controllers;

use frontend\models\Avtoshkoly;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Default controller for the `kiev` module
 */
class DefaultController extends AvtoshkolaController
{

    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {

        $avtoshkoly = Avtoshkoly::find()->orderBy('rand()');
        $countQuery = clone $avtoshkoly;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        $avtoshkoly = $countQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'avtoshkoly' => $avtoshkoly,
            'pages' => $pages,
        ]);
    }



    private function findAvtoshkolaId($id)
    {
        if ($kiev_avtoshkolaId = Avtoshkoly::find()->where(['id' => $id])->one()) {
            return $kiev_avtoshkolaId;
        }
        throw new NotFoundHttpException();
    }

    public function actionLike()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('id');
        $post = $this->findAvtoshkolaId($id);
        /* @var $currentUser User */
        $currentUser = Yii::$app->user->identity;
        $post->like($currentUser);
        return [
            'success' => true,
            'likesCount' => $post->countLikes(),
        ];
    }
    public function actionUnlike()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('id');
        /* @var $currentUser User */
        $currentUser = Yii::$app->user->identity;
        $post = $this->findAvtoshkolaId($id);
        $post->unLike($currentUser);
        return [
            'success' => true,
            'likesCount' => $post->countLikes(),
        ];
    }

}
