<?php
use yii\helpers\Url;
use yii\helpers\Html;


?>

<header id="user_header">
    <nav id="nav_head" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul id="nav_menu1" class="nav navbar-nav navbar-left">
                    <li><a id="nav-home" class="navbar-brand" href="<?= Url::to(['site/index']);?>"><img src="<?=Url::to('@web/images/app_icon.jpg')?>" height="50px" width="200px"></a></li>
                    <li class="left-navigate"><a href="<?= Url::to(['/']);?>"><strong>Home</strong></a></li>
                    <li class="left-navigate"><a href="<?= Url::to(['site/course']);?>"><strong>Course</strong></a></li>
                    <li class="left-navigate"><a href="<?= Url::to(['site/freebies']);?>"><strong>Freebies</strong></a></li>
                    <?php 
                        $session = Yii::$app->session;

                        if($session->has('teacher')){
                    ?>
                    <li class="left-navigate"><a href="<?= Url::to(['site/linechatbot']);?>"><strong>Line Chatbot Integration</strong></a></li>
                    <?php } ?>
                </ul>
                <ul id="nav_menu2" class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#"><strong>Register</strong></a></li> -->
                    <?php 
                    
                    if($session->has('user')||$session->has('teacher')||$session->has('admin')){
                    ?>
                    <li><?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', ]
                                ) ?></li>
                    <?php
                    }else{?>
                    <li><a href="<?= Url::to(['site/portal']);?>"><strong>Login</strong></a></li>

                    <?php
                }?>
                </ul>
            </div>
        </div>
    </nav>
</header>
