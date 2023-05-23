<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Product;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $enableCsrfValidation = false;
    public $modelClass = Product::class;

}
