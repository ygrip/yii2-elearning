<?php
/* @var $this yii\web\View */
use app\models\Task;
use app\models\CourseSchedule;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$id_task = Yii::$app->request->get('idtask');

$task = Task::find()->select('title')->where(['id' => $id_task])->one();
?>
<h1>Upload Tugas <?php echo $task->title ?></h1>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'file')->fileInput()->label('Upload Tugas Anda Disini') ?>

            <?= $form->field($model, 'id_task')->hiddenInput(['value'=> $id_task])->label(false) ?>
                
            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
