<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Line Chatbot Integration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<p>
	<?= Html::a('Klik disini untuk Generate Kode Verifikasi', ['/site/generaterandom'], ['class'=>'btn btn-primary grid-button']) ?>
</p>

<p><h3>Masukkan Kode Berikut : </h3></p>

<h3><?php echo $random_angka; ?></h3>
