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
            [['accession_no', 'lot_no', 'seedref_no'], 'string'],
            [['store_location', 'date'], 'safe'],
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['seedref_no','accession_no']],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'seedref_no' => $this->seedref_no,
            'accession_no' => $this->accession_no,
            'lot_no' => $this->lot_no,
            'packets_active_no' => $this->packets_active_no,
            'packets_base_no' => $this->packets_base_no,
            'seed_weight_active' => $this->seed_weight_active,
            'seed_weight_base' => $this->seed_weight_base,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'store_location', $this->store_location]);

        return $dataProvider;
    }
}
