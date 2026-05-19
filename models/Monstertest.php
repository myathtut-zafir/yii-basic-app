<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monstertest".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $age
 * @property string|null $gender
 */
class Monstertest extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'monstertest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'age', 'gender'], 'default', 'value' => null],
            [['age'], 'default', 'value' => null],
            [['age'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 10],
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
        ];
    }

}
