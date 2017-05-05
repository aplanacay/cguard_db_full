<?php

namespace app\modules\corn\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\corn\models\Germplasm;

/**
 * GermplasmSearch represents the model behind the search form about `app\modules\corn\models\Germplasm`.
 */
class GermplasmSearch extends Germplasm {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'creator_id', 'modifier_id', 'crop_id'], 'integer'],
            [['phl_no', 'creation_timestamp', 'other_number', 'modification_timestamp', 'remarks', 'Notes', 'old_acc_no', 'gb_no', 'collecting_no', 'variety_name', 'dialect', 'grower', 'scientific_name', 'count_coll', 'prov', 'town', 'barangay', 'sitio', 'acq_date', 'latitude', 'longitude', 'altitude', 'coll_source', 'gen_stat', 'sam_type', 'sam_met', 'mat', 'topo', 'site', 'soil_tex', 'drain', 'soil_col', 'ston', 'diseases',
            'viruses',
            'pests'], 'safe'],
            [['is_void'], 'boolean'],
            [['crop',], 'safe']
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

        $phl_no_str = "'(^[0-9]+)'";
        $phl_no_str2 = "'([^0-9_].*$)'";
        $query = \app\modules\corn\models\Germplasm::find()->select(['germplasm.*'])->groupBy('phl_no,id,creator_id,creation_timestamp,modifier_id,modification_timestamp,remarks')->orderBy("(substring(phl_no, {$phl_no_str}))::int, substring(phl_no, {$phl_no_str2})");



        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            // return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'creator_id' => $this->creator_id,
            'creation_timestamp' => $this->creation_timestamp,
            'modifier_id' => $this->modifier_id,
            'modification_timestamp' => $this->modification_timestamp,
            'is_void' => $this->is_void,
            'phl_no' => $this->phl_no,
            'gb_no' => $this->gb_no,
            'old_acc_no' => $this->old_acc_no,
            'other_number' => $this->other_number,
                //      'crop_id' => $this->crop_id,
        ]);
        if (!empty($this->diseases)) {
            $this->diseases = implode(' ', $this->diseases);
        }
        if (!empty($this->viruses)) {
            $this->viruses = implode(' ', $this->viruses);
        }
        if (!empty($this->pests)) {
            $this->pests = implode(' ', $this->pests);
        }
        
        //  $query->andFilterWhere(['ilike', 'phl_no', $this->phl_no])
        $query->andFilterWhere(['ilike', 'remarks', $this->remarks])
                ->andFilterWhere(['ilike', 'Notes', $this->Notes])
                //     ->andFilterWhere(['ilike', 'old_acc_no', $this->old_acc_no])
                //     ->andFilterWhere(['ilike', 'gb_no', $this->gb_no])
                ->andFilterWhere(['ilike', 'collecting_no', $this->collecting_no])
                ->andFilterWhere(['ilike', 'variety_name', $this->variety_name])
                ->andFilterWhere(['ilike', 'dialect', $this->dialect])
                ->andFilterWhere(['ilike', 'grower', $this->grower])
                ->andFilterWhere(['ilike', 'scientific_name', $this->scientific_name])
                ->andFilterWhere(['ilike', 'count_colln', $this->count_coll])
                ->andFilterWhere(['ilike', 'prov', $this->prov])
                ->andFilterWhere(['ilike', 'town', $this->town])
                ->andFilterWhere(['ilike', 'barangay', $this->barangay])
                ->andFilterWhere(['ilike', 'sitio', $this->sitio])
                ->andFilterWhere(['ilike', 'acq_date', $this->acq_date])
                ->andFilterWhere(['ilike', 'latitude', $this->latitude])
                ->andFilterWhere(['ilike', 'longitude', $this->longitude])
                ->andFilterWhere(['ilike', 'altitude', $this->altitude])
                ->andFilterWhere(['ilike', 'coll_source', $this->coll_source])
                ->andFilterWhere(['ilike', 'gen_stat', $this->gen_stat])
                ->andFilterWhere(['ilike', 'sam_type', $this->sam_type])
                ->andFilterWhere(['ilike', 'sam_met', $this->sam_met])
                ->andFilterWhere(['ilike', 'mat', $this->mat])
                ->andFilterWhere(['ilike', 'topo', $this->topo])
                ->andFilterWhere(['ilike', 'site', $this->site])
                ->andFilterWhere(['ilike', 'soil_tex', $this->soil_tex])
                ->andFilterWhere(['ilike', 'drain', $this->drain])
                ->andFilterWhere(['ilike', 'soil_col', $this->soil_col])
                ->andFilterWhere(['ilike', 'ston', $this->ston])
                ->andFilterWhere(['ilike', 'diseases', $this->diseases])
                ->andFilterWhere(['ilike', 'viruses', $this->viruses])
                ->andFilterWhere(['ilike', 'pests', $this->pests])
                ->andFilterWhere(['ilike', 'crop.name', $this->crop]);
        //->andFilterWhere(['ilike', 'tbl_country.name', $this->country]);

        return $query;
    }

}
