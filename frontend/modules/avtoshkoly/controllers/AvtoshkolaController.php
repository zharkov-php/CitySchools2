<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 04.04.2018
 * Time: 23:29
 */

namespace frontend\modules\avtoshkoly\controllers;

use frontend\models\Comment;
use frontend\models\CommentForm;
use Yii;
use yii\web\Controller;
use frontend\models\Avtoshkoly;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class AvtoshkolaController extends Controller
{
    protected function findModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionView($id)
    {

        $article = Avtoshkoly::findOne($id);
        $comments = $article->comments;

        $commentForm = new CommentForm();


        $model = new Comment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('view', [
            'kiev_avtoshkola' => $this->findAvtoshkola($id),
            'model' => $model,
            'article'=>$article,
            'comments'=>$comments,
            'commentForm' => $commentForm
        ]);

    }


    /**
     * @param integer $id
     * @return Avtoshkoly
     * @throws NotFoundHttpException
     */
    private function findAvtoshkola($id)
    {
        if ($kiev_avtoshkola = Avtoshkoly::find()->where(['id' => $id])->one()) {
            return $kiev_avtoshkola;
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
        $post = $this->findAvtoshkola($id);
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
        $post = $this->findAvtoshkola($id);
        $post->unLike($currentUser);
        return [
            'success' => true,
            'likesCount' => $post->countLikes(),
        ];
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Вы оставили комментарий');
                return $this->redirect(['/avtoshkoly/avtoshkola/view','id'=>$id]);
            }
        }
    }


}