<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Cart;
use yii\rest\ActiveController;

class CartController extends ActiveController
{
    public $enableCsrfValidation = false;
    public $modelClass = Cart::class;
}
