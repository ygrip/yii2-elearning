<?php

namespace app\models;

use Yii;
use app\models\Roles;

/**
 * This is the model class for table "role_user".
 *
 * @property string $role_id
 * @property string $user_id
 *
 * @property Roles $role
 * @property Users $user
 */
class RoleUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'user_id'], 'integer'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return RoleUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RoleUserQuery(get_called_class());
    }

    public function checkRole($id){
        $result = array();
        $check = $this->find()->where(['user_id'=>$id])->one();
        if(!empty($check)){
            $roles = new Roles();
            $the_role = $roles->find()->where(['id'=>$check->role_id])->one();
            if(!empty($the_role)){
                $result = array("status"=>"true","data"=>array('id'=>$id,'role_id'=>$check->role_id,'role'=>$the_role->title),"message"=>"found the role");
            }else{
                $result = array("status"=>"true","data"=>null,"message"=>"unknown role");
            }
        }else{
            $result = array("status"=>"true","data"=>null,"message"=>"unknown role");
        }

        return $result;
    }
}
