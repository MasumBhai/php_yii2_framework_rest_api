<?php

use yii\grid\GridView;
use yii\data\ArrayDataProvider;

// Fetching data from my product api endpoints
$response = file_get_contents('http://localhost/php_yii2_framework_rest_api/web/api/product');
$data = json_decode($response, true);


$dataProvider = new ArrayDataProvider([
    'allModels' => $data,
    'pagination' => [
        'pageSize' => 2
    ],
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'product_id',
        'product_name',
        'product_price',
        'product_description'
    ],
]);


?>
<!--<div class="site-about">-->
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        This is the About page. You may modify the following file to customize its content:-->
<!--    </p>-->
<!---->
<!--    <code>--><?php //= __FILE__ ?><!--</code>-->
<!--</div>-->
