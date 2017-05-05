<?php

namespace app\modules\corn\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CharacterizationBase;
use kartik\builder\Form;

/**
 * CharacterizationSearch represents the model behind the search form about `app\models\CharacterizationBase`.
 */
class CharacterizationSearch extends Characterization {

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Characterization::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if (!empty($this->stem_color)) {
            $this->stem_color = implode(' ', $this->stem_color);
        }
         if (!empty($this->sheath_pubescence)) {
            $this->sheath_pubescence = implode(' ', $this->sheath_pubescence);
        }
         if (!empty($this->kernel_type)) {
            $this->kernel_type = implode(' ', $this->kernel_type);
        }
        if (!empty($this->kernel_color)) {
            $this->kernel_color = implode(' ', $this->kernel_color);
        }

        if (isset($this->id)) {
            $query->andFilterWhere(['id' => $this->id]);
        }
        if (isset($this->germplasm_id)) {
            $query->andFilterWhere(['germplasm_id' => $this->germplasm_id]);
        }if (isset($this->days_to_emergence)) {
            $query->andFilterWhere(['days_to_emergence' => $this->days_to_emergence]);
        }if (isset($this->days_to_tasseling)) {
            $query->andFilterWhere(['days_to_tasseling' => $this->days_to_tasseling]);
        }if (isset($this->days_to_slking)) {
            $query->andFilterWhere(['days_to_slking' => $this->days_to_slking]);
        }if (isset($this->days_to_harvest)) {
            $query->andFilterWhere(['days_to_harvest' => $this->days_to_harvest]);
        }if (isset($this->tillering_index)) {
            $query->andFilterWhere(['tillering_index' => $this->tillering_index]);
        }if (isset($this->total_number_of_leaves_per_plant)) {
            $query->andFilterWhere(['total_number_of_leaves_per_plant' => $this->total_number_of_leaves_per_plant]);
        }if (isset($this->leaf_length)) {
            $query->andFilterWhere(['leaf_length' => $this->leaf_length]);
        }if (isset($this->leaf_width)) {
            $query->andFilterWhere(['leaf_width' => $this->leaf_width]);
        }if (isset($this->venation_index)) {
            $query->andFilterWhere(['venation_index' => $this->venation_index]);
        }if (isset($this->days_to_ear_leaf_inflorescence)) {
            $query->andFilterWhere(['days_to_ear_leaf_inflorescence' => $this->days_to_ear_leaf_inflorescence]);
        }if (isset($this->stalk_lodging)) {
            $query->andFilterWhere(['stalk_lodging' => $this->stalk_lodging]);
        }if (isset($this->grain_shedding)) {
            $query->andFilterWhere(['grain_shedding' => $this->grain_shedding]);
        }if (isset($this->unshelled_weight)) {
            $query->andFilterWhere(['unshelled_weight' => $this->unshelled_weight]);
        }if (isset($this->shelled_weight)) {
            $query->andFilterWhere(['shelled_weight' => $this->shelled_weight]);
        }if (isset($this->kernel_weight)) {
            $query->andFilterWhere(['kernel_weight' => $this->kernel_weight]);
        }if (isset($this->shellpc)) {
            $query->andFilterWhere(['shellpc' => $this->shellpc]);
        }if (isset($this->stem_color)) {
            $query->andFilterWhere(['ilike', 'stem_color', $this->stem_color]);
        }if (isset($this->sheath_pubescence)) {
            $query->andFilterWhere(['ilike', 'sheath_pubescence', $this->sheath_pubescence]);
        }if (isset($this->leaf_orientation)) {
            $query->andFilterWhere(['ilike', 'leaf_orientation', $this->leaf_orientation]);
        }if (isset($this->presence_of_leaf_ligule)) {
            $query->andFilterWhere(['ilike', 'presence_of_leaf_ligule', $this->presence_of_leaf_ligule]);
        }if (isset($this->tassel_type)) {
            $query->andFilterWhere(['ilike', 'tassel_type', $this->tassel_type]);
        }if (isset($this->silk_color)) {
            $query->andFilterWhere(['ilike', 'silk_color', $this->silk_color]);
        }if (isset($this->tassel_color)) {
            $query->andFilterWhere(['ilike', 'tassel_color', $this->tassel_color]);
        }if (isset($this->plant_height)) {
            $query->andFilterWhere(['ilike', 'plant_height', $this->plant_height]);
        }if (isset($this->ear_height)) {
            $query->andFilterWhere(['ilike', 'ear_height', $this->ear_height]);
        }if (isset($this->foliage)) {
            $query->andFilterWhere(['ilike', 'foliage', $this->foliage]);
        }if (isset($this->number_of_leaves_above_upper_ear)) {
            $query->andFilterWhere(['ilike', 'number_of_leaves_above_upper_ear', $this->number_of_leaves_above_upper_ear]);
        }if (isset($this->number_of_leaves_below_upper_ear)) {
            $query->andFilterWhere(['ilike', 'number_of_leaves_below_upper_ear', $this->number_of_leaves_below_upper_ear]);
        }if (isset($this->number_of_internodes_below_uppermost_ear)) {
            $query->andFilterWhere(['ilike', 'number_of_internodes_below_uppermost_ear', $this->number_of_internodes_below_uppermost_ear]);
        }if (isset($this->number_of_internodes_on_the_whole_stem)) {
            $query->andFilterWhere(['ilike', 'number_of_internodes_on_the_whole_stem', $this->number_of_internodes_on_the_whole_stem]);
        }if (isset($this->stem_diameter_at_the_base)) {
            $query->andFilterWhere(['ilike', 'stem_diameter_at_the_base', $this->stem_diameter_at_the_base]);
        }if (isset($this->stem_diameter_below_uppermost_ear)) {
            $query->andFilterWhere(['ilike', 'stem_diameter_below_uppermost_ear', $this->stem_diameter_below_uppermost_ear]);
        }if (isset($this->tassel_length)) {
            $query->andFilterWhere(['ilike', 'tassel_length', $this->tassel_length]);
        }if (isset($this->tassel_peduncle_length)) {
            $query->andFilterWhere(['ilike', 'tassel_peduncle_length', $this->tassel_peduncle_length]);
        }if (isset($this->tassel_branching_space)) {
            $query->andFilterWhere(['ilike', 'tassel_branching_space', $this->tassel_branching_space]);
        }if (isset($this->number_of_primary_branches_on_tassel)) {
            $query->andFilterWhere(['ilike', 'number_of_primary_branches_on_tassel', $this->number_of_primary_branches_on_tassel]);
        }if (isset($this->number_of_secondary_branches_on_tassel)) {
            $query->andFilterWhere(['ilike', 'number_of_secondary_branches_on_tassel', $this->number_of_secondary_branches_on_tassel]);
        }if (isset($this->number_of_tertiary_branches_on_tassel)) {
            $query->andFilterWhere(['ilike', 'number_of_tertiary_branches_on_tassel', $this->number_of_tertiary_branches_on_tassel]);
        }if (isset($this->stay_green)) {
            $query->andFilterWhere(['ilike', 'stay_green', $this->stay_green]);
        }if (isset($this->husk_cover)) {
            $query->andFilterWhere(['ilike', 'husk_cover', $this->husk_cover]);
        }if (isset($this->husk_fitting)) {
            $query->andFilterWhere(['ilike', 'husk_fitting', $this->husk_fitting]);
        }if (isset($this->husk_tip_shape)) {
            $query->andFilterWhere(['ilike', 'husk_tip_shape', $this->husk_tip_shape]);
        }if (isset($this->ear_shape)) {
            $query->andFilterWhere(['ilike', 'ear_shape', $this->ear_shape]);
        }if (isset($this->ear_tip_shape)) {
            $query->andFilterWhere(['ilike', 'ear_tip_shape', $this->ear_tip_shape]);
        }if (isset($this->ear_orientation)) {
            $query->andFilterWhere(['ilike', 'ear_orientation', $this->ear_orientation]);
        }if (isset($this->ear_length)) {
            $query->andFilterWhere(['ilike', 'ear_length', $this->ear_length]);
        }if (isset($this->ear_diameter)) {
            $query->andFilterWhere(['ilike', 'ear_diameter', $this->ear_diameter]);
        }if (isset($this->cob_diameter)) {
            $query->andFilterWhere(['ilike', 'cob_diameter', $this->cob_diameter]);
        }if (isset($this->rachs_diameter)) {
            $query->andFilterWhere(['ilike', 'rachs_diameter', $this->rachs_diameter]);
        }if (isset($this->peduncle_length)) {
            $query->andFilterWhere(['ilike', 'peduncle_length', $this->peduncle_length]);
        }if (isset($this->number_of_bracts)) {
            $query->andFilterWhere(['ilike', 'number_of_bracts', $this->number_of_bracts]);
        }if (isset($this->kernel_row_arrangement)) {
            $query->andFilterWhere(['ilike', 'kernel_row_arrangement', $this->kernel_row_arrangement]);
        }if (isset($this->number_of_kernel_rows)) {
            $query->andFilterWhere(['ilike', 'number_of_kernel_rows', $this->number_of_kernel_rows]);
        }if (isset($this->number_of_kernels__per_row)) {
            $query->andFilterWhere(['ilike', 'number_of_kernels__per_row', $this->number_of_kernels__per_row]);
        }if (isset($this->cob_color)) {
            $query->andFilterWhere(['ilike', 'cob_color', $this->cob_color]);
        }if (isset($this->kernel_type)) {
            $query->andFilterWhere(['ilike', 'kernel_type', $this->kernel_type]);
        }if (isset($this->kernel_color)) {
            $query->andFilterWhere(['ilike', 'kernel_color', $this->kernel_color]);
        }if (isset($this->kernel_length)) {
            $query->andFilterWhere(['ilike', 'kernel_length', $this->kernel_length]);
        }if (isset($this->kernel_width)) {
            $query->andFilterWhere(['ilike', 'kernel_width', $this->kernel_width]);
        }if (isset($this->kernel_thickness)) {
            $query->andFilterWhere(['ilike', 'kernel_thickness', $this->kernel_thickness]);
        }if (isset($this->shape_of_upper_kernel_surface)) {
            $query->andFilterWhere(['ilike', 'shape_of_upper_kernel_surface', $this->shape_of_upper_kernel_surface]);
        }if (isset($this->pericarp_color)) {
            $query->andFilterWhere(['ilike', 'pericarp_color', $this->pericarp_color]);
        }if (isset($this->aleurone_color)) {
            $query->andFilterWhere(['ilike', 'aleurone_color', $this->aleurone_color]);
        }if (isset($this->endosperm_color)) {
            $query->andFilterWhere(['ilike', 'endosperm_color', $this->endosperm_color]);
        }




        $query->andFilterWhere(['ilike', 'remarks', $this->remarks])
                ->andFilterWhere(['ilike', 'Notes', $this->Notes]);

        return $query;
    }

    public function getFormAttribs() {
        return [
//            'username' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
//            'password' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
//            'rememberMe' => ['type' => Form::INPUT_CHECKBOX],
//            'actions' => ['type' => Form::INPUT_RAW, 'value' => Html::submitButton('Submit', ['class' => 'btn btn-primary'])]
            'days_to_emergence' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'days_to_tasseling' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'days_to_silking' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'days_to_harvest' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'tillering_index' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'stem_color' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'sheath_pubescence' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'total_number_of_leaves_per_plant' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'leaf_length' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'leaf_orientation' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
            'username' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '']],
        ];
    }

}
