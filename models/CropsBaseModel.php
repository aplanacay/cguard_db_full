<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crops".
 *
 * @property integer $id
 * @property integer $phl_no
 * @property integer $old_accession_no
 * @property integer $gb_no
 * @property string $collecting_no
 * @property string $name
 * @property string $dialect
 * @property string $source
 * @property string $scientific_name
 * @property string $country
 * @property string $province
 * @property string $town
 * @property string $barangay
 * @property string $sitio
 * @property string $acquisition_date
 * @property string $remarks
 * @property double $latitude
 * @property double $longitude
 * @property double $altitude
 * @property string $collection_source
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
 */
class CropsBaseModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crops';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phl_no', 'old_accession_no', 'gb_no'], 'integer'],
            [['remarks'], 'string'],
            [['latitude', 'longitude', 'altitude'], 'number'],
            [['collecting_no', 'province', 'town', 'barangay', 'sitio', 'acquisition_date'], 'string', 'max' => 100],
            [['name', 'dialect', 'source', 'scientific_name', 'collection_source', 'gen_stat', 'sam_type', 'sam_met', 'mat', 'topo', 'site', 'soil_tex', 'drain', 'soil_col', 'ston'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 50]
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
            'old_accession_no' => 'Old Accession No',
            'gb_no' => 'Gb No',
            'collecting_no' => 'Collecting No',
            'name' => 'Name',
            'dialect' => 'Dialect',
            'source' => 'Source',
            'scientific_name' => 'Scientific Name',
            'country' => 'Country',
            'province' => 'Province',
            'town' => 'Town',
            'barangay' => 'Barangay',
            'sitio' => 'Sitio',
            'acquisition_date' => 'Acquisition Date',
            'remarks' => 'Remarks',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'collection_source' => 'Collection Source',
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
}
