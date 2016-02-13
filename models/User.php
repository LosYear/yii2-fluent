<?php

namespace yii\fluent\models;

use Yii;
use yii\base\Security;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
/**
 * User identity
 *
 * @property integer $id
 * @property string $email
 * @property string $password_hash
 * @property integer $is_root
 * @property string $created_at
 * @property string $last_login_at
 * @property string $auth_key
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_ADMIN = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password_hash'], 'required'],
            [['is_root'], 'integer'],
            [['email'], 'email'],
            [['created_at', 'last_login_at'], 'safe'],
            [['email', 'password_hash'], 'string', 'max' => 200],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'email' => Yii::t('fluent/user', 'Email'),
            'password_hash' => Yii::t('fluent/user', 'Password'),
            'is_root' => Yii::t('fluent/user', 'Is Administrator'),
            'created_at' => Yii::t('fluent/user', 'Signed up at'),
            'last_login_at' => Yii::t('fluent/user', 'Last Login at'),
        ];
    }

    // Implementing IdentityInterface methods

    /**
     * Find user by id
     * @param int|string $id
     * @return User
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds User by given Access Token
     * @param mixed $token
     * @param null $type
     * @return User
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds User by email
     * @param string $email
     * @return User
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @return string
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return $this->password_hash === md5($password);
    }

    /**
     * Generates MD5 password hash
     * @param $password
     */
    public function setPasswordHash($password)
    {
        $this->password_hash = md5($password);
    }

    /**
     * Checks whether user is administrator
     * @return bool
     */
    public function isAdmin(){
        return $this->is_root == User::STATUS_ADMIN;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }

        $this->setPasswordHash($this->password_hash);

        return false;
    }

}
