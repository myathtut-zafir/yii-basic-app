<?php

use yii\db\Migration;

class m260529_120655_seed_monstermash_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->batchInsert('monstermash',
            ['name', 'age', 'gender', 'username', 'password', 'auth_key'],
            [
                [
                    'Dracula',
                    500,
                    'Male',
                    'dracula1',
                    Yii::$app->security->generatePasswordHash('vampire123'),
                    Yii::$app->security->generateRandomString()
                ],
                [
                    'Frankenstein',
                    200,
                    'Male',
                    'frankie',
                    Yii::$app->security->generatePasswordHash('boltsAndNuts'),
                    Yii::$app->security->generateRandomString()
                ],
                [
                    'Mummy',
                    3000,
                    'Female',
                    'cleopatra',
                    Yii::$app->security->generatePasswordHash('wrappedSecrets'),
                    Yii::$app->security->generateRandomString()
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('monstermash');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260529_120655_seed_monstermash_table cannot be reverted.\n";

        return false;
    }
    */
}
