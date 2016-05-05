<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master.crop".
 *
 * @property integer $id
 * @property string $abbrev
 * @property string $label
 * @property string $name
 * @property string $description
 * @property integer $creator_id
 * @property string $creation_timestamp
 * @property integer $modifier_id
 * @property string $modification_timestamp
 * @property string $remarks
 * @property string $notes
 * @property boolean $is_void
 *
 * @property CatalogGermplasm[] $catalogGermplasms
 */
class CropBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.crop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'remarks', 'notes'], 'string'],
            [['creator_id', 'modifier_id'], 'integer'],
            [['creation_timestamp', 'modification_timestamp'], 'safe'],
            [['is_void'], 'boolean'],
            [['abbrev', 'label'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 64]
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
            'label' => 'Label',
            'name' => 'Name',
            'description' => 'Description',
            'creator_id' => 'ID that refers in the users table that created the record.',
            'creation_timestamp' => 'Timestamp when the record is added.',
            'modifier_id' => 'ID that refers in the users table that recently modified the record.',
            'modification_timestamp' => 'Timestamp when the record is moified.',
            'remarks' => 'Additional information about the record.',
            'notes' => 'Notes',
            'is_void' => 'Is Void',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogGermplasms()
    {
        return $this->hasMany(CatalogGermplasm::className(), ['crop_id' => 'id']);
    }
}
