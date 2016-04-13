<?php

namespace app\modules\viability\models;

use Yii;

/**
 * This is the model class for table "master.viability".
 *
 * @property string $viabilityref_no
 * @property string $collection_id
 * @property string $cropping_season
 * @property string $date_tested
 * @property string $percentage
 * @property string $date_packed
 * @property string $remarks
 */
class viability extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.viability';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['viabilityref_no'], 'required'],
            [['viabilityref_no', 'collection_id', 'cropping_season', 'remarks'], 'string'],
            [['date_tested', 'date_packed'], 'safe'],
            [['percentage'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'viabilityref_no' => 'Viability Ref No',
            'collection_id' => 'Accession No',
            'seedref_no' => 'Seed Ref No',
            'cropping_season' => 'Cropping Season',
            'date_tested' => 'Date Tested',
            'percentage' => 'Percentage',
            'date_packed' => 'Date Packed',
            'remarks' => 'Remarks',
        ];
    }
}
