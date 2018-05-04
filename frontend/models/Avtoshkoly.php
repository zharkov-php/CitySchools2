<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "avtoshkoly".
 *
 * @property int $id
 * @property string $name
 * @property string $name_url
 * @property string $logo
 * @property string $card
 * @property string $text
 * @property string $adress
 * @property string $phone
 * @property string $mail
 * @property string $price_schools
 * @property string $sale
 * @property string $lesson_length
 * @property string $lessons_grafic
 * @property string $additional_lesson
 * @property string $autopark
 * @property string $date_register
 * @property string $date_birth
 * @property int $hide
 * @property string $category_widget
 * @property string $zone_widget
 * @property string $price_widget
 * @property string $link
 * @property string $site
 * @property string $title
 * @property string $price_plus
 * @property string $lessons_schedule
 */
class Avtoshkoly extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avtoshkoly';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['text', 'adress', 'price_schools', 'autopark', 'title_seo', 'keywords_seo', 'description_seo'], 'string'],
            [['date_register'], 'safe'],
            [['date_birth'], 'integer'],
            [['name', 'logo', 'card', 'phone', 'mail', 'sale', 'lesson_length', 'lessons_grafic', 'additional_lesson', 'zone_widget', 'price_widget', 'link', 'site', 'title', 'price_plus', 'lessons_schedule'], 'string', 'max' => 255],
            [['hide'], 'string', 'max' => 11],
            [['category_widget'], 'string', 'max' => 25],
            [['name', 'name_url'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_url' => 'Name_Url',
            'logo' => 'Logo',
            'card' => 'Card',
            'text' => 'Text',
            'adress' => 'Adress',
            'phone' => 'Phone',
            'mail' => 'Mail',
            'price_schools' => 'Price Schools',
            'sale' => 'Sale',
            'lesson_length' => 'Lesson Length',
            'lessons_grafic' => 'Lessons Grafic',
            'additional_lesson' => 'Additional Lesson',
            'autopark' => 'Autopark',
            'date_register' => 'Date Register',
            'date_birth' => 'Date Birth',
            'hide' => 'Hide',
            'category_widget' => 'Category Widget',
            'zone_widget' => 'Zone Widget',
            'price_widget' => 'Price Widget',
            'link' => 'Link',
            'site' => 'Site',
            'title' => 'Title',
            'price_plus' => 'Price Plus',
            'lessons_schedule' => 'Lessons Schedule',
            'title_seo' => 'Title_seo',
            'keywords_seo' => 'Keywords_seo',
            'description_seo' => 'Description_seo',
        ];
    }


         /**
         * @return mixed
         */
    public function getNameUrl()
    {
        return ($this->name_url) ? $this->name_url : $this->getId();
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
        $redis->sadd("schools:{$this->getId()}:likes", $user->getId());
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
        $redis->srem("schools:{$this->getId()}:likes", $user->getId());
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
        return $redis->scard("schools:{$this->getId()}:likes");
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
        return $redis->sismember("schools:{$this->getId()}:likes", $user->getId());
    }


/////////////////////////////////////////////////////////////////
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['avtoshkoly_id'=>'id']);
    }







}
