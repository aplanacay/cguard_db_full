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
            [['phl_no', 'creation_timestamp', 'modification_timestamp', 'remarks', 'Notes', 'old_acc_no', 'gb_no', 'collecting_no', 'variety_name', 'dialect', 'grower', 'scientific_name', 'count_coll', 'prov', 'town', 'barangay', 'sitio', 'acq_date', 'latitude', 'longitude', 'altitude', 'coll_source', 'gen_stat', 'sam_type', 'sam_met', 'mat', 'topo', 'site', 'soil_tex', 'drain', 'soil_col', 'ston'], 'safe'],
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
        $query = \app\modules\corn\models\Germplasm::find()->select(['germplasm.*'])->groupBy('phl_no,id')->orderBy( "(substring(phl_no, {$phl_no_str}))::int, substring(phl_no, {$phl_no_str2})");
        // $query->joinWith(['crop']);



        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['crop'] = [

            'asc' => ['crop' => SORT_ASC],
            'desc' => ['crop' => SORT_DESC],
            'label' => 'Crop',
            'default' => SORT_ASC
        ];
        


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
            'phl_no' => $this->phl_no,
            'gb_no' => $this->gb_no,
            'old_acc_no' => $this->old_acc_no,
                //      'crop_id' => $this->crop_id,
        ]);

      //  $query->andFilterWhere(['like', 'phl_no', $this->phl_no])
           $query->andFilterWhere(['like', 'remarks', $this->remarks])
                ->andFilterWhere(['like', 'Notes', $this->Notes])
           //     ->andFilterWhere(['like', 'old_acc_no', $this->old_acc_no])
           //     ->andFilterWhere(['like', 'gb_no', $this->gb_no])
                ->andFilterWhere(['like', 'collecting_no', $this->collecting_no])
                ->andFilterWhere(['like', 'variety_name', $this->variety_name])
                ->andFilterWhere(['like', 'dialect', $this->dialect])
                ->andFilterWhere(['like', 'grower', $this->grower])
                ->andFilterWhere(['like', 'scientific_name', $this->scientific_name])
                ->andFilterWhere(['like', 'count_coll', $this->count_coll])
                ->andFilterWhere(['like', 'prov', $this->prov])
                ->andFilterWhere(['like', 'town', $this->town])
                ->andFilterWhere(['like', 'barangay', $this->barangay])
                ->andFilterWhere(['like', 'sitio', $this->sitio])
                ->andFilterWhere(['like', 'acq_date', $this->acq_date])
                ->andFilterWhere(['like', 'latitude', $this->latitude])
                ->andFilterWhere(['like', 'longitude', $this->longitude])
                ->andFilterWhere(['like', 'altitude', $this->altitude])
                ->andFilterWhere(['like', 'coll_source', $this->coll_source])
                ->andFilterWhere(['like', 'gen_stat', $this->gen_stat])
                ->andFilterWhere(['like', 'sam_type', $this->sam_type])
                ->andFilterWhere(['like', 'sam_met', $this->sam_met])
                ->andFilterWhere(['like', 'mat', $this->mat])
                ->andFilterWhere(['like', 'topo', $this->topo])
                ->andFilterWhere(['like', 'site', $this->site])
                ->andFilterWhere(['like', 'soil_tex', $this->soil_tex])
                ->andFilterWhere(['like', 'drain', $this->drain])
                ->andFilterWhere(['like', 'soil_col', $this->soil_col])
                ->andFilterWhere(['like', 'ston', $this->ston])
                ->andFilterWhere(['like', 'crop.name', $this->crop]);
        //->andFilterWhere(['like', 'tbl_country.name', $this->country]);

        return $query;
    }

}
