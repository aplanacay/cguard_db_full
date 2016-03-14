<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GermplasmBase */

$this->title = 'Create Germplasm Base';
$this->params['breadcrumbs'][] = ['label' => 'Germplasm Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="germplasm-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
