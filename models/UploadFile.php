<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Freebies;

class UploadFile extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;
	public $title;
	public $description;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
            ['title', 'required'],
            ['description', 'required'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
			$freebies = new Freebies();
			$freebies->id_user = Yii::$app->user->identity->id;
			$freebies->title = $this->title;
			$freebies->filename = $this->file->baseName . '.' . $this->file->extension;
			$freebies->description = $this->description;
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return $freebies->save() ? $freebies : null;
        } else {
            return null;
        }
    }
}
