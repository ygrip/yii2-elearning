<?php

namespace app\controllers;

use Yii;
use app\models\CourseOperation;
use app\models\LessonOperation;
use app\models\TaskOperation;
use app\models\QuestionOperation;
use app\models\AnswerOperation;
use app\models\UploadFileTaskOperation;
use app\models\Enroll;
use app\models\Schedule;
use yii\web\UploadedFile;

class CourseController extends \yii\web\Controller
{

    public function actionCreate()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2){
            $model = new CourseOperation();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->upload()) {
                    // file is uploaded successfully
                    return $this->redirect(['site/course']);
                }
            }

            return $this->render('create', ['model' => $model]);
        }else{
            return $this->redirect('site/login');

        }
    }

    public function actionEnroll()
    {
        $session = Yii::$app->session;
        if($session->has("user")&&$session->get('role')==3){
            $model = new Enroll();

            $model->id_course = Yii::$app->request->get('id');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['site/course']);
            }
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionDeleteenroll()
    {
        $session = Yii::$app->session;
        if($session->has("user")&&$session->get('role')==3){
            $model = new Enroll();

            $model->id_course = Yii::$app->request->get('idcourse');
            $model->id_user = Yii::$app->request->get('iduser');
            if ($model->delete()) {
                // file is uploaded successfully
                return $this->redirect(['site/course']);
            }
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2||$session->has("user")&&$session->get('role')==3){
            return $this->render('index');
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionUpdateenroll()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2){
            $model = new Enroll();

            $model->id_course = Yii::$app->request->get('idcourse');
            $model->id_user = Yii::$app->request->get('iduser');
            if ($model->update()) {
                // file is uploaded successfully
                return $this->redirect(['view']);
            }
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionSee()
    {
        $session = Yii::$app->session;
        if($session->has("user")&&$session->get('role')==3||$session->has("teacher")&&$session->get('role')==2){
            return $this->render('see');
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2){
            return $this->render('view');
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionSeecourse()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2){
            $model = new Schedule();
            $dataProvider = $model->tampil(Yii::$app->request->queryParams);

            return $this->render('seecourse', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionSchedule()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2){
            $model = new Schedule();

            if ($model->load(Yii::$app->request->post())) {
                $id_course = Yii::$app->request->get('idcourse');
                if ($model->upload()) {
                    // file is uploaded successfully
                    return $this->redirect(['seecourse', 'idcourse' => $id_course]);
                }
            }

            return $this->render('schedule', ['model' => $model]);
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionCreatelesson()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2){
            $model = new LessonOperation();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $id_course = Yii::$app->request->get('idcourse');
                if ($model->upload()) {
                    // file is uploaded successfully
                    return $this->redirect(['seecourse', 'idcourse' => $id_course]);
                }
            }

            return $this->render('createlesson', ['model' => $model]);
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionCreatetask()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2){
            $model = new TaskOperation();

            if ($model->load(Yii::$app->request->post())) {
                $id_schedule = Yii::$app->request->get('idschedule');
                if ($model->upload()) {
                    // file is uploaded successfully
                    return $this->redirect(['seeschedule', 'idschedule' => $id_schedule]);
                }
            }

            return $this->render('createtask', ['model' => $model]);
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionSeeschedule()
    {
        $session = Yii::$app->session;
        if($session->has("user")&&$session->get('role')==3||$session->has("teacher")&&$session->get('role')==2){
            $model = new TaskOperation();
            $dataProvider = $model->tampil(Yii::$app->request->queryParams);

            return $this->render('seeschedule', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionSeetask()
    {
        $session = Yii::$app->session;
        if($session->has("admin")&&$session->get('role')==3||$session->has("teacher")&&$session->get('role')==2){
            $model = new UploadFileTaskOperation();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $id_schedule = Yii::$app->request->get('idschedule');
                if ($model->upload()) {
                    // file is uploaded successfully
                    return $this->redirect(['seeschedule', 'idschedule' => $id_schedule]);
                }
            }

            return $this->render('seetask', ['model' => $model]);
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionCreatequestion()
    {
        $session = Yii::$app->session;
        if($session->has("teacher")&&$session->get('role')==2){
            $model = new QuestionOperation();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $id_schedule = Yii::$app->request->get('idschedule');
                if ($model->upload()) {
                    // file is uploaded successfully
                    return $this->redirect(['seeschedule', 'idschedule' => $id_schedule]);
                }
            }

            return $this->render('createquestion', ['model' => $model]);
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionSeequestion()
    {
        $session = Yii::$app->session;
        if($session->has("user")&&$session->get('role')==3||$session->has("teacher")&&$session->get('role')==2){
            $model = new QuestionOperation();
            $dataProvider = $model->tampil(Yii::$app->request->queryParams);

            return $this->render('seequestion', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->redirect('site/login');
        }
    }

    public function actionSeeanswer()
    {
        $session = Yii::$app->session;
        if($session->has("user")&&$session->get('role')==3||$session->has("teacher")&&$session->get('role')==2){
            $model = new AnswerOperation();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $id_schedule = Yii::$app->request->get('idschedule');
                if ($model->upload()) {
                    // file is uploaded successfully
                    return $this->redirect(['seequestion', 'idschedule' => $id_schedule]);
                }
            }

            return $this->render('seeanswer', ['model' => $model]);
        }else{
            return $this->redirect('site/login');
        }
    }
}
