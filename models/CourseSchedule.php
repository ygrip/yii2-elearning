<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_schedule".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_course
 * @property string $tanggal_mulai
 * @property string $tanggal_berakhir
 * @property string $text_info
 */
class CourseSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_course', 'tanggal_mulai', 'tanggal_berakhir', 'text_info'], 'required'],
            [['id_user', 'id_course'], 'integer'],
            [['tanggal_mulai', 'tanggal_berakhir'], 'safe'],
            [['text_info'], 'string', 'max' => 200],
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
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_berakhir' => 'Tanggal Berakhir',
            'text_info' => 'Informasi untuk Jadwal',
        ];
    }
}
