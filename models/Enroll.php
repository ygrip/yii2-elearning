<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\CourseMember;

class Enroll extends Model
{
    /**
     * @var UploadedFile
     */

    public $id_course;
    public $id_user;

    public function upload()
    {
        $session = Yii::$app->session;
        if($session->has('user')){
            if ($this->validate()) {
    			$enroll = new CourseMember();
    			$enroll->id_user = $session->get('id');
    			$enroll->id_course = $this->id_course;
    			$enroll->status = 0;
                return $enroll->save() ? $enroll : null;
            } else {
                return null;
            }
        }else{
            return null;
        }
    }

    public function delete()
    {
        if ($this->validate()) {
            return CourseMember::deleteAll('id_user = :id_user AND id_course = :id_course', [':id_user' => $this->id_user, ':id_course' => $this->id_course]);
        } else {
            return null;
        }
    }

    public function update()
    {
        if ($this->validate()) {
            $connection = Yii::$app->db;
            return $connection->createCommand()->update('course_member', ['status' => 1], 'id_user = :id_user AND id_course = :id_course', [':id_user' => $this->id_user, ':id_course' => $this->id_course])->execute();
        } else {
            return null;
        }
    }
}
