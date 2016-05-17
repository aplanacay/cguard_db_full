
<style>
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 12px; 
        line-height: 1.42857143;
        color: #333;
        background-color: #fff;
    }
    .select2-container--krajee .select2-selection--single {
        height: 30px;
        line-height: 1.42857143;
        padding: 6px 24px 6px 12px;
    }
    .select2-container--krajee .select2-selection--single .select2-selection__arrow {
        border: none;
        border-left: 1px solid #aaa;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        position: absolute;
        height: 28px;
        top: 1px;
        right: 1px;
        width: 20px;
    }
    .select2-container--krajee .select2-selection {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #555555;
        font-size: 12px;
        outline: 0;
    }
    .col-sm-4, .col-md-4,  .col-sm-6 {
        position: relative;
        min-height: 1px;
        //padding-right: 0px; 
        padding-left: 10px;
    }
    .col-sm-6 {
        width: 68%;
        // background-color:#8BC34A;
    }
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color: #fff; 
        opacity: 1;
    }
    .form-control {
        display: block;
        width: 100%;
        height: 30px;
        padding: 6px 12px;
        font-size: 12px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 0px; 
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .form-group {
        margin-bottom: 5px;
    }
    .form-horizontal .control-label {
        padding-top: 6px;
        margin-bottom: 0;
        text-align: right;
    }
    .passport-data{
        background-color:#009688;
    }
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 0px 0;
        border-radius: 4px;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-right: 10px;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
</style>
<!--  <div id="div-id-success-notif" class="alert alert-success"></div>-->
<h3><span class="glyphicon glyphicon-check"></span>Evaluation</h3>
<?php
$flashMessages = Yii::$app->session->allFlashes;
if ($flashMessages) {
    $tag = '';
    foreach ($flashMessages as $key => $message) {
        if ($key === 'error') {
            $tag = 'danger';
        } else if ($key === 'success') {
            $tag = 'success';
        }
        echo yii\bootstrap\Alert::widget([
            'options' => [
                'class' => 'alert-' . $tag,
            ],
            'body' => Yii::$app->session->getFlash($key),
        ]);
    }
}
?>

<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use \kartik\widgets\Select2;
use yii\bootstrap\Modal;

if ($dataProvider->pagination->totalCount === '0' || $dataProvider->pagination->totalCount === 0) {
    
} else {

    $form = ActiveForm::begin([
                'method' => 'post',
                'action' => ['browse/update-evaluation?id=' . $id],
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        ['label' => 'col-sm-6',
                            'offset' => 'col-sm-offset-4',
                            'wrapper' => 'col-sm-6',
                            'error' => '',
                            'hint' => '',
                        ],
                    ],
                ],
    ]);
    ?>
    <div class = "form-group pull-right" >
         <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'maxButtonCount' => 1,
            'nextPageLabel' => 'Next Record&raquo;',
            'prevPageLabel' => '&laquo; Previous Record',
            'firstPageLabel' => true,
            'lastPageLabel' => true,
            'options' => ['class' => 'pagination pull-right']
        ]);
        
    //    echo '<div class="pull-right" style="margin-top:7px;">';

        if ($dataProvider->pagination->totalCount === '0') {
            echo '<span style="font-size:14px;">  <b>0</b> </b> Results</b> &emsp; ';
            // $model= new \app\modules\corn\models\CharacterizationSearch();
        } else {
            echo '<span style="font-size:14px;"> Showing <b>' . ($dataProvider->pagination->page + 1) . '</b> of <b>' . $dataProvider->pagination->totalCount . '</b> Results</b> &emsp; ';
        }

      //  echo '</div>';
?>
        
        <?php
        echo '&emsp;';
