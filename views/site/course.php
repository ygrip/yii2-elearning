<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Course;
use yii\helpers\Url;
use app\models\Users;
use app\models\CourseMember;

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
        <p>
        <?php 
            if(Yii::$app->session->get('teacher')||Yii::$app->session->get('admin')){
                echo Html::a('Create Course', ['/course/create'], ['class'=>'btn btn-primary grid-button']);
                echo Html::a('See Request Member in My Course', ['/course/view'], ['class'=>'btn btn-primary grid-button']);
            }
        ?>
        </p>
    </div>

    <div id="course_content" class="container text-center">
    <?php
    $session = Yii::$app->session;
    if(Yii::$app->session->get('teacher')){
        $member = Course::find()->select('title, description, id, course_image')->where(['mentor' => $session->get('id')])->all();
            foreach($member as $value){
        ?>
                <div class="col-sm-4 my-4">
                    <div class="card_box">
                        <img class="card-img-top" src=<?php echo Url::base().'/uploads/course/images/'.$value->course_image; ?> style="height: 200px; width: 300px;" alt="">
                        <div class="card_body">
                            <h4 class="card_title"><?php echo $value->title ?></h4>
                            <p class="card_text"><?php echo $value->description ?></p>
                        </div>
                        <div class="card_footer">
                            <?= Html::a('See More', ['/course/seecourse', 'idcourse' => $value->id], ['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else if(Yii::$app->session->get('user')){
            //$titles = Yii::$app->db->createCommand('SELECT title FROM freebies')->queryColumn();
            $course = Course::find()->select('id, title, mentor, description, course_image')->all();
            foreach($course as $value){
        ?>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src=<?php echo Url::base().'/uploads/course/images/'.$value->course_image; ?> style="height: 200px; width: 300px;" alt="">
            <div class="card-body">
              <h4 class="card-title"><?php echo $value->title ?></h4>
              <p class="card-text"><?php echo $value->description?></p>
            </div>
            <div class="card-footer">
            <?php 
            $member = CourseMember::find()->select('id_user, id_course')->where(['id_user' => $session->get('id'), 'id_course' => $value->id])->one();
            if(empty($member)){
              echo Html::a('Enroll Me!', ['/course/enroll', 'id' => $value->id], ['class'=>'btn btn-primary']);
            }else{
              echo Html::a('Unroll Me!', ['/course/deleteenroll', 'idcourse' => $value->id, 'iduser' => $session->get('id')], ['class'=>'btn btn-primary']);
            }
            ?>
            </div>
          </div>
        </div>
<?php
    }
?>
        <?php
        }else{
            $member = Course::find()->all();
            foreach($member as $value){
    ?>
            <div class="col-sm-4 my-4">
                    <div class="card_box">
                        <img class="card-img-top" src=<?php echo Url::base().'/uploads/course/images/'.$value->course_image; ?> style="height: 200px; width: 300px;" alt="">
                        <div class="card_body">
                            <h4 class="card_title"><?php echo $value->title ?></h4>
                            <p class="card_text"><?php echo $value->description ?></p>
                        </div>
                        <div class="card_footer">
                            <?= Html::a('See More', ['/course/seecourse', 'idcourse' => $value->id], ['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    ?>

        </div>

    </div>
    <!-- /.container -->
</div>