<?php

namespace app\modules\api\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\CartItem]].
 *
 * @see \app\modules\api\models\CartItem
 */
class CartItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\api\models\CartItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\api\models\CartItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
