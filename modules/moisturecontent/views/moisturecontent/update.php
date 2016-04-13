<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\moisturecontent\models\moisturecontent */

$this->title = 'Update Moisturecontent: ' . ' ' . $model->mcref_no;
$this->params['breadcrumbs'][] = ['label' => 'Moisturecontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mcref_no, 'url' => ['view', 'id' => $model->mcref_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="moisturecontent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
