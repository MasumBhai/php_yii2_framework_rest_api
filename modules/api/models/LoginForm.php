<?php

namespace app\modules\api\models;

//use _data\User;
use app\modules\api\models\Person;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'string'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function getUser(): ?Person
    {
        return Person::findOne(['username' => $this->username]);
    }

    public function login()
    {
        if ($this->validate()) {
            $valid_user = $this->getUser();
            if($valid_user){
//                return true;
                return header("http://localhost:8080/site/about?page=1&per-page=2");
            }
//            return Yii::$app->user->login($valid_user); // IdentityInterface is very hard to debug in short period
        }

        return false;
    }

    private function redirect(array $array)
    {

    }
}
