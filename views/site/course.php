<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Courses | '.Yii::$app->name;
?>

<div id="site-course">
    <div id="topbar">
        <div class="container">
            <h1 class="page-title">Courses</h1>
            <!-- <p class="breadcrumb m-b-0">
              <span xmlns:v="http://rdf.data-vocabulary.org/#">
                <span typeof="v:Breadcrumb">
                  <a href="https://www.loker.id/" rel="v:url" property="v:title">Beranda</a> &gt;
                  <span class="breadcrumb_last">Pasang Iklan Lowongan Kerja</span>
                </span>
              </span>
            </p> -->
        </div>
    </div>

    <div id="search_course" class="container">
        <div class="row">
            <div class="col-l-8">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Search by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#kelas">Kelas</a></li>
                            <li><a href="#rating">Rating</a></li>
                            <li><a href="#mapel"> Mata Pelajaran</a></li>
                            <li class="divider"></li>
                            <li><a href="#all">Semua</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search term...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
                </div>
            </div>
        </div>
    </div>

    <div id="course_content" class="container text-center">
        <div class="row">
            <div class="col-sm-4 my-4">
                <div class="card_box">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card_body">
                        <h4 class="card_title">Card title</h4>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                    </div>
                    <div class="card_footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 my-4">
                <div class="card_box">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card_body">
                        <h4 class="card_title">Card title</h4>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                    </div>
                    <div class="card_footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 my-4">
                <div class="card_box">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card_body">
                        <h4 class="card_title">Card title</h4>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                    </div>
                    <div class="card_footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-sm-4 my-4">
                <div class="card_box">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card_body">
                        <h4 class="card_title">Card title</h4>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                    </div>
                    <div class="card_footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 my-4">
                <div class="card_box">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card_body">
                        <h4 class="card_title">Card title</h4>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                    </div>
                    <div class="card_footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 my-4">
                <div class="card_box">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card_body">
                        <h4 class="card_title">Card title</h4>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                    </div>
                    <div class="card_footer">
                        <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
</div>