//    echo \kartik\helpers\Html::button('<i class="glyphicon glyphicon-picture"></i> View Photo', [
//                          //  'value' => yii\helpers\Url::to('guest/browse/search'),
//                            'data' => [
//                                'toggle' => 'modal',
//                                'target' => '#germplasm-photo-modal-id',
//                            ],
//                            'id' => 'view-photo-btn-id',
//                            'type' => 'button',
//                            'title' => 'Show photo',
//                            'class' => 'btn btn-primary',
//                                //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
//                        ]).'&emsp;';
//         echo '</div>';
        ?>
        <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-default']);  ?>
        <?php //echo Html::button('<span class=\'glyphicon glyphicon-plus\'></span> Expand all', ['class' => 'btn btn-primary', 'id' => 'collapse-init']);  ?>

    </div>
    <br/>
    <br/><br/>
    <div class="panel-body passport-data" >
        <?php
        echo '<div class="col-md-4">';

        echo $form->field($model, 'phl_no')->textInput(['readonly' => true]);
        echo $form->field($model, 'variety_name')->textInput(['readonly' => true]);


        echo '</div><div class="col-md-4">';
        echo $form->field($model, 'gb_no')->textInput(['readonly' => true]);

        echo $form->field($model, 'scientific_name', ['template' => "{label}<div class='col-sm-6'><i>{input}</i>{hint}{error}</div>",
        ])->textInput(['readonly' => true]);
        echo '</div><div class="col-md-4">';
        echo $form->field($model, 'old_acc_no')->label('Old Accession No')->textInput(['readonly' => true]);
        echo $form->field($model, 'other_number')->textInput(['readonly' => true]);
        echo '</div>';
        ?>
    </div>
    <?php echo '<br>'.Html::submitButton('Save', ['class' => 'btn btn-success pull-right']).'<br>'; ?>
    <hr></hr>
    
    <?php
    echo '<div class="col-md-4">';
    $model->diseases = explode(';', $model->diseases);

    echo $form->field($model, 'diseases')->checkboxList([
        'Ear rot; stalk rot' => '<b>Ear rot, stalk rot</b> <br><i>Diplodia maydis, Gibberellazeae, Fusarium moniliforme</i>',
        'Rust' => 'Rust',
        'Downy mildew' => '<b>Downy mildew</b><br><i>Peronosclerospora spp. Sclerophthora spp</i>',
        'Leaf blight' => '<b>Leaf blight</b><br><i>Helminthosporium maydis Helminthosporium turcicum</i>',
        'Smut' => '<b>Smut</b><br><i>Ustilago maydis</i>',
        'Tassel smut' => '<b>Tassel smut</b><br><i>Sphacelotheca reiliana</i>',
        'Tar spot' => '<b>Tar spot</b><br><i>Phyllachora maydis</i>',
    ])->label('DISEASES');
    //  echo '</div><div class="col-md-4">';
    $model->viruses = explode(';', $model->viruses);
    echo $form->field($model, 'viruses')->checkboxList([
        'Corn stunt' => '<b>Corn stunt</b> <br><i>Corn stunt spiroplasma (CSS)</i>',
        'Corn streak' => '<b>Corn streak</b><br><i>Corn streak virus (CSV) </i>',
        '(MRFV) disease' => '<b>(MRFV) disease</b><br><i>Maize fine stripe virus Fine striping</i>',
        'Maize dwarf virus' => '<b>Maize dwarf virus</b><br><i>5 Maize dwarf mosaic virus(MDM)
</i>',
        '(MBSD) disease' => '<b>(MBSD) disease</b><br><i>4 Maize bushy stunt Maize bushy stunt mycoplasma (MBSD)
</i>',
    ])->label('VIRUSES AND SIMILAR ABERRATIONS');
    echo '</div><div class="col-md-4">';
    $model->pests = explode(';', $model->pests);
    echo $form->field($model, 'pests')->checkboxList([
        'Borer Busseola' => '<b>Borer</b><br><i>Busseola spp</i>',
        'Borer Chilo' => '<b>Borer</b><br><i>Chilo spp</i>',
        'Borer Diatrea' => '<b>Borer</b><br><i>Diatrea spp</i>',
        'Ear worm' => '<b>Ear worm</b><br><i>Heliothis zea Heliothis armigera</i>',
        'Borer Ostrinia' => '<b>Borer</b><br><i>Ostrinia spp</i>',
        'Borer Sesamia' => '<b>Borer</b><br><i>Sesamia spp.</i>',
        'Armyworm' => '<b>Armyworm</b><br><i>Spodoptera spp.</i>',
        'Root worm' => '<b>Root worm</b><br><i>Sesamia spp.</i>',
        'Sitophilus spp. Weevil' => '<b></b><i>Sitophilus spp. Weevil</i>',
        'Grain borer' => '<b>Borer</b><br><i>Prostephanus</i>',
        'Borer Sesamia' => '<b>Borer</b><br><i>Sesamia spp.</i>',
    ])->label('PESTS');

    echo $form->field($model, 'remarks')->textarea(['rows' => 6]);
    echo '</div>';


    echo '
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br>

<br>
';
    ActiveForm::end();
}
?>

