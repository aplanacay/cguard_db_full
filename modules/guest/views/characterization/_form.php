<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CharacterizationBase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="characterization-base-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'germplasm_id')->textInput() ?>

    <?= $form->field($model, 'days_to_emergence')->textInput() ?>

    <?= $form->field($model, 'days_to_tasseling')->textInput() ?>

    <?= $form->field($model, 'days_to_slking')->textInput() ?>

    <?= $form->field($model, 'days_to_harvest')->textInput() ?>

    <?= $form->field($model, 'tillering_index')->textInput() ?>

    <?= $form->field($model, 'stem_color')->textInput() ?>

    <?= $form->field($model, 'sheath_pubescence')->textInput() ?>

    <?= $form->field($model, 'total_number_of_leaves_per_plant')->textInput() ?>

    <?= $form->field($model, 'leaf_length')->textInput() ?>

    <?= $form->field($model, 'leaf_width')->textInput() ?>

    <?= $form->field($model, 'leaf_orientation')->textInput() ?>

    <?= $form->field($model, 'presence_of_leaf_ligule')->textInput() ?>

    <?= $form->field($model, 'venation_index')->textInput() ?>

    <?= $form->field($model, 'tassel_type')->textInput() ?>

    <?= $form->field($model, 'silk_color')->textInput() ?>

    <?= $form->field($model, 'tassel_color')->textInput() ?>

    <?= $form->field($model, 'plant_height')->textInput() ?>

    <?= $form->field($model, 'ear_height')->textInput() ?>

    <?= $form->field($model, 'foliage')->textInput() ?>

    <?= $form->field($model, 'number_of_leaves_above_upper_ear')->textInput() ?>

    <?= $form->field($model, 'number_of_leaves_below_upper_ear')->textInput() ?>

    <?= $form->field($model, 'number_of_internodes_below_uppermost_ear')->textInput() ?>

    <?= $form->field($model, 'number_of_internodes_on_the_whole_stem')->textInput() ?>

    <?= $form->field($model, 'stem_diameter_at_the_base')->textInput() ?>

    <?= $form->field($model, 'stem_diameter_below_uppermost_ear')->textInput() ?>

    <?= $form->field($model, 'tassel_length')->textInput() ?>

    <?= $form->field($model, 'tassel_peduncle_length')->textInput() ?>

    <?= $form->field($model, 'tassel_branching_space')->textInput() ?>

    <?= $form->field($model, 'number_of_primary_branches_on_tassel')->textInput() ?>

    <?= $form->field($model, 'number_of_secondary_branches_on_tassel')->textInput() ?>

    <?= $form->field($model, 'number_of_tertiary_branches_on_tassel')->textInput() ?>

    <?= $form->field($model, 'stay_green')->textInput() ?>

    <?= $form->field($model, 'days_to_ear_leaf_inflorescence')->textInput() ?>

    <?= $form->field($model, 'stalk_lodging')->textInput() ?>

    <?= $form->field($model, 'husk_cover')->textInput() ?>

    <?= $form->field($model, 'husk_fitting')->textInput() ?>

    <?= $form->field($model, 'husk_tip_shape')->textInput() ?>

    <?= $form->field($model, 'ear_shape')->textInput() ?>

    <?= $form->field($model, 'ear_tip_shape')->textInput() ?>

    <?= $form->field($model, 'ear_orientation')->textInput() ?>

    <?= $form->field($model, 'ear_length')->textInput() ?>

    <?= $form->field($model, 'ear_diameter')->textInput() ?>

    <?= $form->field($model, 'cob_diameter')->textInput() ?>

    <?= $form->field($model, 'rachs_diameter')->textInput() ?>

    <?= $form->field($model, 'peduncle_length')->textInput() ?>

    <?= $form->field($model, 'number_of_bracts')->textInput() ?>

    <?= $form->field($model, 'kernel_row_arrangement')->textInput() ?>

    <?= $form->field($model, 'number_of_kernel_rows')->textInput() ?>

    <?= $form->field($model, 'number_of_kernels__per_row')->textInput() ?>

    <?= $form->field($model, 'cob_color')->textInput() ?>

    <?= $form->field($model, 'grain_shedding')->textInput() ?>

    <?= $form->field($model, 'kernel_type')->textInput() ?>

    <?= $form->field($model, 'kernel_color')->textInput() ?>

    <?= $form->field($model, 'kernel_length')->textInput() ?>

    <?= $form->field($model, 'kernel_width')->textInput() ?>

    <?= $form->field($model, 'kernel_thickness')->textInput() ?>

    <?= $form->field($model, 'shape_of_upper_kernel_surface')->textInput() ?>

    <?= $form->field($model, 'pericarp_color')->textInput() ?>

    <?= $form->field($model, 'aleurone_color')->textInput() ?>

    <?= $form->field($model, 'endosperm_color')->textInput() ?>

    <?= $form->field($model, 'unshelled_weight')->textInput() ?>

    <?= $form->field($model, 'shelled_weight')->textInput() ?>

    <?= $form->field($model, 'kernel_weight')->textInput() ?>

    <?= $form->field($model, 'shellpc')->textInput() ?>

    <?= $form->field($model, 'creator_id')->textInput() ?>

    <?= $form->field($model, 'creation_timestamp')->textInput() ?>

    <?= $form->field($model, 'modifier_id')->textInput() ?>

    <?= $form->field($model, 'modification_timestamp')->textInput() ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_void')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
A Product of Yii Software LLC