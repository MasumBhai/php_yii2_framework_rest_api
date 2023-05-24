<?php

//use _data\User;
use app\modules\api\models\Person;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;

    public function rules(): array
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    public function getUser(): ?Person
    {
        return Person::findOne(['email' => $this->email]);
    }

    public function login(): bool
    {
        if ($this->validate()) {
            $valid_user = $this->getUser();
            return Yii::$app->user->login($valid_user);
        }

        return false;
    }
}
