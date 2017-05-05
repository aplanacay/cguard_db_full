<?php

namespace app\modules\regeneration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\regeneration\models\Regeneration;

/**
 * RegenerationSearch represents the model behind the search form about `app\modules\regeneration\models\Regeneration`.
 */
class RegenerationSearch extends Regeneration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accession_no', 'seed_ref_no', 'date'], 'safe'],
            [['lot_no'], 'integer'],
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
        $query = Regeneration::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'lot_no' => $this->lot_no,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'accession_no', $this->accession_no])
            ->andFilterWhere(['like', 'seed_ref_no', $this->seed_ref_no]);

        return $dataProvider;
    }
}
