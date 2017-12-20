<?php
/* @var $this yii\web\View */
use frontend\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>List My Course</h1>

<p>
<?= Html::a('See Request Member in My Course', ['/course/view'], ['class'=>'btn btn-primary grid-button']) ?>
</p>

<?php
	$member = Course::find()->select('title, description, id, course_image')->where(['mentor' => Yii::$app->user->identity->id])->all();
	foreach($member as $value){
?>
		<div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src= <?php echo Url::base().'/uploads/course/images/'.$value->course_image; ?> style="height: 200px; width: 300px;"alt="">
            <div class="card-body">
              	<h4 class="card-title"><?php echo $value->title ?></h4>
              <p class="card-text"><?php echo $value->description ?></p>
            </div>
            <div class="card-footer">
              <?= Html::a('See More', ['/course/seecourse', 'idcourse' => $value->id], ['class'=>'btn btn-primary']) ?>
            </div>
          </div>
        </div>
<?php
	}
?>