<?php

namespace app\modules\corn\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "corn.germplasm".
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

    public $variety_name;
    public $image;

    public function rules() {
        $rules = parent::rules();
       return $rules = \yii\helpers\ArrayHelper::merge($rules, [[['crop', 'variety_name'], 'safe'],]);
//        return $rules = \yii\helpers\ArrayHelper::merge($rules, [[['avatar', 'filename', 'image'], 'safe'],
//                   [ ['image'], 'file', 'extensions' => 'jpg, gif, png']
//        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'phl_no' => 'Phl No',
            'creator_id' => 'Creator ID',
            'creation_timestamp' => 'Creation Timestamp',
            'modifier_id' => 'Modifier ID',
            'modification_timestamp' => 'Modification Timestamp',
            'remarks' => 'Remarks',
            'Notes' => 'Notes',
            'is_void' => 'Is Void',
            'crop_id' => 'Crop ID',
            'old_acc_no' => 'Old Acc No',
            'other_number'=>'Other Number',
            'gb_no' => 'Gb No',
            'collecting_no' => 'Collecting No',
            'cultivar/variety_name/pedigree' => 'Local/Variety Name',
            'dialect' => 'Dialect',
            'source/grower' => 'Source/grower',
            'scientific_name' => 'Scientific Name',
            'count_coll' => 'Country',
            'prov' => 'Province',
            'town' => 'Town',
            'barangay' => 'Barangay',
            'sitio' => 'Sitio',
            'acq_date' => 'Acq Date',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'coll_source' => 'Collecting Source',
            'gen_stat' => 'Genetic Stat',
            'sam_type' => 'Sam Type',
            'sam_met' => 'Sam Met',
            'mat' => 'Mat',
            'topo' => 'Topo',
            'site' => 'Site',
            'soil_tex' => 'Soil Tex',
            'drain' => 'Drain',
            'soil_col' => 'Soil Col',
            'ston' => 'Ston',
            'diseases'=>'Diseases',
            'viruses'=>'Viruses',
            'pests'=>'Pests'
                // 'crop'=> 'Crop'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrop() {
        return $this->hasOne(Crop::className(), ['id' => 'crop_id']);
    }
    
    /**
     * fetch stored image file name with complete path 
     * @return string
     */
    public function getImageFile() {
        return isset($this->avatar) ? Yii::$app->params['uploadPath'] . $this->avatar : null;
    }

    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() {
        // return a default image placeholder if your source avatar is not found
        $avatar = isset($this->avatar) ? $this->avatar : 'default_img.gif';
        return Yii::$app->params['uploadPath'] . $avatar;
    }

    /**
     * Process upload of image
     *
     * @return mixed the uploaded image instance
     */
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'image');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        $this->filename = $image->name;
        $ext = end((explode(".", $image->name)));

        // generate a unique file name
        $this->avatar = Yii::$app->security->generateRandomString() . ".{$ext}";

        // the uploaded image instance
        return $image;
    }

    /**
     * Process deletion of image
     *
     * @return boolean the status of deletion
     */
    public function deleteImage() {
        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->avatar = null;
        $this->filename = null;

        return true;
    }

}
