<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monstermash".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $age
 * @property string|null $gender
 * @property string $username
 * @property string $password
 * @property string $auth_key
 */
class Monstermash extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'monstermash';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'age', 'gender'], 'default', 'value' => null],
            [['name', 'gender', 'username', 'password'], 'string'],
            [['age'], 'default', 'value' => null],
            [['age'], 'integer'],
            [['username', 'password', 'auth_key'], 'required'],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'gender' => 'Gender',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
        ];
    }

}
