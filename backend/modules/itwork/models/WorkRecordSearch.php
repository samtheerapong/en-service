<?php

namespace backend\modules\itwork\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\itwork\models\WorkRecord;

/**
 * WorkRecordSearch represents the model behind the search form of `backend\modules\itwork\models\WorkRecord`.
 */
class WorkRecordSearch extends WorkRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'priority_id', 'work_group_id', 'work_type_id', 'work_status_id'], 'integer'],
            [['work_number', 'title', 'description', 'start_date', 'end_date', 'images', 'docs', 'member'], 'safe'],
            [['cost'], 'number'],
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
        $query = WorkRecord::find();

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
            'priority_id' => $this->priority_id,
            'work_group_id' => $this->work_group_id,
            'work_type_id' => $this->work_type_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'cost' => $this->cost,
            'work_status_id' => $this->work_status_id,
        ]);

        $query->andFilterWhere(['like', 'work_number', $this->work_number])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'docs', $this->docs])
            ->andFilterWhere(['like', 'member', $this->member]);

        return $dataProvider;
    }
}
