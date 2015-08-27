<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $suffix
 * @property string $email
 * @property string $phone_number
 * @property string $type
 * @property boolean $is_active
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active'], 'boolean'],
            [['username', 'first_name', 'middle_name', 'last_name', 'email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 150],
            [['suffix'], 'string', 'max' => 15],
            [['phone_number'], 'string', 'max' => 30],
            [['type'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'suffix' => 'Suffix',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'type' => 'Type',
            'is_active' => 'Is Active',
        ];
    }
}
