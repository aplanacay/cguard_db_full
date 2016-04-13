<?php

namespace app\models;

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
 * @property integer $crop_id
 * @property string $old_acc_no
 * @property string $gb_no
 * @property string $collecting_no
 * @property string $cultivar/variety_name/pedigree
 * @property string $dialect
 * @property string $source/grower
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
class GermplasmBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog.germplasm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phl_no', 'remarks', 'Notes', 'old_acc_no', 'gb_no', 'collecting_no', 'cultivar/variety_name/pedigree', 'dialect', 'source/grower', 'scientific_name', 'count_coll', 'prov', 'town', 'barangay', 'sitio', 'acq_date', 'latitude', 'longitude', 'altitude', 'coll_source', 'gen_stat', 'sam_type', 'sam_met', 'mat', 'topo', 'site', 'soil_tex', 'drain', 'soil_col', 'ston'], 'string'],
            [['creator_id', 'modifier_id', 'crop_id'], 'integer'],
            [['creation_timestamp', 'modification_timestamp','crop'], 'safe'],
            [['is_void'], 'boolean'],
            [['crop_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
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
            'cultivar/variety_name/pedigree' => 'Local/Variety Name',
            'dialect' => 'Dialect',
            'source/grower' => 'Source/grower',
            'scientific_name' => 'Scientific Name',
            'count_coll' => 'Country',
            'prov' => 'Province',
            'town' => 'Town',
            'barangay' => 'Barangay',
            'sitio' => 'Sitio',
            'acq_date' => 'Acq Date',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'coll_source' => 'Coll Source',
            'gen_stat' => 'Gen Stat',
            'sam_type' => 'Sam Type',
            'sam_met' => 'Sam Met',
            'mat' => 'Mat',
            'topo' => 'Topo',
            'site' => 'Site',
            'soil_tex' => 'Soil Tex',
            'drain' => 'Drain',
            'soil_col' => 'Soil Col',
            'ston' => 'Ston',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrop()
    {
        return $this->hasOne(MasterCrop::className(), ['id' => 'crop_id']);
    }
}
