<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\corn\models\CharacterizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Characterization Bases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characterization-base-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Characterization Base', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'germplasm_id',
            'days_to_emergence',
            'days_to_tasseling',
            'days_to_slking',
            // 'days_to_harvest',
            // 'tillering_index',
            // 'stem_color',
            // 'sheath_pubescence',
            // 'total_number_of_leaves_per_plant',
            // 'leaf_length',
            // 'leaf_width',
            // 'leaf_orientation',
            // 'presence_of_leaf_ligule',
            // 'venation_index',
            // 'tassel_type',
            // 'silk_color',
            // 'tassel_color',
            // 'plant_height',
            // 'ear_height',
            // 'foliage',
            // 'number_of_leaves_above_upper_ear',
            // 'number_of_leaves_below_upper_ear',
            // 'number_of_internodes_below_uppermost_ear',
            // 'number_of_internodes_on_the_whole_stem',
            // 'stem_diameter_at_the_base',
            // 'stem_diameter_below_uppermost_ear',
            // 'tassel_length',
            // 'tassel_peduncle_length',
            // 'tassel_branching_space',
            // 'number_of_primary_branches_on_tassel',
            // 'number_of_secondary_branches_on_tassel',
            // 'number_of_tertiary_branches_on_tassel',
            // 'stay_green',
            // 'days_to_ear_leaf_inflorescence',
            // 'stalk_lodging',
            // 'husk_cover',
            // 'husk_fitting',
            // 'husk_tip_shape',
            // 'ear_shape',
            // 'ear_tip_shape',
            // 'ear_orientation',
            // 'ear_length',
            // 'ear_diameter',
            // 'cob_diameter',
            // 'rachs_diameter',
            // 'peduncle_length',
            // 'number_of_bracts',
            // 'kernel_row_arrangement',
            // 'number_of_kernel_rows',
            // 'number_of_kernels__per_row',
            // 'cob_color',
            // 'grain_shedding',
            // 'kernel_type',
            // 'kernel_color',
            // 'kernel_length',
            // 'kernel_width',
            // 'kernel_thickness',
            // 'shape_of_upper_kernel_surface',
            // 'pericarp_color',
            // 'aleurone_color',
            // 'endosperm_color',
            // 'unshelled_weight',
            // 'shelled_weight',
            // 'kernel_weight',
            // 'shellpc',
            // 'creator_id',
            // 'creation_timestamp',
            // 'modifier_id',
            // 'modification_timestamp',
            // 'remarks:ntext',
            // 'Notes:ntext',
            // 'is_void:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
A Product of Yii Software LLC