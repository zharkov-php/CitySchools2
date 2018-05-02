<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "instructor".
 *
 * @property int $id
 * @property int $avtoshkoly_id
 * @property string $name
 * @property string $image
 * @property string $email
 * @property string $title
 * @property string $adress
 * @property string $phone
 * @property string $price
 * @property string $price_plus
 * @property string $lesson_grafic
 * @property string $sale
 * @property string $car
 * @property string $city
 * @property string $text
 * @property string $date_register
 * @property int $status
 * @property string $zone_widget
 * @property string $price_widget
 * @property string $category_widget
 * @property string $title_seo
 * @property string $keywords_seo
 * @property string $description_seo
 */
class Instructor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instructor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'name'], 'required'],
            [['avtoshkoly_id', 'status'], 'integer'],
            [['image', 'text', 'title_seo', 'keywords_seo', 'description_seo'], 'string'],
            [['date_register'], 'safe'],
            [['name', 'title', 'adress', 'phone', 'price', 'price_plus', 'lesson_grafic', 'sale', 'car', 'city', 'zone_widget', 'price_widget', 'category_widget'], 'string', 'max' => 250],
            [['email'], 'string', 'max' => 50],

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
            'name' => 'Name',
            'image' => 'Image',
            'email' => 'Email',
            'title' => 'Title',
            'adress' => 'Adress',
            'phone' => 'Phone',
            'price' => 'Price',
            'price_plus' => 'Price Plus',
            'lesson_grafic' => 'Lesson Grafic',
            'sale' => 'Sale',
            'car' => 'Car',
            'city' => 'City',
            'text' => 'Text',
            'date_register' => 'Date Register',
            'status' => 'Status',
            'zone_widget' => 'Zone Widget',
            'price_widget' => 'Price Widget',
            'category_widget' => 'Category Widget',
            'title_seo' => 'Title Seo',
            'keywords_seo' => 'Keywords Seo',
            'description_seo' => 'Description Seo',
        ];
    }
    public function getComments()
    {
        return $this->hasMany(CommentsInstructor::className(), ['instructor_id'=>'id']);
    }


    //////////////////////////////////////////
/// LIKE and DISLIKE
    /**
     * Like current post by given user
     * @param \frontend\models\User $user
     */
    public function like(User $user)
    {
        /* @var $redis Connection */
        $redis = Yii::$app->redis;
        $redis->sadd("instructors:{$this->getId()}:likes", $user->getId());
        $redis->sadd("user:{$user->getId()}:likes", $this->getId());
    }
    /**
     * Unlike current post by given user
     * @param \frontend\models\User $user
     */
    public function unLike(User $user)
    {
        /* @var $redis Connection */
        $redis = Yii::$app->redis;
        $redis->srem("instructors:{$this->getId()}:likes", $user->getId());
        $redis->srem("user:{$user->getId()}:likes", $this->getId());
    }
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function countLikes()
    {
        /* @var $redis Connection */
        $redis = Yii::$app->redis;
        return $redis->scard("instructors:{$this->getId()}:likes");
    }
    /**
     * Check whether given user liked current post
     * @param \frontend\models\User $user
     * @return integer
     */
    public function isLikedBy(User $user)
    {
        /* @var $redis Connection */
        $redis = Yii::$app->redis;
        return $redis->sismember("instructors:{$this->getId()}:likes", $user->getId());
    }
    /////////////////////////////////////////////////////////////////
/// LIKE and DISLIKE

}
