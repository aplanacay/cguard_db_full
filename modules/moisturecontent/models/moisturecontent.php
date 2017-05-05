<?php

namespace app\modules\moisturecontent\models;

use Yii;

/**
 * This is the model class for table "master.moisturecontent".
 *
 * @property string $mcref_no
 * @property string $collection_id
 * @property string $cropping_season
 * @property string $date_tested
 * @property string $percentage
 * @property string $remarks
 */
class moisturecontent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.moisturecontent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mcref_no', 'collection_id', 'cropping_season', 'remarks'], 'string'],
            [['date_tested'], 'safe'],
            [['percentage'], 'number'],
            [['mcref_no', 'collection_id', 'cropping_season', 'date_tested', 'percentage'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mcref_no' => 'MC Ref No',
            'collection_id' => 'Accession No',
            'seedref_no' => 'Seed Ref No',
            'cropping_season' => 'Cropping Season',
            'date_tested' => 'Date Tested',
            'percentage' => 'Percentage',
            'remarks' => 'Remarks',
        ];
    }
}
