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

$this->title = 'Freebies';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?= Html::a('Insert Freebies', ['/site/insertfreebies'], ['class'=>'btn btn-primary grid-button']) ?>
	</p>
    <div class="row">
        <div class="col-lg-5">
        	<p><h3>List Freebies : </h3></p>
			<?php
				//$titles = Yii::$app->db->createCommand('SELECT title FROM freebies')->queryColumn();
				$freebies = Freebies::find()->select('title, description, filename')->all();
				foreach($freebies as $value){
					Modal::begin([
						'toggleButton' => ['tag' => 'a', 'label' => $value->title, 'class' => 'btn btn-primary grid-button'],
					]);

					echo \yii2assets\pdfjs\PdfJs::widget([
					  'url' => Url::base().'/uploads/'.$value->filename
					]);

					Modal::end();
				}
			?>
        </div>
    </div>
</div>
