<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Portal Login | '.Yii::$app->name;
?>

<div id="site-portal-login">
    <div class="container">
        <h1>Silahkan Login Ke Akun Anda</h1>
        <div class="row">
            <div class="col-xs-6">
                <div class="section-teacher">
                    <img src="//d2okwufrqlyqjo.cloudfront.net/images/imgteacher-28459f5a.png">
                    <a class="button button-green big signin" href="<?= Url::to(['site/login','identifier'=>'guru']);?>">Portal Guru</a>
                    <p>Akses akun Guru atau Admin Anda.</p>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="section-student">
                    <img src="//d2okwufrqlyqjo.cloudfront.net/images/imgstudent-f9125f74.png">
                    <a class="button button-lemon big signin" data-id="student" href="<?= Url::to(['site/login','identifier'=>'siswa']);?>" >Portal Siswa</a>
                    <p>Masuk ke akun Siswa atau buat akun baru.</p>
                </div>
            </div>
        </div>
    </div>
</div>