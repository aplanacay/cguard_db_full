
<?php

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$form = ActiveForm::begin();
?>

<?php
//$model = \app\modules\corn\models\Attributes::find()->all();
//$listData = ArrayHelper::map($model, 'id', 'abbrev');
//echo $form->field(new \app\modules\corn\models\Attributes(), 'abbrev')->dropDownList($listData, ['prompt' => 'Select Column']);
//
?>
<br>
<br>
<br>
<div class="modal-header">
    <!--    <a class="close" data-dismiss="modal">&times;</a>
        <h4><i class="fa fa-filter"></i> Filter Data</h4>-->
</div>

<div class="modal-body-medium" id="filter-data-modal-body">
    <div class="control-group">
        <div>

            <?php //$this->widget('application.components.Instructions', array('name' => 'advanced_filter_data')); ?>
            <?php
            //  $query = new \yii\db\Query;             
            $connection = \Yii::$app->db;
            $command = $connection->createCommand('select distinct(ga.variable_id),v.abbrev from corn.germplasm_attribute ga, master.variable v where v.id=ga.variable_id and ga.is_void=false');
            $models = $command->queryAll();
            $models = ArrayHelper::map($models, 'variable_id', 'abbrev');

            echo $form->field(new app\modules\corn\models\Attributes(), 'abbrev')->dropDownList($models, ['prompt' => 'Select an attribute']);
echo '</div id="input-0"></div>';

            echo '<form class="form-horizontal" method="get" data-parsley-validate id="fd-form">';

            $cond = (isset($_GET['cond']) ? $_GET['cond'] : 'and');

//                echo '<div class="control-group" >
//                    <label class="control-label" style="width: 75px;text-align:left;margin-left:10px;" for="select2-condition"><span>Condition</span></label>
//                    <div class="controls" style="margin-left:85px;">
//                    <div style="width:85px;"><input name="cond" id="select2-condition" type="text" value="'.$cond.'" class="pers-vars"></div>
//                    </div>
//                    </div>';
            // echo "<br/>" .CHtml::dropDownList('cond',$cond,array('and'=>'And','or'=>'Or'),array('style'=>'width:200px'));
//                if($isPdp){echo '&emsp;You are in <span style="font-weight: bold;color:#0088cc;">'. Yii::app()->program->getProgram('name').'.</span>';}
            // echo "<br/>";
            if (!empty($filters)) {
                echo "<div id='cond-div' class='with-padding row' style='margin:0px'>";
                $fltrCmms = [];
                foreach ($filters as $attr => $val) {
                    $rawVal = $val;
                    $valArr = explode('","', $val);
                    $valStr = '';
                    foreach ($valArr as $index => $valfltr) {
                        if (!empty($valStr)) {
                            $valStr = $valStr . ', ';
                        }
                        $valfltr = str_replace('"', '', $valfltr);
                        if (strpos($valfltr, ',') !== false) {
                            $valStr = $valStr . '"' . $valfltr . '"';
                        } else {
                            $valStr = $valStr . $valfltr;
                        }
                    }
//                        $val = str_replace('"','', $val);
                    $val = $valStr;
                    $crit = new CDbCriteria;
                    $crit->compare('lower(abbrev)', strtolower($attr));
                    $variable = Variable::model()->find($crit);
                    if (!empty($variable)) {
                        echo "<div id='filter-row-$attr' class='filter-row row no-margin'>";
                        echo "<div class='col col-md-1'><a href='#' id='filter-remove-$attr' style='padding: 1px 8px 2px 8px' class='btn btn-small remove-row-filter' title='Remove condition' data-toggle='tooltip'>x</a></div>";
                        if (isset($operators[$attr]) && !empty($operators[$attr])) {
                            $op = $operators[$attr];
                        } else {
                            $op = '=';
                        }

                        if ($op == '=') {
                            $op1 = 'equals';
                        } else if ($op == '!=') {
                            $op1 = 'does not equal (!=)';
                        } else if ($op == '<') {
                            $op1 = 'is less than (<)';
                        } else if ($op == '>') {
                            $op1 = 'is greater than (>)';
                        } else if ($op == '>') {
                            $op1 = 'is greater than or equal to (>=)';
                        } else {
                            $op1 = $op;
                        }

                        if (isset($headers[$attr]) && !empty($headers[$attr])) {
                            $label = $headers[$attr];
                        } else {
                            $label = $attr;
                        }
                        echo "<div class='col col-md-3' id='var-div-$attr'><p id='filter-variable-$attr'><b>$label</b></p></div>";
                        echo "<div class='col col-md-3' id='op-div-$attr'><p><b>$op1</b></p><input type='text' id='filter-operator-$attr' style='display:none' value='$op' name='Operator[" . $attr . "]' class='select2-operators vars'/></div>";

                        $dataType = $variable->data_type;
                        if ($op !== 'is null' && $op !== 'is not null') {
                            if ($dataType == 'timestamp') {
                                echo "<div class='col col-md-5' id='val-div-$attr'>"
                                . "<input type='date' id='filter-value-$attr' required='true' value='$val' class='value-field'/>"
                                . "<input type='text' id='raw-filter-$attr' name='" . $model . "[" . $attr . "]' value='$rawVal' class='vars' style='display:none'/>"
                                . "</div>";
                            } else if ($dataType == 'date') {
                                echo "<div class='col col-md-5' id='val-div-$attr'>"
                                . "<input type='text' id='filter-value-$attr' required='true' value='$val' class='value-field'/>"
                                . "<input type='text' id='raw-filter-$attr' name='" . $model . "[" . $attr . "]' value='$rawVal' class='vars' style='display:none'/>"
                                . "</div>";
                            }
                            // else if($dataType == 'numeric' || $dataType == 'float' || $dataType == 'bigint' || $dataType == 'smallint' || $dataType == 'integer'){
                            //     echo "<div class='col col-md-5' id='val-div-$attr'><input type='number' step='0.00001' id='filter-value-$attr' name='".$model."[".$attr."]' required='true' value='$val'/></div>";
                            // }
                            else {
                                echo "<div class='col col-md-5' id='val-div-$attr'>"
                                . "<input type='text' id='filter-value-$attr' required='true' value='$val' class='value-field'/>"
                                . "<input type='text' id='raw-filter-$attr' name='" . $model . "[" . $attr . "]' value='$rawVal' class='vars' style='display:none'/>"
                                . "</div>";
                            }
                        } else {
                            echo "<div class='col col-md-5' id='val-div-$attr'>"
                            . "<input type='text' id='filter-value-$attr' required='true' class='value-field parsely-success' value='$val' style='display:none'/>"
                            . "<input type='text' id='raw-filter-$attr' name='" . $model . "[" . $attr . "]' value='$rawVal' class='vars' style='display:none'/>"
                            . "</div>";
                        }

                        echo "</div>";
                    }
                }
                echo "</div>";
                echo "<div id='input-fields'>";
                echo"</div>";
            } else {
                echo "<div id='cond-div' class='with-padding row' style='margin:0px'></div>";
                echo "<div id='input-fields'></div>";
            }

            echo '</form>';
            echo '<div class="row no-margin" style="padding-left: 23px;">';

