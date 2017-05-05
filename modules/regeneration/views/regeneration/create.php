<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\regeneration\models\Regeneration */

$this->title = 'Create Regeneration';
$this->params['breadcrumbs'][] = ['label' => 'Regeneration Record', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regeneration-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<p>
        <?= Html::a('Back to Regeneration', ['/regeneration/regeneration'], ['class'=>'btn btn-primary']) ?>
    </p>
	<?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
