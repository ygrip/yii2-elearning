<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\CourseSchedule;
use yii\data\ActiveDataProvider;


class Schedule extends Model
{
    /**
     * @var UploadedFile
     */

    public $id_course;
    public $tanggal_mulai;
    public $tanggal_berakhir;
    public $text_info;

    public function rules()
    {
        return [
            ['tanggal_mulai', 'required'],
            ['id_course', 'required'],
            ['tanggal_berakhir', 'required'],
            ['text_info', 'required'],
        ];
    }

    public function upload()
    {
        $session = Yii::$app->session;
        if($session->has('admin')||$session->has('teacher')){
            if ($this->validate()) {
    			$schedule = new CourseSchedule();
    			$schedule->id_user = $session->get('id');
    			$schedule->id_course = $this->id_course;
    			$schedule->tanggal_mulai = $this->tanggal_mulai;
                $schedule->tanggal_berakhir = $this->tanggal_berakhir;
                $schedule->text_info = $this->text_info;
                return $schedule->save() ? $schedule : null;
            } else {
                return null;
            }
        }else{
            return null;
        }
    }

    public function tampil($params)
    {
        $query = CourseSchedule::find()->select('id, id_course, tanggal_mulai, tanggal_berakhir, text_info');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['tanggal_mulai'=>SORT_ASC]],            
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'tanggal_mulai', $this->tanggal]);

        return $dataProvider;
    }
}
