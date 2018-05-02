<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 08.04.2018
 * Time: 0:21
 */

namespace frontend\modules\post\controllers;

use frontend\models\Post;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class PostController extends Controller
{
    public function actionView($id)
    {
        $post = Post::findOne($id);

        return $this->render('view', [
            'post' => $this->findPost($id),
           // 'currentUser' => $currentUser,
            'post' => $post
        ]);
    }

    /**
     * @param integer $id
     * @return User
     * @throws NotFoundHttpException
     */
    private function findPost($id)
    {
        if ($user = Post::findOne($id)) {
            return $user;
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
        $post = $this->findPost($id);
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
        $post = $this->findPost($id);
        $post->unLike($currentUser);
        return [
            'success' => true,
            'likesCount' => $post->countLikes(),
        ];
    }

}