<?php

namespace app\modules\api\models;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $product_id
 * @property string $product_name
 * @property float $product_price
 * @property string|null $product_description
 *
 * @property CartItem[] $cartItems
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'product_price'], 'required'],
            [['product_price'], 'number'],
            [['product_description'], 'string'],
            [['product_name'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'product_price' => 'Product Price',
            'product_description' => 'Product Description',
        ];
    }

    /**
     * Gets query for [[CartItems]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\api\models\query\CartItemQuery
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItem::class, ['product_id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\api\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\api\models\query\ProductQuery(get_called_class());
    }
}
