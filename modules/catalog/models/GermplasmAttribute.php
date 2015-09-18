<?php

namespace app\modules\catalog\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GermplasmAttributes
 *
 * @author NCarumba
 */
class GermplasmAttribute extends \app\models\GermplasmAttributeBase {

    /**
     * @inheritdoc
     */
    public function fields() {
        return [
            'id',
            'gemplasm_id',
            'attribute_id',
            'attribute',
            'value',
            'creator_id' => function ($model) {
        return $model->creator->last_name . ', ' . $model->creator->first_name;
    },
            'creation_timestamp',
            'modifier_id',
            'modification_timestamp',
            'remarks',
                //'Notes' => 'Notes',
                //'is_void' => 'Is Void',
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
        return $this->hasOne(\app\models\AttributeBase::className(), ['id' => 'attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getGermplasm() {
//        return $this->hasOne(\app\models\GermplasmBase::className(), ['id' => 'germplasm_id']);
//    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getAllAttribute() {
//        return $this->select(['distinct','attribute_id']);
//    }
}
