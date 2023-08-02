<?php

namespace backend\modules\docs\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\docs\models\Documents;

/**
 * DocumentsSearch represents the model behind the search form of `backend\modules\docs\models\Documents`.
 */
class DocumentsSearch extends Documents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'days_left', 'created_by', 'updated_by', 'categories_id', 'status_id'], 'integer'],
            [['numbers', 'title', 'description', 'expiration_date', 'created_at', 'updated_at', 'ref', 'docs'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Documents::find();

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
            'expiration_date' => $this->expiration_date,
            'days_left' => $this->days_left,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'categories_id' => $this->categories_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'numbers', $this->numbers])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'docs', $this->docs]);

        return $dataProvider;
    }
}
