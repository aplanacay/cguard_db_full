<?php

namespace app\modules\inventory\models;

use Yii;

/**
 * This is the model class for table "master.inventory".
 *
 * @property integer $accession_no
 * @property integer $lot_no
 * @property string $store_location
 * @property string $packets_active_no
 * @property string $packets_base_no
 * @property string $seed_weight_active
 * @property string $seed_weight_base
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
            [['accession_no','store_location','store_location_base','remarks'], 'string'],
            [['seedref_no'], 'unique'],
            [['packets_active_no', 'packets_base_no', 'seed_weight_active', 'seed_weight_base'], 'number'],
            [['date', 'date_of_harvest', 'seedref_no'], 'safe'],
            [['accession_no', 'store_location', 'packets_active_no', 'packets_base_no', 'seed_weight_active', 'seed_weight_base', 'date', 'seedref_no'], 'required'],
            //['packets_active_no', 'compare', 'compareValue' => 0, 'operator' => '>'],
            //['packets_base_no', 'compare', 'compareValue' => 0, 'operator' => '>'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accession_no' => 'ACCESSION NO',
            'lot_no' => 'LOT NO',
            'store_location' => 'STORE LOCATION',
            'store_location_base' => 'STORE LOCATION - BASE',
            'packets_active_no' => 'NUMBER OF PACKETS - ACTIVE',
            'packets_base_no' => 'NUMBER OF PACKETS - BASE',
            'seed_weight_active' => 'ESTIMATED SEED WEIGHT - ACTIVE',
            'seed_weight_base' => 'ESTIMATED SEED WEIGHT - BASE',
            'date_of_harvest' => 'DATE OF HARVEST',
            'date' => 'DATE OF STORAGE',
            'seedref_no' => 'REFERENCE NO',
            'remarks' => 'REMARKS'
        ];
    }

    /*public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->total_active = $this->packets_active_no*35;
                $this->total_base = $this->packets_base_no*35;
                return true;
            }else{
                return true;
            }
        }
        return false;
    }*/

}
