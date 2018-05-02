<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $avtoshkoly_id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $text
 * @property string $date
 * @property int $status
 */
class Comment extends \yii\db\ActiveRecord
{

    public $comment;
    const STATUS_ALLOW = 1;
    const STATUS_DISALLOW = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['avtoshkoly_id', 'user_id', 'name', 'email', 'text',  'status'], 'required'],
            [['avtoshkoly_id', 'user_id', 'status'], 'integer'],
            [['text', 'date'], 'string'],
            [['name', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'avtoshkoly_id' => 'Avtoshkoly ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'email' => 'Email',
            'text' => 'Text',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }


    //////////////////////////////////////////
    ///

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

    /////
    public function getArticle()
    {
        return $this->hasOne(Avtoshkoly::className(), ['id' => 'avtoshkoly_id']);
    }

    public function isAllowed()
    {
        return $this->status;
    }
    public function allow()
    {
        $this->status = self::STATUS_ALLOW;
        return $this->save(false);
    }
    public function disallow()
    {
        $this->status = self::STATUS_DISALLOW;
        return $this->save(false);
    }




}
