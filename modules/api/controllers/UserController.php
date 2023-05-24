<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Person;
use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\db\StaleObjectException;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class UserController extends ActiveController
{
    public $enableCsrfValidation = false;
//    public $modelClass = Person::class;
    public $modelClass = Person::class;

    public function actions()
    {
        $actions = parent::actions();

        // Disabling unnecessary default actions as i'm using activeController
        unset($actions['index'], $actions['view'], $actions['create'], $actions['update'], $actions['delete']);

        return $actions;
    }

    /**
     * @throws BadRequestHttpException
     */
    public function actionLogin()
    {
        $request = Yii::$app->request;
        $username = Yii::$app->getRequest()->getBodyParam('username');
        $password = Yii::$app->getRequest()->getBodyParam('password_hash');

        $user = Person::findOne(['username' => $username]);

        if ($user !== null && Yii::$app->getSecurity()->validatePassword($password, $user->password_hash)) {

//            return $this->redirect(['site/index']);
            return ['message' => 'Login successful.'];
        }

        throw new BadRequestHttpException('Invalid email or password.');
    }

    public function actionLogout()
    {
        Yii::$app->session->remove('user_id');

        return ['message' => 'Logout successful.'];
    }


    /**
     * @throws Exception
     * @throws InvalidConfigException
     * @throws BadRequestHttpException
     */
    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\response::FORMAT_JSON;

        $request = Yii::$app->getRequest();

        $model = new Person();

        $model->load($request->getBodyParams(), '');

        // for giving the log user or email already exists, i'm sending message as bad_request
        if (!$model->validate()) {
            throw new BadRequestHttpException('Invalid Person data');
        }

        $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);

        if ($model->save()) {
            return $model;
        } else {
            return ['errors' => $model->errors];
        }
    }

    /**
     * @throws Exception
     * @throws InvalidConfigException
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = Person::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException("Customer not found.");
        }

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');

        // I need to Hash the password before saving
        if (!empty($model->password_hash)) {
            $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
        }

        if ($model->save()) {
            return $model;
        } else {
            return ['errors' => $model->errors];
        }
    }


    /**
     * @throws StaleObjectException
     * @throws \Throwable
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model = Person::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException("Customer not found.");
        }

        $model->delete();

        return ['message' => 'Customer deleted successfully.'];
    }


    /**
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = Person::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException("Customer not found.");
        }

        return $model;
    }

}
