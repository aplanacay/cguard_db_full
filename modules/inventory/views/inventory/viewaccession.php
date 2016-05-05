<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\inventory\models\Inventory */

$this->title = 'Search Inventory';
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back to Inventory', ['/inventory/inventory'], ['class'=>'btn btn-primary']) ?>
    </p>
    <?= $this->render('_viewaccession', [
        'model' => $model,
    ]) ?>

</div>
