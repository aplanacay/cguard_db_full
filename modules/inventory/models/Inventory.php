<?php

namespace app\modules\inventory\models;

use Yii;

/**
 * This is the model class for table "master.inventory".
 *
 * @property integer $accession_no
 * @property string $store_location
 * @property string $packets_active_no
 * @property string $packets_base_no
 * @property string $seed_weight_active
 * @property string $seed_weight_base
 * @property string $date
 * @property string $seedref_no
 * @property integer $lot_no
 * @property string $store_location_base
 * @property string $remarks
 * @property string $date_of_harvest
 *
 * @property CatalogRegistration $accessionNo
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.inventory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accession_no'], 'integer'],
            [['store_location', 'seedref_no', 'store_location_base', 'remarks'], 'string'],
            [['packets_active_no', 'packets_base_no', 'seed_weight_active', 'seed_weight_base'], 'number'],
            [['date', 'date_of_harvest'], 'safe'],
            [['accession_no'], 'exist', 'skipOnError' => true, 'targetClass' => '\app\modules\corn\models\Registration::className()', 'targetAttribute' => ['accession_no' => 'reg_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accession_no' => 'Accession No',
            'store_location' => 'Store Location',
            'packets_active_no' => 'Packets Active No',
            'packets_base_no' => 'Packets Base No',
            'seed_weight_active' => 'Seed Weight Active',
            'seed_weight_base' => 'Seed Weight Base',
            'date' => 'Date',
            'seedref_no' => 'Seedref No',
            'lot_no' => 'Lot No',
            'store_location_base' => 'Store Location Base',
            'remarks' => 'Remarks',
            'date_of_harvest' => 'Date Of Harvest',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessionNo()
    {
        return $this->hasOne('\app\modules\corn\models\Registration::className()', ['reg_id' => 'accession_no']);
    }
}
