<?php
/* @var $this yii\web\View */
use app\models\Course;
use app\models\QuestionOptions;
use app\models\CourseSchedule;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$id_question = Yii::$app->request->get('id_question');
?>

<p><h3>Jawaban : </h3></p>
<?php $form = ActiveForm::begin(['id' => 'form-answer']); ?>

<?php
$member = QuestionOptions::find()->select('option_text')->where(['id_question' => $id_question])->all();
    foreach($member as $value){
        echo $form->field($model,'jawaban')->radio(['value' => $value->option_text]); 
    }
?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

<?php ActiveForm::end(); ?>