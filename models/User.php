<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $cookie
 * @property string $auth_key
 */
class User extends \yii\db\ActiveRecord  implements \yii\web\IdentityInterface  
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'cookie', 'auth_key'], 'required'],
            [['username'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 20],
            [['cookie'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 50],
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
            'cookie' => 'Cookie',
            'auth_key' => 'Auth Key',
        ];
    }
     public static function findIdentity($id){  
        return static::findOne($id);  
    }  
  
    public static function findIdentityByAccessToken($token,$type=null){  
        return static::findOne(['accessToken'=>$token]);  
    }  
  
    public static function findByUsername($username){     //①  
        return static::findOne(['username'=>$username]);   
    }  
  
    public function getId(){  
        return $this->id;  
    }  
  
    public function getAuthkey(){  
        return $this->auth_key;  
    }  
  
    public function validateAuthKey($authKey){  
        return $this->auth_key === $authKey;  
    }  
  
    public function validatePassword($password){          //②  
        return $this->password === $password;  
    }  
     /* public function generateAuthKey()                    //③  
        {  
		$this->auth_key = Yii::$app->security->generateRandomString();  
       $this->save();  
        }  */
     }
    

