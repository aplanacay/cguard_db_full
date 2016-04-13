<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\moisturecontent\models\moisturecontent */

$this->title = 'Moisture Content Determination';
$this->params['breadcrumbs'][] = ['label' => 'Moisturecontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moisturecontent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back to Index', ['/moisturecontent/moisturecontent'], ['class'=>'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
