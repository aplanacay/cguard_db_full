<?php

namespace app\modules\catalog\models;

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
class Germplasm extends \app\models\GermplasmBase {

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
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

    /**
     * @inheritdoc
     */
    public function fields() {
        return [
            'id',
            'phl_no',
//            'creator_id' => function ($model) {
//        return $model->creator->last_name . ', ' . $model->creator->first_name;
//    },
//            'creation_timestamp' => 'Timestamp when the record is added.',
//            'modifier_id' => 'ID that refers in the users table that recently modified the record.',
//            'modification_timestamp' => 'Timestamp when the record is moified.',
            'remarks',
            //'Notes' => 'Notes',
            //'is_void' => 'Is Void',
            'attributes', 
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator() {
        return $this->hasOne(app\models\Users::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes() {
        return $this->hasMany(GermplasmAttribute::className(), ['germplasm_id' => 'id']);
    }

}
