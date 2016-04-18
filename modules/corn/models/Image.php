<?php

namespace app\modules\corn\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use Yii;

/**
 * Class Person
 * @package common\models
 * @property int $id unique person identifier
 * @property string $name person / user name
 * @property array $avatar generated filename on server
 * @property string $filename source filename from client
 */
class Image extends ActiveRecord {

    public static function tableName() {
        return 'catalog.germplasm_image';
    }

    /**
     * @var mixed image the attribute for rendering the file input
     * widget for upload on the form
     */
    public $image;

    public function rules() {
        return [
            [['id', 'germplasm_id'], 'integer'],
            [['name', 'avatar', 'filename', 'image'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, gif, png'],
        ];
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
        $avatar = isset($this->avatar) ? $this->avatar : 'default_user.jpg';
        return Yii::$app->params['uploadUrl'] . $avatar;
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