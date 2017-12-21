<?php
use app\models\Users;

?>
<aside class="main-sidebar">

    <section class="sidebar">
        
        <!-- Sidebar user panel -->
        <?php 
        if (Yii::$app->session->has('admin')) {
        ?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <?php $user = Users::find()->where(['id'=>Yii::$app->session->get('id')])->one();
                ?>
                <p>Welcome, <br><?= $user['email']; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php
        }
        ?>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Admin Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Course', 'icon' => 'book', 'url' => ['admincourse/']],
                    ['label' => 'Course Type', 'icon' => 'file-text-o', 'url' => ['admincourse/coursetype']],
                    ['label' => 'User', 'icon' => 'user', 'url' => ['admincourse/user']],
                    ['label' => 'Question', 'icon' => 'question-circle', 'url' => ['/question']],
                    ['label' => 'Answer', 'icon' => 'pencil', 'url' => ['/answer']],
                    ['label' => 'Freebies (Free Content)', 'icon' => 'tag', 'url' => ['/freebies']],
                ],
            ]
        ) ?>

    </section>

</aside>
