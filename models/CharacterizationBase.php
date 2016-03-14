<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog.characterization".
 *
 * @property integer $id
 * @property integer $germplasm_id
 * @property integer $days_to_emergence
 * @property integer $days_to_tasseling
 * @property integer $days_to_slking
 * @property integer $days_to_harvest
 * @property double $tillering_index
 * @property string $stem_color
 * @property string $sheath_pubescence
 * @property double $total_number_of_leaves_per_plant
 * @property double $leaf_length
 * @property double $leaf_width
 * @property string $leaf_orientation
 * @property string $presence_of_leaf_ligule
 * @property double $venation_index
 * @property string $tassel_type
 * @property string $silk_color
 * @property string $tassel_color
 * @property string $plant_height
 * @property string $ear_height
 * @property string $foliage
 * @property string $number_of_leaves_above_upper_ear
 * @property string $number_of_leaves_below_upper_ear
 * @property string $number_of_internodes_below_uppermost_ear
 * @property string $number_of_internodes_on_the_whole_stem
 * @property string $stem_diameter_at_the_base
 * @property string $stem_diameter_below_uppermost_ear
 * @property string $tassel_length
 * @property string $tassel_peduncle_length
 * @property string $tassel_branching_space
 * @property string $number_of_primary_branches_on_tassel
 * @property string $number_of_secondary_branches_on_tassel
 * @property string $number_of_tertiary_branches_on_tassel
 * @property string $stay_green
 * @property integer $days_to_ear_leaf_inflorescence
 * @property integer $stalk_lodging
 * @property string $husk_cover
 * @property string $husk_fitting
 * @property string $husk_tip_shape
 * @property string $ear_shape
 * @property string $ear_tip_shape
 * @property string $ear_orientation
 * @property string $ear_length
 * @property string $ear_diameter
 * @property string $cob_diameter
 * @property string $rachs_diameter
 * @property string $peduncle_length
 * @property string $number_of_bracts
 * @property string $kernel_row_arrangement
 * @property string $number_of_kernel_rows
 * @property string $number_of_kernels__per_row
 * @property string $cob_color
 * @property integer $grain_shedding
 * @property string $kernel_type
 * @property string $kernel_color
 * @property string $kernel_length
 * @property string $kernel_width
 * @property string $kernel_thickness
 * @property string $shape_of_upper_kernel_surface
 * @property string $pericarp_color
 * @property string $aleurone_color
 * @property string $endosperm_color
 * @property double $unshelled_weight
 * @property double $shelled_weight
 * @property double $kernel_weight
 * @property double $shellpc
 * @property integer $creator_id
 * @property string $creation_timestamp
 * @property integer $modifier_id
 * @property string $modification_timestamp
 * @property string $remarks
 * @property string $Notes
 * @property boolean $is_void
 *
 * @property CatalogGermplasm $germplasm
 */
