<?php

namespace app\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "catalog.germplasm".
 *
 * @property integer $id
 * @property string $phl_no
 * @property integer $creator_id
 * @property string $creation_timestamp
 * @property integer $modifier_id
 * @property string $modification_timestamp
 * @property string $remarks
 * @property string $Notes
 * @property boolean $is_void
 */
class Germplasm extends \app\models\GermplasmBase {

    //public $variety_name;
    public $crop;
   // public $grower;

    public function rules() {
        $rules = parent::rules();
        return \yii\helpers\ArrayHelper::merge($rules, [[['crop',], 'safe'],]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'phl_no' => 'Phl No',
            'creator_id' => 'Creator ID',
            'creation_timestamp' => 'Creation Timestamp',
            'modifier_id' => 'Modifier ID',
            'modification_timestamp' => 'Modification Timestamp',
            'remarks' => 'Remarks',
            'Notes' => 'Notes',
            'is_void' => 'Is Void',
            'crop_id' => 'Crop ID',
            'old_acc_no' => 'Old Acc No',
            'gb_no' => 'Gb No',
            'collecting_no' => 'Collecting No',
            'variety_name' => 'Local/Variety Name',
            'dialect' => 'Dialect',
            'grower' => 'Source/grower',
            'scientific_name' => 'Scientific Name',
            'count_coll' => 'Country',
            'prov' => 'Province',
            'town' => 'Town',
            'barangay' => 'Barangay',
            'sitio' => 'Sitio',
            'acq_date' => 'Acquisition Date',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'coll_source' => 'Collecting Source',
            'gen_stat' => 'Genetic Status',
            'sam_type' => 'Sample Type',
            'sam_met' => 'Sampling Method',
            'mat' => 'Material Collected',
            'topo' => 'Topography',
            'site' => 'Site',
            'soil_tex' => 'Soil Tex',
            'drain' => 'Drainage',
            'soil_col' => 'Soil Color',
            'ston' => 'Stoniness',
                // 'crop'=> 'Crop'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrop() {
        return $this->hasOne(Crop::className(), ['id' => 'crop_id']);
    }

}
