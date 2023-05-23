<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\modules\api\models\User;

class UserController extends ActiveController
{
    public $enableCsrfValidation = false;
    public $modelClass = User::class;

//    public function actionIndex()
//    {
//        return $this->render('index');
//    }
//
    public function actionCreateUser(){
        \Yii::$app->response->format = \yii\web\response::FORMAT_JSON;
    }



}