class CharacterizationBase extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'catalog.characterization';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['germplasm_id', 'days_to_emergence', 'days_to_tasseling', 'days_to_slking', 'days_to_harvest', 'days_to_ear_leaf_inflorescence', 'stalk_lodging', 'grain_shedding', 'creator_id', 'modifier_id'], 'integer'],
            [['tillering_index', 'total_number_of_leaves_per_plant', 'leaf_length', 'leaf_width', 'venation_index', 'unshelled_weight', 'shelled_weight', 'kernel_weight', 'shellpc'], 'number'],
            [['stem_color', 'sheath_pubescence', 'leaf_orientation', 'presence_of_leaf_ligule', 'tassel_type', 'silk_color', 'tassel_color', 'plant_height', 'ear_height', 'foliage', 'number_of_leaves_above_upper_ear', 'number_of_leaves_below_upper_ear', 'number_of_internodes_below_uppermost_ear', 'number_of_internodes_on_the_whole_stem', 'stem_diameter_at_the_base', 'stem_diameter_below_uppermost_ear', 'tassel_length', 'tassel_peduncle_length', 'tassel_branching_space', 'number_of_primary_branches_on_tassel', 'number_of_secondary_branches_on_tassel', 'number_of_tertiary_branches_on_tassel', 'stay_green', 'husk_cover', 'husk_fitting', 'husk_tip_shape', 'ear_shape', 'ear_tip_shape', 'ear_orientation', 'ear_length', 'ear_diameter', 'cob_diameter', 'rachs_diameter', 'peduncle_length', 'number_of_bracts', 'kernel_row_arrangement', 'number_of_kernel_rows', 'number_of_kernels__per_row', 'cob_color', 'kernel_type', 'kernel_color', 'kernel_length', 'kernel_width', 'kernel_thickness', 'shape_of_upper_kernel_surface', 'pericarp_color', 'aleurone_color', 'endosperm_color', 'remarks', 'Notes'], 'string'],
            [['creation_timestamp', 'modification_timestamp'], 'safe'],
            [['is_void'], 'boolean']
        ];
    }

    public function fields() {
        return array_merge(parent::fields, array(
            'germplasm'=>function($model){
            if($model->germplasm===null){
                return null;
            }
            }
            ));
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'germplasm_id' => 'Germplasm ID',
            'days_to_emergence' => 'Days To Emergence',
            'days_to_tasseling' => 'Days To Tasseling',
            'days_to_slking' => 'Days To Slking',
            'days_to_harvest' => 'Days To Harvest',
            'tillering_index' => 'Tillering Index',
            'stem_color' => 'Stem Color',
            'sheath_pubescence' => 'Sheath Pubescence',
            'total_number_of_leaves_per_plant' => 'Total Number Of Leaves Per Plant',
            'leaf_length' => 'Leaf Length',
            'leaf_width' => 'Leaf Width',
            'leaf_orientation' => 'Leaf Orientation',
            'presence_of_leaf_ligule' => 'Presence Of Leaf Ligule',
            'venation_index' => 'Venation Index',
            'tassel_type' => 'Tassel Type',
            'silk_color' => 'Silk Color',
            'tassel_color' => 'Tassel Color',
            'plant_height' => 'Plant Height',
            'ear_height' => 'Ear Height',
            'foliage' => 'Foliage',
            'number_of_leaves_above_upper_ear' => 'Number Of Leaves Above Upper Ear',
            'number_of_leaves_below_upper_ear' => 'Number Of Leaves Below Upper Ear',
            'number_of_internodes_below_uppermost_ear' => 'Number Of Internodes Below Uppermost Ear',
            'number_of_internodes_on_the_whole_stem' => 'Number Of Internodes On The Whole Stem',
            'stem_diameter_at_the_base' => 'Stem Diameter At The Base',
            'stem_diameter_below_uppermost_ear' => 'Stem Diameter Below Uppermost Ear',
            'tassel_length' => 'Tassel Length',
            'tassel_peduncle_length' => 'Tassel Peduncle Length',
            'tassel_branching_space' => 'Tassel Branching Space',
            'number_of_primary_branches_on_tassel' => 'Number Of Primary Branches On Tassel',
            'number_of_secondary_branches_on_tassel' => 'Number Of Secondary Branches On Tassel',
            'number_of_tertiary_branches_on_tassel' => 'Number Of Tertiary Branches On Tassel',
            'stay_green' => 'Stay Green',
            'days_to_ear_leaf_inflorescence' => 'Days To Ear Leaf Inflorescence',
            'stalk_lodging' => 'Stalk Lodging',
            'husk_cover' => 'Husk Cover',
            'husk_fitting' => 'Husk Fitting',
            'husk_tip_shape' => 'Husk Tip Shape',
            'ear_shape' => 'Ear Shape',
            'ear_tip_shape' => 'Ear Tip Shape',
            'ear_orientation' => 'Ear Orientation',
            'ear_length' => 'Ear Length',
            'ear_diameter' => 'Ear Diameter',
            'cob_diameter' => 'Cob Diameter',
            'rachs_diameter' => 'Rachs Diameter',
            'peduncle_length' => 'Peduncle Length',
            'number_of_bracts' => 'Number Of Bracts',
            'kernel_row_arrangement' => 'Kernel Row Arrangement',
            'number_of_kernel_rows' => 'Number Of Kernel Rows',
            'number_of_kernels__per_row' => 'Number Of Kernels  Per Row',
            'cob_color' => 'Cob Color',
            'grain_shedding' => 'Grain Shedding',
            'kernel_type' => 'Kernel Type',
            'kernel_color' => 'Kernel Color',
            'kernel_length' => 'Kernel Length',
            'kernel_width' => 'Kernel Width',
            'kernel_thickness' => 'Kernel Thickness',
            'shape_of_upper_kernel_surface' => 'Shape Of Upper Kernel Surface',
            'pericarp_color' => 'Pericarp Color',
            'aleurone_color' => 'Aleurone Color',
            'endosperm_color' => 'Endosperm Color',
            'unshelled_weight' => 'Unshelled Weight',
            'shelled_weight' => 'Shelled Weight',
            'kernel_weight' => 'Kernel Weight',
            'shellpc' => 'Shellpc',
            'creator_id' => 'ID that refers in the users table that created the record.',
            'creation_timestamp' => 'Timestamp when the record is added.',
            'modifier_id' => 'ID that refers in the users table that recently modified the record.',
            'modification_timestamp' => 'Timestamp when the record is moified.',
            'remarks' => 'Additional information about the record.',
            'Notes' => 'Notes',
            'is_void' => 'Is Void',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGermplasm() {
        return $this->hasOne(\app\modules\corn\models\Germplasm::className(), ['id' => 'germplasm_id']);
    }

}
