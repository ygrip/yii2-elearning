<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CourseStudent[] $courseStudents
 * @property CourseUser[] $courseUsers
 * @property LessonStudent[] $lessonStudents
 * @property RoleUser[] $roleUsers
 * @property TestsResults[] $testsResults
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'username','email', 'password'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'password', 'remember_token'], 'string', 'max' => 191],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'remember_token' => 'Remember Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseStudents()
    {
        return $this->hasMany(CourseStudent::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseUsers()
    {
        return $this->hasMany(CourseUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessonStudents()
    {
        return $this->hasMany(LessonStudent::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleUsers()
    {
        return $this->hasMany(RoleUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestsResults()
    {
        return $this->hasMany(TestsResults::className(), ['user_id' => 'id']);
    }

    public static function userAuth($email, $password){
        $result = array();
        $user = Users::find()->where(['email'=>$email])->one();

        if(!empty($user)){
            if(strcmp($user->password,md5($password))==0){
                $result = array('success'=>'true','id'=>$user->id,'message'=>"authentification success");
            }else{
                $result = array('success'=>'false','message'=>"you ve entered a wrong password");
            }
        }else{
            $result = array('success'=>'false','message'=>"we cannot find your email");
        }
        return $result;
    }


    public static function  checkUsername($username){
        return Users::find()->where(['username'=>$username])->one();
    }

    public static function getUser($email){
        return Users::find()->where(['email'=>$email])->one();
    }

    public static function find(){
        return new UsersQuery(get_called_class());
    }
}
