
<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = Yii::$app->name.' | Modul Belajar Online Terpadu';

?>

<!-- Home Start -->
<div id="section_home" class="container-fluid">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="img-responsive" src="<?=Url::to('@web/images/carousel1.jpg')?>" alt="Course">
                <!-- <div class="container">
                  <div class="carousel-caption">
                    <strong><h1>Course</h1></strong>
                      <p class="lead">This is course</p>
                      <a class="btn btn-large btn-primary" href="#">Get Started</a>
                    </div>
                  </div> -->
            </div>

            <div class="item">
                <img class="img-responsive" src="<?=Url::to('@web/images/carousel2.jpg')?>" alt="Freebies">
                <!-- <div class="container">
                  <div class="carousel-caption">
                    <strong><h1>Freebies</h1></strong>
                      <p class="lead">This is freebies</p>
                        <a class="btn btn-large btn-primary" href="#">Get Started</a>
                  </div>
                  </div> -->
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- Home End -->

<!-- Content Start-->
<div id="section_content" class="container-fluid">
    <div id="conten" class="body-content">
        <div class="container text-center">
            <h1>Content</h1><br>
            <div class="row">
                <div class="col-xs-6">
                    <h3>Course</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad  aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eufugiat nulla pariatur.</p>
                    <p><a class="btn btn-large btn-primary" href="<?= Url::to(['site/course']);?>">See Course &raquo;</a></p>
                </div>

                <div class="col-xs-6">
                    <h3>Freebies</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adip veniam, quis nostrud exercitation ullamco laboris nisi ut aliquipex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eufugiat nulla pariatur.</p>
                    <p><a class="btn btn-large btn-primary" href="<?= Url::to(['site/freebies']);?>">See Freebies &raquo;</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content End -->

<div id="section_quotes">
    <h1>Quotes</h1>
    <div id="quote_img" class="container-fluid">
        <div id="quote_text" class="container-fluid">
            <blockquote class="blockquote-reverse">
                <h3>Education is the most powerful weapon which you can use to change the world.</h3>
                <footer>From ...</footer>
            </blockquote>
        </div>
    </div>
</div>


<div id="section_tutor" class="container-fluid">
    <h1>Tutor</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="<?=Url::to('@web/images/tutor1.png')?>" alt="">
                    <h3>Kay Garland</h3>
                    <p class="text-muted">Lead Designer</p>
                    <p><a class="btn btn-large btn-primary" href="">See Tutor &raquo;</a></p>
                    <!-- <ul class="list-inline social-buttons">
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-twitter"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-linkedin"></i>
                        </a>
                      </li>
                    </ul> -->
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="<?=Url::to('@web/images/tutor2.png')?>" alt="">
                    <h3>Larry Parker</h3>
                    <p class="text-muted">Lead Marketer</p>
                    <p><a class="btn btn-large btn-primary" href="">See Tutor &raquo;</a></p>
                    <!-- <ul class="list-inline social-buttons">
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-twitter"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-linkedin"></i>
                        </a>
                      </li>
                    </ul> -->
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="<?=Url::to('@web/images/tutor3.png')?>" alt="">
                    <h3>Diana Pertersen</h3>
                    <p class="text-muted">Lead Developer</p>
                    <p><a class="btn btn-large btn-primary" href="">See Tutor &raquo;</a></p>
                    <!-- <ul class="list-inline social-buttons">
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-twitter"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-linkedin"></i>
                        </a>
                      </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Testimoni -->
<!-- <div id="portfolio" class="container-fluid text-center bg-grey"> -->
<!--   <div id="testimonial" class="testimonial-area">
    <div class="container text-center">
      <h2>Testimoni</h2>
      <div id="myCarousel-2" class="carousel slide text-center" data-ride="carousel"> -->
<!-- Indicators -->
<!-- <ol class="carousel-indicators">
  <li data-target="#myCarousel-2" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel-2" data-slide-to="1"></li>
  <li data-target="#myCarousel-2" data-slide-to="2"></li>
</ol> -->

<!-- Wrapper for slides -->
<!-- <div class="carousel-inner" role="listbox">
  <div class="item active">
    <h4>"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span></h4>
  </div> -->

<!-- <div class="item">
  <img class="img-responsive" src="images\news.jpg" alt="News" width="1200" height="700">
  <div class="container">
      <div class="carousel-caption">
          <strong><h1>News</h1></strong>
          <p class="lead">This is news</p>
      </div>
  </div>
  </div> -->

<!--  <div class="item">
   <h4>"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
 </div>
 <div class="item">
   <h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span></h4>
 </div>
</div> -->

<!-- Left and right controls -->
<!-- <a class="left carousel-control" href="#myCarousel-2" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel-2" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div>
</div> -->
<!-- End of Testimoni -->

<!-- <div class="container text-center">
  <h3>What We Do</h3><br>
  <div class="row">
    <div class="col-xs-6">
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Current Project</p>
    </div>
    <div class="col-xs-6">
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Project 2</p>
    </div>
  </div>
</div><br> -->