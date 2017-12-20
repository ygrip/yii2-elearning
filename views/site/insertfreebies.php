<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\UploadFile */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Role;
use app\models\Freebies;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'Insert Freebies';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
			<?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data']]); ?>
			
				<?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
				
				<?= $form->field($model, 'description') ?>
				
				<?= $form->field($model, 'file')->fileInput()->label('File Freebies') ?>
			
			<div class="form-group">
				<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
