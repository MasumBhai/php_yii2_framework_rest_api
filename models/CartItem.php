<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cart_item}}".
 *
 * @property int $cart_item_id
 * @property int $cart_id
 * @property int $product_id
 * @property int $product_quantity
 * @property int $updated_at
 *
 * @property Cart $cart
 * @property Product $product
 */
class CartItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cart_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cart_id', 'product_id', 'product_quantity', 'updated_at'], 'required'],
            [['cart_id', 'product_id', 'product_quantity', 'updated_at'], 'integer'],
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::class, 'targetAttribute' => ['cart_id' => 'cart_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cart_item_id' => 'Cart Item ID',
            'cart_id' => 'Cart ID',
            'product_id' => 'Product ID',
            'product_quantity' => 'Product Quantity',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CartQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['cart_id' => 'cart_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ProductQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['product_id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CartItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CartItemQuery(get_called_class());
    }
}
