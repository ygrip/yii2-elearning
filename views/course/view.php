<?php
/* @var $this yii\web\View */
use frontend\models\CourseMember;
use frontend\models\Course;
use common\models\User;
use yii\helpers\Html;

?>
<h1>Request List of Member in My Course</h1>

<?php
	//$titles = Yii::$app->db->createCommand('SELECT title FROM freebies')->queryColumn();
	$member = CourseMember::find()->select('id_user, id_course')->where(['status' => 0, 'id_user' => Yii::$app->user->identity->id])->all();
	foreach($member as $value){
?>
		<div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              	<h4 class="card-title">
              	<?php 
              		$idcourse = $value->id_course; 
              		$courses = Course::find()->select('title')->where(['id' => $idcourse])->one();
              		echo 'Course = '.$courses->title;
              	?>
          		</h4>
              <p class="card-text">
              	<?php 
              		$iduser = $value->id_user; 
              		$user = User::find()->select('username')->where(['id' => $iduser])->one();
              		echo 'Nama Member = '.$user->username;
              	?>
              </p>
            </div>
            <div class="card-footer">
              <?= Html::a('Accept', ['/course/updateenroll', 'iduser' => $value->id_user, 'idcourse' => $value->id_course], ['class'=>'btn btn-primary']) ?>
              <?= Html::a('Deny', ['/course/deleteenroll', 'iduser' => $value->id_user, 'idcourse' => $value->id_course], ['class'=>'btn btn-primary']) ?>
            </div>
          </div>
        </div>
<?php
	}
?>