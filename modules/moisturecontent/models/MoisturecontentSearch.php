<?php

namespace app\modules\moisturecontent\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\moisturecontent\models\moisturecontent;

/**
 * MoisturecontentSearch represents the model behind the search form about `app\modules\moisturecontent\models\moisturecontent`.
 */
class MoisturecontentSearch extends moisturecontent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mcref_no', 'collection_id', 'cropping_season', 'date_tested', 'remarks'], 'safe'],
            [['percentage'], 'number'],
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
        $query = moisturecontent::find();

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
            'date_tested' => $this->date_tested,
            'percentage' => $this->percentage,
        ]);

        $query->andFilterWhere(['like', 'mcref_no', $this->mcref_no])
            ->andFilterWhere(['like', 'collection_id', $this->collection_id])
            ->andFilterWhere(['like', 'cropping_season', $this->cropping_season])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
