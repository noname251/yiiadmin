<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user2}}".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $wechat
 * @property string $password
 */
class User2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user2}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'wechat', 'password'], 'required'],
            [['username'], 'string', 'max' => 40],
            [['email', 'wechat'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 20],
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
            'email' => 'Email',
            'wechat' => 'Wechat',
            'password' => 'Password',
        ];
    }
}
