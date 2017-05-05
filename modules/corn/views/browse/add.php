<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GermplasmBase */

?>
<div class="germplasm-base-create">
<legend>New Corn Germplasm (New Registration)</legend>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2registration', [
        'model' => $model,
    ]) ?>

</div>
