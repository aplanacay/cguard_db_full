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
class Characterization extends CharacterizationBase {
public $phl_no;
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'germplasm_id', 'days_to_emergence', 'days_to_tasseling', 'days_to_slking', 'days_to_harvest', 'days_to_ear_leaf_inflorescence', 'stalk_lodging', 'grain_shedding', 'creator_id', 'modifier_id'], 'integer'],
            [['tillering_index', 'total_number_of_leaves_per_plant', 'leaf_length', 'leaf_width', 'venation_index', 'unshelled_weight', 'shelled_weight', 'kernel_weight', 'shellpc'], 'number'],
            [['stem_color', 'sheath_pubescence', 'leaf_orientation', 'presence_of_leaf_ligule', 'tassel_type', 'silk_color', 'tassel_color', 'plant_height', 'ear_height', 'foliage', 'number_of_leaves_above_upper_ear', 'number_of_leaves_below_upper_ear', 'number_of_internodes_below_uppermost_ear', 'number_of_internodes_on_the_whole_stem', 'stem_diameter_at_the_base', 'stem_diameter_below_uppermost_ear', 'tassel_length', 'tassel_peduncle_length', 'tassel_branching_space', 'number_of_primary_branches_on_tassel', 'number_of_secondary_branches_on_tassel', 'number_of_tertiary_branches_on_tassel', 'stay_green', 'husk_cover', 'husk_fitting', 'husk_tip_shape', 'ear_shape', 'ear_tip_shape', 'ear_orientation', 'ear_length', 'ear_diameter', 'cob_diameter', 'rachs_diameter', 'peduncle_length', 'number_of_bracts', 'kernel_row_arrangement', 'number_of_kernel_rows', 'number_of_kernels__per_row', 'cob_color', 'kernel_type', 'kernel_color', 'kernel_length', 'kernel_width', 'kernel_thickness', 'shape_of_upper_kernel_surface', 'pericarp_color', 'aleurone_color', 'endosperm_color', 'creation_timestamp', 'modification_timestamp', 'remarks', 'Notes'], 'safe'],
            [['phl_no'],'safe'],
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
