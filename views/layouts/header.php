<?php
use yii\helpers\Url;

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
                </ul>
                <ul id="nav_menu2" class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#"><strong>Register</strong></a></li> -->
                    <li><a href="<?= Url::to(['site/portal']);?>"><strong>Login</strong></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
