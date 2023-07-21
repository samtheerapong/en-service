<?php

namespace backend\modules\repair\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\repair\models\Repairman;

/**
 * RepairmanSearch represents the model behind the search form of `backend\modules\repair\models\Repairman`.
 */
class RepairmanSearch extends Repairman
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'repair_type_id'], 'integer'],
            [['ticket_number', 'technician_team', 'repair_start', 'repair_end', 'spare_part', 'image', 'comment'], 'safe'],
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
        $query = Repairman::find();

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
            'ticket_id' => $this->ticket_id,
            'repair_start' => $this->repair_start,
            'repair_end' => $this->repair_end,
            'repair_type_id' => $this->repair_type_id,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['like', 'ticket_number', $this->ticket_number])
            ->andFilterWhere(['like', 'technician_team', $this->technician_team])
            ->andFilterWhere(['like', 'spare_part', $this->spare_part])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
