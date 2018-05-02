<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 18.04.2018
 * Time: 13:01
 */

namespace frontend\models;


use Yii;
use yii\base\Model;
class CommentForm extends Model
{
    public $comment;


    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [10,1000]],

        ];
    }
    public function saveComment($avtoshkoly_id)
    {
        $comment = new Comment();
        $comment->text = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->avtoshkoly_id = $avtoshkoly_id;
        $comment->name = Yii::$app->user->identity->username;
        $comment->email = Yii::$app->user->identity->email;
        $comment->status = 0;
        $comment->date = date('Y-m-d');
        return $comment->save();

    }
}






