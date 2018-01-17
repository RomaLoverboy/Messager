<?php
namespace app\models;
use app\models\tables\GeneralInformation;

class User extends GeneralInformation implements \yii\web\IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
	return static::findOne(['accessToken' => $token]);
          
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->Auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->Auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
		/*return  \Yii::$app->getSecurity()
		->validatePassword($password, $this->Password); */
		return $this->Password === md5($password);
    }
}
