<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_member".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_course
 * @property integer $status
 */
class CourseMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_course', 'status'], 'required'],
            [['id_user', 'id_course', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_course' => 'Id Course',
            'status' => 'Status',
        ];
    }
}
