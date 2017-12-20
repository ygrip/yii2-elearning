<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property integer $id_course
 * @property integer $id_schedule
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'description', 'id_course', 'id_schedule'], 'required'],
            [['description'], 'string'],
            [['id_course', 'id_schedule'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 100],
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
            'description' => 'Deskripsi',
            'id_course' => 'Id Course',
            'id_schedule' => 'Id Schedule',
        ];
    }
}
