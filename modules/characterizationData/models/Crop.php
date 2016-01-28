<?php

namespace app\modules\catalog\models;

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
class Crop extends \app\models\CropBase
{
  
}
