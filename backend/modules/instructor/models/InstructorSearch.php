<?php

namespace backend\modules\instructor\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Instructor;

/**
 * InstructorSearch represents the model behind the search form of `frontend\models\Instructor`.
 */
class InstructorSearch extends Instructor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'avtoshkoly_id', 'status'], 'integer'],
            [['name', 'image', 'email', 'title', 'adress', 'phone', 'price', 'price_plus', 'lesson_grafic', 'sale', 'car', 'city', 'text', 'date_register', 'zone_widget', 'price_widget', 'category_widget', 'title_seo', 'keywords_seo', 'description_seo'], 'safe'],
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
        $query = Instructor::find();

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
            'id' => $this->id,
            'avtoshkoly_id' => $this->avtoshkoly_id,
            'date_register' => $this->date_register,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'price_plus', $this->price_plus])
            ->andFilterWhere(['like', 'lesson_grafic', $this->lesson_grafic])
            ->andFilterWhere(['like', 'sale', $this->sale])
            ->andFilterWhere(['like', 'car', $this->car])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'zone_widget', $this->zone_widget])
            ->andFilterWhere(['like', 'price_widget', $this->price_widget])
            ->andFilterWhere(['like', 'category_widget', $this->category_widget])
            ->andFilterWhere(['like', 'title_seo', $this->title_seo])
            ->andFilterWhere(['like', 'keywords_seo', $this->keywords_seo])
            ->andFilterWhere(['like', 'description_seo', $this->description_seo]);

        return $dataProvider;
    }
}
