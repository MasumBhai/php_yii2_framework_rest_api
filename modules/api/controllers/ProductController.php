<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Product;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $enableCsrfValidation = false;
    public $modelClass = Product::class;

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
