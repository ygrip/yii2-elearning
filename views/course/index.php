<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\Course;
use app\models\User;
use yii\helpers\Url;
use app\models\CourseMember;

?>
<h1>List Course</h1>

<p>
<?= Html::a('Create Course', ['/course/create'], ['class'=>'btn btn-primary grid-button']) ?>
</p>

<?php
	//$titles = Yii::$app->db->createCommand('SELECT title FROM freebies')->queryColumn();
	$course = Course::find()->select('id, title, mentor, description, course_image')->all();
	foreach($course as $value){
?>
		<div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src=<?php echo Url::base().'/uploads/course/images/'.$value->course_image; ?> style="height: 200px; width: 300px;" alt="">
            <div class="card-body">
              <h4 class="card-title"><?php echo $value->title ?></h4>
              <p class="card-text">
                <?php 
                  $mentor = $value->mentor; 
                  $course = User::find()->select('username')->where(['id' => $mentor])->one();
                  echo 'Mentor = ' . $course->username;
                ?>
              </p>
              <p class="card-text"><?php echo $value->description?></p>
            </div>
            <div class="card-footer">
            <?php 
            $member = CourseMember::find()->select('id_user, id_course')->where(['id_user' => Yii::$app->user->identity->id, 'id_course' => $value->id])->one();
            if(empty($member)){
              echo Html::a('Enroll Me!', ['/course/enroll', 'id' => $value->id], ['class'=>'btn btn-primary']);
            }else{
              echo Html::a('Unroll Me!', ['/course/deleteenroll', 'idcourse' => $value->id, 'iduser' => Yii::$app->user->identity->id], ['class'=>'btn btn-primary']);
            }
            ?>
            </div>
          </div>
        </div>
<?php
	}
?>