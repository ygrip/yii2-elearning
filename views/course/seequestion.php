<?php
/* @var $this yii\web\View */
use app\models\Course;
use app\models\UploadFileTask;
use app\models\CourseSchedule;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

$id_schedule = Yii::$app->request->get('idschedule');

$schedule = CourseSchedule::find()->select('id_course')->where(['id' => $id_schedule])->one();
$course = Course::find()->select('title')->where(['id' => $schedule->id_course])->one();
?>
<h1>Pertanyaan dari Course <?php echo $course->title ?></h1>

<p><h3>List Pertanyaan : </h3></p>
<?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'question', 'score',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{link}', 'buttons' => ['link' => function ($url,$model,$key) {
                return Html::a('Jawab', ['/course/seeanswer', 'id_question' => $key]);
                },],],
        ],
    ]);
?>
 