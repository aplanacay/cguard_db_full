<?php
/* @var $this yii\web\View */
$this->title = 'CGUARD';

use yii\helpers\Url;
use yii\helpers\Html;
?>

<header id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/cornseeds.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1735.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1739.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1743.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1748.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1751.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1773.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1775.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1776.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1777.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1778.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1779.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div> <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1780.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('images/corn/IMG_1801.jpg');"></div>
            <!--<div class="carousel-caption">
                <h2>Caption 2</h2>
            </div> -->



        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

</header>
<div class="body-content " >

    <?php
//    echo yii\bootstrap\Carousel::widget([
//        'id' => 'carousel-id',
//        'options' => ['style' => 'width:50%', 'class' => ''],
//        'items' => [
//            // the item contains only the image
//            //'<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg"/>',
//            // equivalent to the above
//            //['content' => '<img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"/>'],
//            // the item contains both the image and the caption
//            [//Html::img('@web/images/CGUARD_LOGO_small2.png', ['alt'=>Yii::$app->name, 
//                'class' => "fill",
//                // 'style'=>'width:95;height:97',
//                'content' => \kartik\helpers\Html::img('@web/images/building-the-global-system-18-638.jpg'),
//            // 'caption' => '<h4>Philippine National Plant Genetic Resources Laboratory</h4><p>This is the caption text</p>',
//            ],
//            [
//                'content' => \kartik\helpers\Html::img('@web/images/18142458480_526cdbbdfa_b_small.jpg'),
//                'caption' => '<h4>Passport Data</h4><p>This is the caption text</p>',
//            //'options' => [...],
//            ],
//        ]
//    ]);
    ?>
    <?php
    if (Yii::$app->user->isGuest) {
        $mode = 'guest';
    } else {
        $mode = 'corn';
    }
    ?>
    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welcome to CornBase
            </h1>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> Passport Data</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Browse the collection of germplasm on cereals, vegetables, food legumes, feed and industrial crops, medicinal plants, fruits, and in-vitro culture.
                    </p>
                    <a href="<?php echo \yii\helpers\Url::to(['/' . $mode . '/view/index']); ?>" class="btn btn-default">Browse Passport Data</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-gift"></i> Characterization Data</h4>
                </div>
                <div class="panel-body">
                    <p>Browse and search germplasm characteristics.</p>
                    <br>
                    <a href="<?php echo \yii\helpers\Url::to(['/' . $mode . '/characterization/tabs']); ?>" class="btn btn-default">Browse Characterization Data</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->
    <div class="jumbotron">

        <!--
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
        if (Yii::$app->user->isGuest) {
            $mode = 'guest';
        } else {
            $mode = 'corn';
        }
        ?>
                    <div align="center"><a href="<?php echo \yii\helpers\Url::to(['/' . $mode . '/view/index']); ?>" class="btn-m btn-m-info btn-m-material-light-green btn-m-lg btn-m-fab btn-m-raised glyphicon glyphicon-leaf"></a>
                        <h2>Passport Data</h2>
                        <p>Browse the collection of germplasm on cereals, vegetables, food legumes, feed and industrial crops, medicinal plants, fruits, and in-vitro culture.</p>
                        <p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::to(['/' . $mode . '/view/index']); ?>">Browse &raquo;</a></p>
                    </div>
                </div>
        
                <div class="col-lg-4">
                    <div align="center"><a href="<?php echo \yii\helpers\Url::to(['/' . $mode . '/characterization/tabs']); ?>" class="btn-m btn-m-info btn-m-material-deep-orange btn-m-lg btn-m-fab btn-m-raised glyphicon glyphicon-list"></a>
                        <h2>Characterization Data</h2>
        
                        <p>Browse and search germplasm characteristics.</p>
                        <p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::to(['/' . $mode . '/characterization/tabs']); ?>">Browse &raquo;</a></p>
                    </div>
        
                </div>
        
            </div>
        -->
        <div class="featurette" id="about">
            <br>
            <br>
            <br>
            <br>
            <?php echo Html::img('@web/images/corn/cornseeds.jpg', ['class' => 'featurette-image img-circle img-responsive pull-right']); ?>
            <h2 class="featurette-heading">ABOUT
                <span class="text-muted">CornBase</span>
            </h2>
            <p align='justify'>
                CORNBASE is a corn genetic resources database system containing <b>passport</b>, <b>characterization</b>, conservation and management and <b>seed access data</b> of the different corn germplasm held at the <b>National Plant Genetic Resources Laboratory (NPGRL)</b>.  
            </p>
            <p align='justify'>
                The system was designed to facilitate data entry and retrieval of the different corn germplasm from different areas of the Philippines and the world.  

                A highlight of the database is the corn passport and characterization data of Philippine native corn collected from the different regions in the Philippines including <b>CAR</b>, <b>ARMM</b>, and <b>Negros Island regions</b> through the <b>CGUARD</b> project.  

                The focal persons of every region are tasked to submit the collected native corn germplasm to the national corn repository, NPGRL.  NPGRL is in charge of regeneration in case when the seeds of the sent accessions need to be increased for breeding and different support laboratories alongside with gathering of morpho-agronomic data.  These data are kept in hard copies and transcribed onto the database system, the Cornbase.  
            </p>
            <p align='justify'>
                Cornbase is accessible both by the curator and the public.  The public can only view, search and print the data selected from Cornbase while the curator can enter/edit, save, search and print the data of particular accession(s).

                Geophysical locations of the accessions are visible in a map.  Specific map point displays the accession number.

                Cornbase is accessible via the internet and in office computer 
            </p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
        <br>
        <br>
        <div class="featurette" id="work">
            <?php echo Html::img('@web/images/partners web large.png', ['class' => 'featurette-image img-responsive pull-left']); ?>
            <h2 class="featurette-heading">CornBase
                <span class="text-muted">OUR WORK</span>
            </h2>
            <p class="lead">
                <b>Corn Germplasm Utilization Through Advanced Research and Development</b> or <b>CGUARD</b> is program of the <b>Department of Agriculture</b> with funding from the <b>Bureau of Agricultural Research</b> which is implemented by the <b>Crop Science Cluster-Institute of Plant Breeding (CSC-IPB)</b> and the <b>Bureau of Plant Industry (BPI)</b>.

                CGUARD has several components and participated by various regions of the Philippines to collect and save what is left of the native corn germplasm.  Every accession is saved and characterized using agro-morphological descriptors to be used in breeding activities for improvement of corn varieties being used at present.  These are also evaluated for reaction to biotic and biotic stresses and those selected with the desired qualities are candidates as parents for corn improvement.

            </p>
        </div>


    </div>

    <script>
        // $('.carousel').carousel('cycle'); 
        //  $('.myCarousel').carousel({interval: 30});
    </script>