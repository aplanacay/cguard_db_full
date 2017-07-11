<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog.germplasm".
 *
 * @property integer $id
 * @property string $phl_no
 * @property string $other_number
 * @property integer $creator_id
 * @property string $creation_timestamp
 * @property integer $modifier_id
 * @property string $modification_timestamp
 * @property string $remarks
 * @property string $Notes
 * @property boolean $is_void
 * @property integer $crop_id
 * @property string $old_acc_no
 * @property string $gb_no
 * @property string $collecting_no
 * @property string $variety_name
 * @property string $dialect
 * @property string $grower
 * @property string $scientific_name
 * @property string $count_coll
 * @property string $prov
 * @property string $town
 * @property string $barangay
 * @property string $sitio
 * @property string $acq_date
 * @property string $latitude
 * @property string $longitude
 * @property string $altitude
 * @property string $coll_source
 * @property string $gen_stat
 * @property string $sam_type
 * @property string $sam_met
 * @property string $mat
 * @property string $topo
 * @property string $site
 * @property string $soil_tex
 * @property string $drain
 * @property string $soil_col
 * @property string $ston
 *
 * @property MasterCrop $crop
 */
class RegistrationBase extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'catalog.registration';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            /*[['phl_no', 'old_acc_no', 'gb_no', 'collecting_no', 'other_number', 'variety_name', 'scientific_name', 'count_coll', 'prov', 'acq_date'], 'string'],
            [['phl_no', 'old_acc_no', 'gb_no',], 'required'],*/
            [['cguard_no', 'region_no', 'region_name', 'province', 'variety', 'date_received', 'sample_type', 'remarks', 'apn_no'], 'string'],
            [['cguard_no', 'apn_no'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            // 'id' => 'ID',
            // 'phl_no' => 'Phl No',
            // 'other_number' => 'Other Number',
            // 'old_acc_no' => 'Old Acc No',
            // 'gb_no' => 'Gb No',
            // 'collecting_no' => 'Collecting No',
            // 'variety_name' => 'Local/Variety Name',
            // 'scientific_name' => 'Scientific Name',
            // 'count_coll' => 'Country',
            // 'prov' => 'Province',
            // 'acq_date' => 'Acq Date',

            'reg_id' => 'ID',
            'cguard_no' => 'CGUARD #',
            'region_no' => 'Region #',
            'region_name' => 'Region',
            'province' => 'Province',
            'variety' => 'Variety',
            'date_received' => 'Date Received',
            'sample_type' => 'Sample Type',
            'remarks' => 'Remarks',
            'apn_no' => 'APN #'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getCrop()
//    {
//        return $this->hasOne(MasterCrop::className(), ['id' => 'crop_id']);
//    }

    public function save($runValidation = true, $attributeNames = null) {
        if ($this->getIsNewRecord()) {
            return $this->insert($runValidation, $attributeNames);
        }/* else {
            if (!empty($this->diseases)) {
                $this->diseases = implode(';', $this->diseases);
            }
            if (!empty($this->viruses)) {
                $this->viruses = implode(';', $this->viruses);
            }
            if (!empty($this->pests)) {
                $this->pests = implode(';', $this->pests);
            }
            return $this->update($runValidation, $attributeNames) !== false;
        } */
    }

}
