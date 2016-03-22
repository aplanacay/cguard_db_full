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
$this->title = 'Our Work';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about" style="font-size:16px">
    <h1 class="top-title"><?= Html::encode($this->title) ?></h1>
    <div class="container-fluid">
        <div class="col-lg-6">
            <?php echo kartik\helpers\Html::img('@web/images/partners web large.png'); ?>
            
        </div>
        <div class="col-lg-6">
            <br>
            <br>
            <p>
                <b>Corn Germplasm Utilization Through Advanced Research and Development</b> or <b>CGUARD</b> is program of the <b>Department of Agriculture</b> with funding from the <b>Bureau of Agricultural Research</b> which is implemented by the <b>Crop Science Cluster-Institute of Plant Breeding (CSC-IPB)</b> and the <b>Bureau of Plant Industry (BPI)</b>.

                CGUARD has several components and participated by various regions of the Philippines to collect and save what is left of the native corn germplasm.  Every accession is saved and characterized using agro-morphological descriptors to be used in breeding activities for improvement of corn varieties being used at present.  These are also evaluated for reaction to biotic and biotic stresses and those selected with the desired qualities are candidates as parents for corn improvement.


            </p>
        </div>
    </div>
</div>
