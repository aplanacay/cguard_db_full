<?php

namespace app\modules\catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GermplasmBase;

/**
 * GermplasmSearch represents the model behind the search form about `\app\models\GermplasmBase`.
 */
class GermplasmSearch extends GermplasmBase {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'creator_id', 'modifier_id', 'crop_id'], 'integer'],
            [['phl_no', 'creation_timestamp', 'modification_timestamp', 'remarks', 'Notes'], 'safe'],
            [['is_void'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = GermplasmBase::find();

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
            'creator_id' => $this->creator_id,
            'creation_timestamp' => $this->creation_timestamp,
            'modifier_id' => $this->modifier_id,
            'modification_timestamp' => $this->modification_timestamp,
            'is_void' => $this->is_void,
            'crop_id' => $this->crop_id,
        ]);

        $query->andFilterWhere(['like', 'phl_no', $this->phl_no])
                ->andFilterWhere(['like', 'remarks', $this->remarks])
                ->andFilterWhere(['like', 'Notes', $this->Notes]);

        return $dataProvider;
    }

}
