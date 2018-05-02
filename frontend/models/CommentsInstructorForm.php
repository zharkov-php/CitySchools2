<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 22.04.2018
 * Time: 11:13
 */

namespace frontend\models;


use Yii;
use yii\base\Model;

class CommentsInstructorForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [10,1000]],

        ];
    }
    public function saveComment($instructor_id)
    {
        $comment = new CommentsInstructor();
        $comment->text = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->instructor_id = $instructor_id;
        $comment->name = Yii::$app->user->identity->username;
        $comment->email = Yii::$app->user->identity->email;
        $comment->status = 0;
        $comment->date = date('Y-m-d');
        return $comment->save();

    }

}