//                Html::button('<i class="fa fa-plus">Add new condition</i>', [
//                            'value' => 'Add Condition',//yii\helpers\Url::to('browse/search'),
//                            'id' => 'add-cond-button',
//                            'type' => 'button',
//                            'title' => 'Advanced search',
//                    'icon' => 'fa fa-plus',
//                            'class' => 'btn btn-success',
//                                //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
//                        ]);
            echo \yii\bootstrap\Button::widget([
                'id' => 'add-cond-button',
                'label' => 'Add Condition',
                'options' => ['class' => 'btn-primary'], // produces class "btn btn-primary"
            ]);
//                $this->widget('bootstrap.widgets.TbButton', array(
//                    'label' => 'Add new condition',
//                    'type' => 'success',
//                    'icon' => 'fa fa-plus',
//                    'id' => 'add-cond-button',
//                ));
            echo '&emsp;';
//                $this->widget('bootstrap.widgets.TbButton', array(
//                    'label' => 'Load saved list',
//                    'type' => 'primary',
//                    'icon' => 'fa fa-upload',
//                    'id' => 'load-saved-list-button',
//                ));
//                echo '&emsp;';
//                echo $this->widget('bootstrap.widgets.TbButton', array(
//                    'id' => 'clear-btn',
//                    'label' => 'Clear All',
//                ),true);
            echo \yii\bootstrap\Button::widget([
                'id' => 'clr-btn',
                'label' => 'Clear All',
                    //'options' => ['class' => 'btn-primary'], // produces class "btn btn-primary"
            ]);
// 

            echo '</div>';
            ?>

        </div>
    </div>       
</div>

<div class="modal-footer">
    <?php
//    $this->widget('bootstrap.widgets.TbButton', array(
//        'id' => 'filter-data-modal-close-btn',
//        'label' => 'Close',
//        'url' => '#',
//        'htmlOptions' => array(
//            'data-dismiss' => 'modal'
//        )
//    ));
//    $this->widget('bootstrap.widgets.TbButton', array(
//        'id' => 'filter-data-modal-apply-btn',
//        'label' => 'Apply',
//        'type' => 'primary',
//        'url' => '#',
//        'htmlOptions' => array(
//            // 'data-dismiss' => 'modal'
//        )
//    ));
//    Html::button('<i class="">Apply</i>', [
//                            'id' => 'filter-data-modal-apply-btn',
//                            'type' => 'button',
////                            'title' => 'Advanced search',
////                    'icon' => 'fa fa-plus',
////                            'class' => 'btn btn-success',
//                                //'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'
//                        ]);
    echo '</div>';
    ?>  
</div>

<?php
//$this->endWidget();
ActiveForm::end();
?>


<?php
//    $this->widget('bootstrap.widgets.TbButton',array(
//        'id' => "bulk-form-modal-close",
//        'label' => 'Close',
//        'url' => '#',        
//        'htmlOptions' => array(
//            'data-dismiss' => 'modal',
//        )
//    )); 
//    
//    $this->widget('bootstrap.widgets.TbButton', array(
//        'label' => 'Apply to selected',
//        'type' => 'success',
//        'id' => 'apply-btn',
//    ));
//    echo '&nbsp;';
//    $this->widget('bootstrap.widgets.TbButton', array(
//        'label' => 'Apply to all',
//        'type' => 'primary',
//        'id' => 'apply-all-btn',
//    ));
?>  