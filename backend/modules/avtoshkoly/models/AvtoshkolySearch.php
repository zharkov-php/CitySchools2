<?php

namespace backend\modules\avtoshkoly\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Avtoshkoly;

/**
 * AvtoshkolySearch represents the model behind the search form of `frontend\models\Avtoshkoly`.
 */
class AvtoshkolySearch extends Avtoshkoly
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'name_url', 'logo', 'card', 'text', 'adress', 'phone', 'mail', 'price_schools', 'sale', 'lesson_length', 'lessons_grafic', 'additional_lesson', 'autopark', 'date_register', 'hide', 'category_widget', 'zone_widget', 'price_widget', 'link', 'site', 'title', 'title_seo', 'keywords_seo', 'description_seo', 'price_plus', 'lessons_schedule'], 'safe'],
            [['city', 'price', 'date_birth'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Avtoshkoly::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'city' => $this->city,
            'price' => $this->price,
            'date_register' => $this->date_register,
            'date_birth' => $this->date_birth,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_url', $this->name_url])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'card', $this->card])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'price_schools', $this->price_schools])
            ->andFilterWhere(['like', 'sale', $this->sale])
            ->andFilterWhere(['like', 'lesson_length', $this->lesson_length])
            ->andFilterWhere(['like', 'lessons_grafic', $this->lessons_grafic])
            ->andFilterWhere(['like', 'additional_lesson', $this->additional_lesson])
            ->andFilterWhere(['like', 'autopark', $this->autopark])
            ->andFilterWhere(['like', 'hide', $this->hide])
            ->andFilterWhere(['like', 'category_widget', $this->category_widget])
            ->andFilterWhere(['like', 'zone_widget', $this->zone_widget])
            ->andFilterWhere(['like', 'price_widget', $this->price_widget])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_seo', $this->title_seo])
            ->andFilterWhere(['like', 'keywords_seo', $this->keywords_seo])
            ->andFilterWhere(['like', 'description_seo', $this->description_seo])
            ->andFilterWhere(['like', 'price_plus', $this->price_plus])
            ->andFilterWhere(['like', 'lessons_schedule', $this->lessons_schedule]);

        return $dataProvider;
    }
}
