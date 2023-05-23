<?php

namespace app\modules\api\models;

use Yii;

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
class User extends \yii\db\ActiveRecord
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
            'user_id' => 'User ID',
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
     * @return \app\modules\api\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\api\models\query\UserQuery(get_called_class());
    }
}
