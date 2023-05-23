<?php

namespace app\modules\api\controllers;

use app\modules\api\models\CartItem;
use yii\rest\ActiveController;

class CartItemController extends ActiveController
{
    public $enableCsrfValidation = false;
    public $modelClass = CartItem::class;
}
