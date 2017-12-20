<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$id_schedule = Yii::$app->request->get('idschedule');
?>
<h1>Buat Question</h1>

	<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-task']); ?>

                <?= $form->field($model, 'question')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'score') ?>   

                <?= $form->field($model, 'file')->fileInput()->label('Gambar untuk Question (Optional)') ?>

                <?= $form->field($model, 'id_schedule')->hiddenInput(['value'=> $id_schedule])->label(false) ?>
				
                <div class="form-group">
                    <?= Html::submitButton('Create Question', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>