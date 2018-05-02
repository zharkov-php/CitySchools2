<?php

namespace frontend\modules\user\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\User;
use yii\web\NotFoundHttpException;
class ProfileController extends Controller
{
    public function actionView($nickname)
    {

        /* @var $currentUser User */
                $currentUser = Yii::$app->user->identity;

        return $this->render('view', [
            'user' => $this->findUser($nickname),
            'currentUser' => $currentUser,
        ]);
    }
    /**
     * @param integer $nickname
     * @return User
     * @throws NotFoundHttpException
     */
    private function findUser($nickname)
    {
        if ($user = User::find()->where(['nickname' => $nickname])->orWhere(['id' => $nickname])->one()) {
            return $user;
        }
        throw new NotFoundHttpException();
    }


    ///////////////////////////////
    /// для подписки
    public function actionSubscribe($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        /* @var $currentUser User */
        $currentUser = Yii::$app->user->identity;
        $user = $this->findUserById($id);
        $currentUser->followUser($user);
        return $this->redirect(['/user/profile/view', 'nickname' => $user->getNickname()]);
    }
    public function actionUnsubscribe($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }
        /* @var $currentUser User */
        $currentUser = Yii::$app->user->identity;
        $user = $this->findUser($id);
        $currentUser->unfollowUser($user);
        return $this->redirect(['/user/profile/view', 'nickname' => $user->getNickname()]);
    }
    /**
     * @param integer $nickname
     * @return User
     * @throws NotFoundHttpException
     */
    private function findUserById($id)
    {
        if ($user = User::findOne($id)) {
            return $user;
        }
        throw new NotFoundHttpException();
    }
}
