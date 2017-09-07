<?php

namespace app\modules\corn\models;

use Yii;

/**
 * This is the model class for table "catalog.registration".
 *
 * @property integer $reg_id
 * @property string $cguard_no
 * @property string $region_no
 * @property string $region_name
 * @property string $province
 * @property string $variety
 * @property string $date_received
 * @property string $sample_type
 * @property string $remarks
 * @property string $apn_no
 */
class Registration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog.registration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cguard_no', 'region_no', 'region_name', 'province', 'variety', 'date_received', 'sample_type', 'remarks', 'apn_no'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reg_id' => 'Reg ID',
            'cguard_no' => 'Cguard No',
            'region_no' => 'Region No',
            'region_name' => 'Region Name',
            'province' => 'Province',
            'variety' => 'Variety',
            'date_received' => 'Date Received',
            'sample_type' => 'Sample Type',
            'remarks' => 'Remarks',
            'apn_no' => 'Apn No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getInventory()
    // {
    //     return $this->hasMany(Inventory::className(), ['accession_no' => 'reg_id']);
    // }
}
