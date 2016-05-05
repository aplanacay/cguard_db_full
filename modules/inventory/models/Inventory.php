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
            [['accession_no','store_location'], 'string'],
            [['seedref_no'], 'unique'],
            [['packets_active_no', 'packets_base_no', 'seed_weight_active', 'seed_weight_base'], 'number'],
            [['date', 'seedref_no'], 'safe'],
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
            'accession_no' => 'Accession No',
            'lot_no' => 'Lot No',
            'store_location' => 'Store Location',
            'packets_active_no' => 'Number of Packets - Active',
            'packets_base_no' => 'Number of Packets - Base',
            'seed_weight_active' => 'Estimated Seed Weight - Active',
            'seed_weight_base' => 'Estimated Seed Weight - Base',
            'date' => 'Date of Packaging',
            'seedref_no' => 'Regeneration Ref No',
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
