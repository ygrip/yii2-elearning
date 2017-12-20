<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property integer $mentor
 * @property integer $status
 * @property string $description
 * @property string $course_image
 * @property integer $type
 * @property string $create_at
 * @property string $update_at
 * @property string $delete_at
 */
class Course extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'mentor', 'status', 'description', 'course_image', 'type'], 'required'],
            [['mentor', 'status', 'type'], 'integer'],
            [['create_at', 'update_at', 'delete_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 100],
            [['description', 'course_image'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Judul',
            'slug' => 'Slug',
            'mentor' => 'Mentor',
            'status' => 'Status',
            'description' => 'Deskripsi',
            'course_image' => 'Gambar Course',
            'type' => 'Tipe Course',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'delete_at' => 'Delete At',
        ];
    }
}
