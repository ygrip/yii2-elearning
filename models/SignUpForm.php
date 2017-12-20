<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\RoleUser;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignUpForm extends Model
{
    public $email;
    public $username;
    public $password;
    public $verifyPassword;

    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['email','validateEmail'],
            ['username', 'validateUserName'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        if (!$this->hasErrors()) {
            if(!preg_match($regex,$this->password)){
                $this->addError($attribute, "Your password must contain at least 8 letters, one capital word and one numeric");
            }
            if(strcmp($this->password,$this->verifyPassword)==0){
                $this->addError($attribute, "Your verify password is wrong");
            }
        }
    }

    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->addError($attribute, "Please enter a valid email address");

            }else{
                $user = Users::getUser($this->email);

                if (count($user) != 0) {
                    $this->addError($attribute, "Email has been used");
                }
            }
        }
    }

    public function validateUserName($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if(strlen($this->username)>=6) {
                $user = Users::checkUsername($this->username);

                if (count($user) != 0) {
                    $this->addError($attribute, "Username has been taken");
                }
            }else{
                $this->addError($attribute, "Please enter at least 6 letters for username");
            }
        }
    }
    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = md5($this->password);
            $user->remember_token = md5($this->username);

            $user->created_at = date('yy-m-d H:m:s');
            $user->updated_at = date('yy-m-d H:m:s');
            $user->save(false);
            return true;
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
