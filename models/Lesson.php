<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property integer $id
 * @property integer $id_course
 * @property string $title
 * @property string $slug
 * @property string $lesson_image
 * @property string $text
 * @property string $published
 * @property string $create_at
 * @property string $update_at
 * @property string $delete_at
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_course', 'title', 'slug', 'lesson_image', 'text', 'published'], 'required'],
            [['id_course'], 'integer'],
            [['text'], 'string'],
            [['published', 'create_at', 'update_at', 'delete_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 100],
            [['lesson_image'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_course' => 'Id Course',
            'title' => 'Judul',
            'slug' => 'Slug',
            'lesson_image' => 'Gambar Lesson',
            'text' => 'Text untuk Lesson',
            'published' => 'Published',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'delete_at' => 'Delete At',
        ];
    }
}
