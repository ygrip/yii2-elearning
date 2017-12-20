<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\CourseType;
use yii\helpers\ArrayHelper;

?>
<h1>Buat Course Baru</h1>

	<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'slug') ?>   

                <?= $form->field($model, 'description')->TextArea() ?>

                <?= $form->field($model, 'file')->fileInput()->label('Gambar Course') ?>
				
				<?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(CourseType::find()->all(),'id','type_name'),['prompt'=>'Select Course Type']); ?>
				
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>