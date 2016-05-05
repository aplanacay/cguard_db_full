<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\withdrawal\models\WithdrawalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Withdrawals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="withdrawal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Withdrawal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'layout'=>"{pager}\n{summary}\n{items}",
        'pager' => [
            'options'=>['class'=>'pagination'],   // set clas name used in ui list of pagination
            'prevPageLabel' => 'Previous',   // Set the label for the "previous" page button
            'nextPageLabel' => 'Next',   // Set the label for the "next" page button
            'firstPageLabel'=>'First',   // Set the label for the "first" page button
            'lastPageLabel'=>'Last',    // Set the label for the "last" page button
            'nextPageCssClass'=>'next',    // Set CSS class for the "next" page button
            'prevPageCssClass'=>'prev',    // Set CSS class for the "previous" page button
            'firstPageCssClass'=>'first',    // Set CSS class for the "first" page button
            'lastPageCssClass'=>'last',    // Set CSS class for the "last" page button
            'maxButtonCount'=>10,    // Set maximum number of page buttons that can be displayed
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'accession_no:ntext',
            //'lot_no',
            //'seed_ref_no:ntext',
            'date',
            [
                'attribute' => 'purpose',
                'value' => function($model) {
                    return $model->purpose == 1 ? 'Distribution' : 'Monitoring';
                }
            ],
            [
                'attribute' => 'type',
                'value' => function($model) {
                    return $model->type == 1 ? 'Active' : 'Base';
                }
            ],
            'amount',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:70px;'],
                'header'=>'Actions',
            ],
        ],
    ]); ?>

</div>
