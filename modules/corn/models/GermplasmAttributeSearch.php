<?php

namespace app\modules\corn\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GermplasmAttributeBase;

/**
 * GermplasmAttributeSearch represents the model behind the search form about `app\models\GermplasmAttributeBase`.
 */
class GermplasmAttributeSearch extends GermplasmAttributeBase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'germplasm_id', 'attribute_id', 'creator_id', 'modifier_id'], 'integer'],
            [['value', 'creation_timestamp', 'modification_timestamp', 'remarks', 'notes'], 'safe'],
            [['is_void'], 'boolean'],
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
        $query = GermplasmAttributeBase::find();

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
            'id' => $this->id,
            'germplasm_id' => $this->germplasm_id,
            'attribute_id' => $this->attribute_id,
            'creator_id' => $this->creator_id,
            'creation_timestamp' => $this->creation_timestamp,
            'modifier_id' => $this->modifier_id,
            'modification_timestamp' => $this->modification_timestamp,
            'is_void' => $this->is_void,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
