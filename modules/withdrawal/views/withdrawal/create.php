<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\withdrawal\models\Withdrawal */

$this->title = 'Create Withdrawal';
$this->params['breadcrumbs'][] = ['label' => 'Withdrawals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="withdrawal-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<p>
        <?= Html::a('Back to Withdrawal', ['/withdrawal/withdrawal'], ['class'=>'btn btn-primary']) ?>
    </p>
	<?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
