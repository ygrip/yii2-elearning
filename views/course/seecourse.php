<?php
/* @var $this yii\web\View */
use frontend\models\Course;
use frontend\models\Lesson;
use common\models\CourseSchedule;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

$id_course = Yii::$app->request->get('idcourse');

$course = Course::find()->select('title')->where(['id' => $id_course])->one();
?>
<h1>Course <?php echo $course->title ?></h1>

<p>
<?= Html::a('Create Schedule', ['/course/schedule', 'idcourse' => $id_course], ['class'=>'btn btn-primary grid-button']) ?>
</p>

<p>
<?= Html::a('Create Lesson', ['/course/createlesson', 'idcourse' => $id_course], ['class'=>'btn btn-primary grid-button']) ?>
</p>

<p><h3>List Schedule : </h3></p>
<?=
	GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tanggal_mulai', 'tanggal_berakhir','text_info',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{link}', 'buttons' => ['link' => function ($url,$model,$key) {
                                return Html::a('Lihat Schedule', ['/course/seeschedule', 'idschedule' => $key]);
                },],],
        ],
    ]);
?>

<p><h3>List Lesson : </h3></p>

<?php
    $lesson = Lesson::find()->select('title, id, lesson_image')->where(['id_course' => $id_course])->all();
    foreach($lesson as $value){
?>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src= <?php echo Url::base().'/uploads/course/images/'.$value->lesson_image; ?> style="height: 200px; width: 300px;"alt="">
            <div class="card-body">
                <h4 class="card-title"><?php echo $value->title ?></h4>
            </div>
            <div class="card-footer">
              <?= Html::a('See More', ['/course/seelesson', 'idlesson' => $value->id], ['class'=>'btn btn-primary']) ?>
            </div>
          </div>
        </div>
<?php
    }
?>
