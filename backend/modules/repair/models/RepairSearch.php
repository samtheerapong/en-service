<?php

namespace backend\modules\repair\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\repair\models\Repair;

/**
 * RepairSearch represents the model behind the search form of `backend\modules\repair\models\Repair`.
 */
class RepairSearch extends Repair
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'repair_priority_id', 'repair_status_id','department_id','repair_team_id'], 'integer'],
            [['ticket_number', 'title', 'details', 'request_date', 'created_at', 'updated_at', 'location', 'docs', 'ref','requester_name'], 'safe'],
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
        $query = Repair::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'repair_priority_id' => $this->repair_priority_id,
            'repair_status_id' => $this->repair_status_id,
            'department_id' => $this->department_id,
            'repair_team_id' => $this->repair_team_id,
        ]);

        $query->andFilterWhere(['like', 'ticket_number', $this->ticket_number])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'requester_name', $this->requester_name])
            ->andFilterWhere(['like', 'request_date', $this->request_date])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'docs', $this->docs]);

        return $dataProvider;
    }
}
