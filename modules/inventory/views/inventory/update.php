<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\inventory\models\Inventory */

$this->title = 'Update Inventory: ' . ' ' . $model->seedref_no;
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lot_no, 'url' => ['view', 'id' => $model->lot_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    	<?= Html::a('Back to Inventory', ['/inventory/inventory'], ['class'=>'btn btn-primary']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
