<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Lesson;
use yii\db\Expression;

class LessonOperation extends Model
{
    /**
     * @var UploadedFile
     */
    public $title;
	public $slug;
	public $text;
    public $file;
    public $id_course;

    public function rules()
    {
        return [
            ['title', 'required'],
            ['text', 'required'],
            ['id_course', 'required'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $model = new Lesson();
            $model->title = $this->title;
            if (empty($this->slug)){
                $lower = strtolower($this->title);
                $slug = str_replace(' ', '-', $lower);
                $model->slug = $slug;
            }else{
                $model->slug = $this->slug;
            }
            $model->id_course = $this->id_course;
            $model->text = $this->text;
            $model->lesson_image = $this->file->baseName . '.' . $this->file->extension;
            $model->published = new Expression('NOW()');
            $model->create_at = new Expression('NOW()');
            $this->file->saveAs('uploads/lessons/images/' . $this->file->baseName . '.' . $this->file->extension);
            return $model->save() ? $model : null;
        } else {
            return null;
        }
    }
}
