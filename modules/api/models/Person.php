<?php

namespace app\modules\api\models;

use app\modules\api\models\query\UserQuery;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $user_id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string|null $access_token
 *
 * @property Cart[] $carts
 */
class Person extends ActiveRecord implements IdentityInterface
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
            [['username', 'email', 'password_hash'], 'required'],
            [['username', 'email', 'password_hash', 'access_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'Person ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\api\models\query\CartQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['user_id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method. ; Done
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method. ; for token-based authentication
        return null;
    }

    public function getId(): int
    {
        // TODO: Implement getId() method.
        return $this->user_id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method. ; for cookie-based authentication
        return null;
    }

    public function validateAuthKey($authKey): bool
    {
        // TODO: Implement validateAuthKey() method. ; for cookie-based authentication
        return false;
    }

    public function validatePassword($password): bool
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }
}
