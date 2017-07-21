<?php

namespace app\modules\corn\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
//use app\modules\corn\models\Germplasm;
use app\models\RegistrationBase;
/**
 * GermplasmSearch represents the model behind the search form about `app\modules\corn\models\Germplasm`.
 */
class RegistrationSearch extends RegistrationBase {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['reg_id'], 'integer'],
            //[['phl_no', 'other_number', 'old_acc_no', 'gb_no', 'collecting_no', 'variety_name', 'scientific_name', 'count_coll', 'prov', 'acq_date'], 'safe']
            [['cguard_no', 'region_no', 'region_name', 'province', 'variety', 'date_received', 'sample_type', 'remarks', 'apn_no'], 'safe']
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

        /*$phl_no_str = "'(^[0-9]+)'";
        $phl_no_str2 = "'([^0-9_].*$)'";
        $query = RegistrationBase::find()->select(['registration.*'])->groupBy('phl_no,id')->orderBy("(substring(phl_no, {$phl_no_str}))::int, substring(phl_no, {$phl_no_str2})");*/

        $apn_no_str = "'(^[0-9]+)'";
        $apn_no_str2 = "'([^0-9_].*$)'";
        $query = RegistrationBase::find()->select(['registration.*'])->groupBy('apn_no,id')->orderBy("(substring(apn_no, {$apn_no_str}))::int, substring(apn_no, {$apn_no_str2})");



        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            // return $dataProvider;
        }

        $query->andFilterWhere([
            /*'id' => $this->id,
            'phl_no' => $this->phl_no,
            'gb_no' => $this->gb_no,
            'old_acc_no' => $this->old_acc_no,
            'other_number' => $this->other_number,*/

            'reg_id' => $this->reg_id,
            'cguard_no' => $this->cguard_no,
            'region_no' => $this->region_no,
            'date_received' => $this->date_received,
            'apn_no' => $this->apn_no,
                //      'crop_id' => $this->crop_id,
        ]);
   /*     if (!empty($this->diseases)) {
            $this->diseases = implode(' ', $this->diseases);
        }
        if (!empty($this->viruses)) {
            $this->viruses = implode(' ', $this->viruses);
        }
        if (!empty($this->pests)) {
            $this->pests = implode(' ', $this->pests);
        } */
        
        //  $query->andFilterWhere(['ilike', 'phl_no', $this->phl_no])
        /*$query->andFilterWhere(['ilike', 'collecting_no', $this->collecting_no])
                //     ->andFilterWhere(['ilike', 'old_acc_no', $this->old_acc_no])
                //     ->andFilterWhere(['ilike', 'gb_no', $this->gb_no])
                ->andFilterWhere(['ilike', 'variety_name', $this->variety_name])
                ->andFilterWhere(['ilike', 'scientific_name', $this->scientific_name])
                ->andFilterWhere(['ilike', 'count_colln', $this->count_coll])
                ->andFilterWhere(['ilike', 'prov', $this->prov])
                ->andFilterWhere(['ilike', 'acq_date', $this->acq_date]);*/
        //->andFilterWhere(['ilike', 'tbl_country.name', $this->country]);

        $query->andFilterWhere(['ilike', 'region_name', $this->region_name])                
                ->andFilterWhere(['ilike', 'province', $this->province])
                ->andFilterWhere(['ilike', 'variety', $this->variety])
                ->andFilterWhere(['ilike', 'sample_type', $this->sample_type])
                ->andFilterWhere(['ilike', 'remarks', $this->remarks]);             

        return $query;
    }

}
