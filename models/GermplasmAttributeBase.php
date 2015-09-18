<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog.germplasm_attribute".
 *
 * @property integer $id
 * @property integer $germplasm_id
 * @property integer $attribute_id
 * @property string $value
 * @property integer $creator_id
 * @property string $creation_timestamp
 * @property integer $modifier_id
 * @property string $modification_timestamp
 * @property string $remarks
 * @property string $notes
 * @property boolean $is_void
 */
class GermplasmAttributeBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog.germplasm_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['germplasm_id', 'attribute_id', 'creator_id', 'modifier_id'], 'integer'],
            [['creation_timestamp', 'modification_timestamp'], 'safe'],
            [['notes'], 'string'],
            [['is_void'], 'boolean'],
            [['value'], 'string', 'max' => 32],
            [['remarks'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'germplasm_id' => 'Germplasm ID',
            'attribute_id' => 'Attribute ID',
            'value' => 'Value',
            'creator_id' => 'ID that refers in the users table that created the record.',
            'creation_timestamp' => 'Creation Timestamp',
            'modifier_id' => 'ID that refers in the user table that recently modified the record.',
            'modification_timestamp' => 'Timestamp when the record is modified.',
            'remarks' => 'Remarks',
            'notes' => 'Technical details added by an admin.',
            'is_void' => 'Indicator whether the record is deleted (TRUE) or operational (FALSE).',
        ];
    }
}
