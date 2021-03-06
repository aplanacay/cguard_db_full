<?php

namespace app\modules\inventory\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\inventory\models\Inventory;

/**
 * InventorySearch represents the model behind the search form about `app\modules\inventory\models\Inventory`.
 */
class InventorySearch extends Inventory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accession_no', 'lot_no'], 'integer'],
            [['store_location', 'date', 'seedref_no', 'store_location_base', 'remarks', 'date_of_harvest'], 'safe'],
            [['packets_active_no', 'packets_base_no', 'seed_weight_active', 'seed_weight_base'], 'number'],
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
        $query = Inventory::find();

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
            'accession_no' => $this->accession_no,
            'packets_active_no' => $this->packets_active_no,
            'packets_base_no' => $this->packets_base_no,
            'seed_weight_active' => $this->seed_weight_active,
            'seed_weight_base' => $this->seed_weight_base,
            'date' => $this->date,
            'lot_no' => $this->lot_no,
            'date_of_harvest' => $this->date_of_harvest,
        ]);

        $query->andFilterWhere(['like', 'store_location', $this->store_location])
            ->andFilterWhere(['like', 'seedref_no', $this->seedref_no])
            ->andFilterWhere(['like', 'store_location_base', $this->store_location_base])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
