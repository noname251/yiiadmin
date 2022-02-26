<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user1}}".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class User1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user1}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'password'], 'required'],
            [['id'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
