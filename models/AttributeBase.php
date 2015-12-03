<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master.attribute".
 *
 * @property integer $id
 * @property string $abbrev
 * @property string $data_type
 */
class AttributeBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.variable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_type','type'], 'string'],
            [['abbrev'], 'string', 'max' => 32],
            [['abbrev'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'abbrev' => 'Abbrev',
            'data_type' => 'Data Type',
            'type'=>'Type',
        ];
    }
}
