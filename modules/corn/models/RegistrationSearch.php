<?php

namespace app\modules\corn\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\corn\models\Registration;

/**
 * RegistrationSearch represents the model behind the search form about `app\modules\corn\models\Registration`.
 */
class RegistrationSearch extends Registration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reg_id'], 'integer'],
            [['cguard_no', 'region_no', 'region_name', 'province', 'variety', 'date_received', 'sample_type', 'remarks', 'apn_no'], 'safe'],
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
        $query = Registration::find();

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
            'reg_id' => $this->reg_id,
        ]);

        $query->andFilterWhere(['like', 'cguard_no', $this->cguard_no])
            ->andFilterWhere(['like', 'region_no', $this->region_no])
            ->andFilterWhere(['like', 'region_name', $this->region_name])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'variety', $this->variety])
            ->andFilterWhere(['like', 'date_received', $this->date_received])
            ->andFilterWhere(['like', 'sample_type', $this->sample_type])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'apn_no', $this->apn_no]);

        return $dataProvider;
    }
}
