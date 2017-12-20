<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Task;
use yii\data\ActiveDataProvider;


class TaskOperation extends Model
{
    /**
     * @var UploadedFile
     */

    public $id_course;
    public $title;
    public $slug;
    public $description;
    public $id_schedule;

    public function rules()
    {
        return [
            ['title', 'required'],
            ['id_course', 'required'],
            ['description', 'required'],
            ['id_schedule', 'required'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
			$task = new Task();
			$task->id_schedule = $this->id_schedule;
			$task->id_course = $this->id_course;
			$task->title = $this->title;
            $task->description = $this->description;
            if (empty($this->slug)){
                $lower = strtolower($this->title);
                $slug = str_replace(' ', '-', $lower);
                $task->slug = $slug;
            }else{
                $task->slug = $this->slug;
            }
            return $task->save() ? $task : null;
        } else {
            return null;
        }
    }

    public function tampil($params)
    {
        $query = Task::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['title'=>SORT_ASC]],            
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
