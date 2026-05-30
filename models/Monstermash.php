<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\web\IdentityInterface;

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
class Monstermash extends \yii\db\ActiveRecord implements IdentityInterface
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
            [['username',], 'unique'],
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

    public static function findIdentity($id): Monstermash|IdentityInterface|null
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByUsername(string $username): static|null
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * passwordHash property ကို တောင်းရင် password database column တန်ဖိုးကို ပေးရန်
     */
    public function getPasswordHash(): string
    {
        return $this->password;
    }

    /**
     * @throws Exception
     */
    public function beforeSave($insert): bool
    {
        if (parent::beforeSave($insert)) {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
            return true;
        }
        return false;
    }
}
