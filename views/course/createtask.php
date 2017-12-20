<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$id_course = Yii::$app->request->get('idcourse');
$id_schedule = Yii::$app->request->get('idschedule');
?>
<h1>Buat Task Baru</h1>

	<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-task']); ?>

                <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'slug') ?>   

                <?= $form->field($model, 'description')->TextArea() ?>

                <?= $form->field($model, 'id_course')->hiddenInput(['value'=> $id_course])->label(false) ?>

                <?= $form->field($model, 'id_schedule')->hiddenInput(['value'=> $id_schedule])->label(false) ?>
				
                <div class="form-group">
                    <?= Html::submitButton('Create Task', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>