<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $wechat;

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

    
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id]);	
        //isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
		return static ::findOne(['access_token'=>$token]); 
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
    }
   public static function findByUsername($username)
     {
           $user = User::find()
             ->where(['username' => $username])
             ->asArray()
             ->one();
 
             if($user){
             return new static($user);
         }
	
         return null;
         }
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
