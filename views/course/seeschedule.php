<?php
/* @var $this yii\web\View */
use frontend\models\Course;
use frontend\models\UploadFileTask;
use frontend\models\CourseSchedule;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

$id_schedule = Yii::$app->request->get('idschedule');

$schedule = CourseSchedule::find()->select('id_course')->where(['id' => $id_schedule])->one();
$course = Course::find()->select('title')->where(['id' => $schedule->id_course])->one();
?>
<h1>Task dari Course <?php echo $course->title ?></h1>

<p>
<?= Html::a('Create Task', ['/course/createtask', 'idcourse' => $schedule->id_course, 'idschedule' => $id_schedule], ['class'=>'btn btn-primary grid-button']) ?>
</p>

<p>
<?= Html::a('Create Question', ['/course/createquestion', 'idschedule' => $id_schedule], ['class'=>'btn btn-primary grid-button']) ?>
</p>

<p><h3>List Task : </h3></p>
<?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title', 'description',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{link}', 'buttons' => ['link' => function ($url,$model,$key) {
                $upload = UploadFileTask::find()->select('id_user')->where(['id_user' => Yii::$app->user->identity->id, 'id_task' => $key])->one();
                if(empty($upload)){
                    return Html::a('Upload Tugas', ['/course/seetask', 'idtask' => $key, 'idschedule' => $model->id_schedule]);
                }else{
                    return Html::a('Anda Sudah Upload');
                }
                },],],
        ],
    ]);
?>

<p><h3>List Question : </h3></p>
<p>
<?= Html::a('Lihat Pertanyaan', ['/course/seequestion', 'idschedule' => $id_schedule], ['class'=>'btn btn-primary grid-button']) ?>
</p>
 