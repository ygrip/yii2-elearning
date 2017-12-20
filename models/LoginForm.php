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
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
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
        if (!$this->hasErrors()) {
            $user = Users::userAuth($this->email,$this->password);

            if (strcmp($user['success'],'false')==0) {
                $this->addError($attribute, $user['message']);
            }else{

            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = Users::userAuth($this->email,$this->password);

            if(isset($user['success'])&&strcmp($user['success'],'true')==0){
                $role = new RoleUser();

                $check_role = $role->checkRole($user['id']);
                $session = Yii::$app->session;

                if(!empty($check_role)){
                    if($check_role['data']['role_id']==1){
                        //admin
                        $session->set('admin',true);
                        $session->set('id',$user['id']);
                        $session->set('role',$check_role['data']['role_id']);
                        return true;

                    }else if($check_role['data']['role_id']==2){
                        //lecturer
                        $session->set('teacher',true);
                        $session->set('id',$user['id']);
                        $session->set('role',$check_role['data']['role_id']);
                        return true;

                    }else if($check_role['data']['role_id']==3){
                        //student
                        $session->set('user',true);
                        $session->set('id',$user['id']);
                        $session->set('role',$check_role['data']['role_id']);
                        return true;

                    }else{
                        return false;
                    }
                }else{
                    return false;

                }

            }else{
                return false;
            }

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
