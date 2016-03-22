<style>
    .top-title {
        background-color: #88ba42;
        color: #fff;
        padding: 10px 30px;
        margin: 0;
        font-size: 37px;
    }


</style>
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About CornBase';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about" style="font-size:16px">
    <h1 class="top-title"><?= Html::encode($this->title) ?></h1>
    <div class="container-fluid">
        <div class="col-lg-6">
            <?php echo kartik\helpers\Html::img('@web/images/corn/cornseeds.jpg'); ?>
        </div>
        <div class="col-lg-6">
            <br>
            <br>
            <p>
                CORNBASE is a corn genetic resources database system containing <b>passport</b>, <b>characterization</b>, conservation and management and <b>seed access data</b> of the different corn germplasm held at the <b>National Plant Genetic Resources Laboratory (NPGRL)</b>.  

                The system was designed to facilitate data entry and retrieval of the different corn germplasm from different areas of the Philippines and the world.  

                A highlight of the database is the corn passport and characterization data of Philippine native corn collected from the different regions in the Philippines including <b>CAR</b>, <b>ARMM</b>, and <b>Negros Island regions</b> through the <b>CGUARD</b> project.  

                The focal persons of every region are tasked to submit the collected native corn germplasm to the national corn repository, NPGRL.  NPGRL is in charge of regeneration in case when the seeds of the sent accessions need to be increased for breeding and different support laboratories alongside with gathering of morpho-agronomic data.  These data are kept in hard copies and transcribed onto the database system, the Cornbase.  

                Cornbase is accessible both by the curator and the public.  The public can only view, search and print the data selected from Cornbase while the curator can enter/edit, save, search and print the data of particular accession(s).

                Geophysical locations of the accessions are visible in a map.  Specific map point displays the accession number.

                Cornbase is accessible via the internet and in office computer 

            </p>
        </div>
    </div>
</div>
