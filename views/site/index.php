<?php
/* @var $this yii\web\View */
$this->title = 'CGUARD';
?>
<div class="site-index">
    <div class="body-content " align="center">
        <div class="jumbotron">
            <?php

            use yii\helpers\Html;

//echo yii\bootstrap\Carousel::widget([
//        'id' => 'carousel-id',
//        'options' => ['style' => 'width:50%', 'class' => ''],
//        'items' => [
//            // the item contains only the image
//            //'<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg"/>',
//            // equivalent to the above
//            //['content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"/>'],
//            // the item contains both the image and the caption
//            [//Html::img('@web/images/CGUARD_LOGO_small2.png', ['alt'=>Yii::$app->name, 'class'=>"pull-left",'style'=>'width:95;height:97'])
//                'content' => Html::img('@web/images/building-the-global-system-18-638.jpg'),
//            // 'caption' => '<h4>Philippine National Plant Genetic Resources Laboratory</h4><p>This is the caption text</p>',
//            ],
//            [
//                'content' => Html::img('@web/images/18142458480_526cdbbdfa_b_small.jpg'),
//                'caption' => '<h4>Passport Data</h4><p>This is the caption text</p>',
//            //'options' => [...],
//            ],
//        ]
//    ]);
            ?>
            <h1>Welcome to CornBase</h1>

            <p class="lead">The corn genetic resources database system containing passport, characterization, conservation and management and seed accession data of the different corn germplasm.
            </p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div align="center"><a href="<?php echo \yii\helpers\Url::to(['/site/about']); ?>" class="btn-m btn-m-info btn-m-material-indigo btn-m-lg btn-m-fab btn-m-raised glyphicon glyphicon-grain"></a>
                    <h2>About Us</h2>
                </div>
                <div align="center">
                    <p>Corn Germplasm Utilization Through Advanced Research and Development or CGUARD is program of the Department of Agriculture with funding from the Bureau of Agricultural Research which ...
                    </p>

                    <p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::to(['/site/about']); ?>">About us &raquo;</a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <?php 
                if (Yii::$app->user->isGuest){
                    $mode='guest';
                }else{
                    $mode='corn';
                }
                ?>
                <div align="center"><a href="<?php echo \yii\helpers\Url::to(['/'.$mode.'/view/index']); ?>" class="btn-m btn-m-info btn-m-material-light-green btn-m-lg btn-m-fab btn-m-raised glyphicon glyphicon-leaf"></a>
                    <h2>Passport Data</h2>
                    <p>Browse the collection of germplasm on cereals, vegetables, food legumes, feed and industrial crops, medicinal plants, fruits, and in-vitro culture.</p>
                    <p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::to(['/'.$mode.'/view/index']); ?>">Browse &raquo;</a></p>
                </div>
            </div>

            <div class="col-lg-4">
                <div align="center"><a href="<?php echo \yii\helpers\Url::to(['/'.$mode.'/characterization/tabs']); ?>" class="btn-m btn-m-info btn-m-material-deep-orange btn-m-lg btn-m-fab btn-m-raised glyphicon glyphicon-list"></a>
                    <h2>Characterization Data</h2>

                    <p>Browse and search germplasm characteristics.</p>
                    <p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::to(['/'.$mode.'/characterization/tabs']); ?>">Browse &raquo;</a></p>
                </div>

            </div>

        </div>


    </div>
    <!-- <div class="body-content">
 
         <div class="row">
             <div class="col-lg-6">
                 <h2>About CGUARD</h2>
 
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                     dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                     ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                     fugiat nulla pariatur.</p>
 
                 <p><a class="btn-m btn-m-default" href="<?php echo \yii\helpers\Url::to(['/site/about']); ?>">About us &raquo;</a></p>
             </div>
 
             <div class="col-lg-6">
                 <h2>Passport Data</h2>
 
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                     dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                     ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                     fugiat nulla pariatur.</p>
 
                 <p><a class="btn-m btn-m-default" href="<?php echo \yii\helpers\Url::to(['/guest/browse/index']); ?>">Browse &raquo;</a></p>
             </div>
         </div>
 
     </div>
 </div>--->
    <script>
        // $('.carousel').carousel('cycle'); 
        $('.carousel-id').carousel({interval: 1000});
    </script>