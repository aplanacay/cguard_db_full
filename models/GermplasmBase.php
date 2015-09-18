<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog.germplasm".
 *
 * @property integer $id
 * @property string $phl_no
 * @property integer $creator_id
 * @property string $creation_timestamp
 * @property integer $modifier_id
 * @property string $modification_timestamp
 * @property string $remarks
 * @property string $Notes
 * @property boolean $is_void
 */
class GermplasmBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog.germplasm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phl_no', 'remarks', 'Notes'], 'string'],
            [['creator_id', 'modifier_id'], 'integer'],
            [['creation_timestamp', 'modification_timestamp'], 'safe'],
            [['is_void'], 'boolean']
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
            'creator_id' => 'ID that refers in the users table that created the record.',
            'creation_timestamp' => 'Timestamp when the record is added.',
            'modifier_id' => 'ID that refers in the users table that recently modified the record.',
            'modification_timestamp' => 'Timestamp when the record is moified.',
            'remarks' => 'Additional information about the record.',
            'Notes' => 'Notes',
            'is_void' => 'Is Void',
        ];
    }
}
