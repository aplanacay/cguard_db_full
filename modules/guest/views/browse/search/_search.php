<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\corn\models\GermplasmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="germplasm-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['view/index'],
                'method' => 'get',
        'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        ['label' => 'col-sm-6',
                            'offset' => 'col-sm-offset-4',
                            'wrapper' => 'col-sm-6',
                            'error' => '',
                            'hint' => '',
                        ],
//            [
//            'label2' => 'col-sm-2',
//            'offset2' => 'col-sm-offset-4',
//            'wrapper2' => 'col-sm-4',
//            'error2' => '',
//            'hint2' => '',
//                ]
                    ],
                ],
    ]);
    ?>

<div class="panel-body " >
    <?php
    echo '<div class="col-md-4">';

    echo $form->field($model, 'phl_no');
    echo $form->field($model, 'variety_name');


    echo '</div><div class="col-md-4">';
    echo $form->field($model, 'gb_no');

    echo $form->field($model, 'scientific_name');
    echo '</div><div class="col-md-4">';
    echo $form->field($model, 'old_acc_no')->label('Old Accession No');
    echo '</div>';
    ?>
</div>
<hr></hr>
<?php
echo '<div class="col-md-4">';
//echo $form->field($model->crop, 'name')->label('Crop group');

echo $form->field($model, 'dialect');

echo $form->field($model, 'grower');

echo $form->field($model, 'count_coll');

//echo $form->field($model, 'prov');
//
//echo $form->field($model, 'town');
//
//echo $form->field($model, 'barangay');

//echo $form->field($model, 'sitio');

echo $form->field($model, 'acq_date');
echo '</div><div class="col-md-4">';
//echo $form->field($model, 'latitude');
//
//echo $form->field($model, 'longitude');
//
//echo $form->field($model, 'altitude');

echo $form->field($model, 'coll_source')->label('Collecting source');

echo $form->field($model, 'gen_stat')->label('Genetic status');

echo $form->field($model, 'sam_type')->label('Sample type');

echo $form->field($model, 'sam_met')->label('Sampling methods');

echo $form->field($model, 'mat')->label('Material collected');
echo '</div><div class="col-md-4">';
echo $form->field($model, 'topo')->label('Topography');

echo $form->field($model, 'site');

echo $form->field($model, 'soil_tex')->label('Soil texture');

echo $form->field($model, 'drain')->label('Drainage');

echo $form->field($model, 'soil_col')->label('Soil color');

echo $form->field($model, 'ston')->label('Stoniness');
echo '</div>';
?>
    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
