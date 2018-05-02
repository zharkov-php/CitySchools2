<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comments_instructor".
 *
 * @property int $id
 * @property int $instructor_id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $text
 * @property string $date
 * @property int $status
 */
class CommentsInstructor extends \yii\db\ActiveRecord
{
    public $comment;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments_instructor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instructor_id', 'user_id', 'name', 'email', 'text', 'date', 'status'], 'required'],
            [['instructor_id', 'user_id', 'status'], 'integer'],
            [['text', 'date'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instructor_id' => 'Instructor ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'email' => 'Email',
            'text' => 'Text',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public function getArticle()
    {
        return $this->hasOne(Instructor::className(), ['id' => 'instructor_id']);
    }
}
