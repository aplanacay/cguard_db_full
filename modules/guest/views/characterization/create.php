<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CharacterizationBase */

$this->title = 'Create Characterization Base';
$this->params['breadcrumbs'][] = ['label' => 'Characterization Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characterization-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
