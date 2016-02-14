<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\GermplasmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="germplasm-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);


    echo $form->field($model, 'phl_no')
    ?>

    <?php //$form->field($model, 'creator_id')  ?>

    <?php //$form->field($model, 'creation_timestamp')  ?>

    <?php //$form->field($model, 'modifier_id')  ?>

    <?php //echo $form->field($model, 'modification_timestamp')  ?>



    <?php echo $form->field($model, 'old_acc_no') ?>

    <?php echo $form->field($model, 'gb_no') ?>
    
    <?php echo $form->field($model, 'crop_id') ?>

    <?php echo $form->field($model, 'collecting_no') ?>

    <?php echo $form->field($model, 'variety_name') ?>

    <?php echo $form->field($model, 'dialect') ?>

    <?php // echo $form->field($model, 'grower')  ?>

    <?php echo $form->field($model, 'scientific_name') ?>

    <?php echo $form->field($model, 'count_coll') ?>

    <?php echo $form->field($model, 'prov') ?>

    <?php echo $form->field($model, 'town') ?>

    <?php echo $form->field($model, 'barangay') ?>

    <?php echo $form->field($model, 'sitio') ?>

    <?php
//    echo $form->field($model, 'acq_date')
//
//    echo $form->field($model, 'latitude')
//
//    echo $form->field($model, 'longitude')
//
//    echo $form->field($model, 'altitude')
//
//    echo $form->field($model, 'coll_source')
//
//    echo $form->field($model, 'gen_stat')
//
//    echo $form->field($model, 'sam_type')
//
//    echo $form->field($model, 'sam_met')
//
//    echo $form->field($model, 'mat')
//
//    echo $form->field($model, 'topo')
//
//    echo $form->field($model, 'site')
//
//    echo $form->field($model, 'soil_tex')
//
//    echo $form->field($model, 'drain')
//
//    echo $form->field($model, 'soil_col')
//
//    echo $form->field($model, 'ston')
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
