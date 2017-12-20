<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Question;
use yii\db\Expression;
use yii\data\ActiveDataProvider;

class QuestionOperation extends Model
{
    /**
     * @var UploadedFile
     */
    public $question;
	public $score;
	public $id_schedule;
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['question', 'required'],
            ['score', 'required'],
            ['id_schedule', 'required'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
			$uploadfile = new Question();
			$uploadfile->question = $this->question;
            $uploadfile->score = $this->score;
            if(!empty($this->file)){
                $uploadfile->question_image = $this->file->baseName . '.' . $this->file->extension;
                $this->file->saveAs('uploads/course/question/' . $this->file->baseName . '.' . $this->file->extension);
            }
            $uploadfile->id_schedule = $this->id_schedule;
            $uploadfile->create_at = new Expression('NOW()');
            return $uploadfile->save() ? $uploadfile : null;
        } else {
            return null;
        }
    }

    public function tampil($params)
    {
        $query = Question::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['create_at'=>SORT_ASC]],            
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'create_at', $this->create_at]);

        return $dataProvider;
    }
}
