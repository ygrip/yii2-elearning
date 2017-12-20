<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$id_course = Yii::$app->request->get('idcourse');
?>
<h1>Buat Lesson Baru</h1>

	<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'slug') ?>   

                <?= $form->field($model, 'text')->TextArea() ?>

                <?= $form->field($model, 'file')->fileInput()->label('Gambar Lesson') ?>

                <?= $form->field($model, 'id_course')->hiddenInput(['value'=> $id_course])->label(false) ?>
				
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>