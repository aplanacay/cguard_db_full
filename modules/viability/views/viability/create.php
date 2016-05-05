<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\viability\models\viability */

$this->title = 'Viability Testing';
$this->params['breadcrumbs'][] = ['label' => 'Viabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viability-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back to Index', ['/viability/viability'], ['class'=>'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
