<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CharacterizationBase */

$this->title = 'Update Characterization Base: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Characterization Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="characterization-base-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>