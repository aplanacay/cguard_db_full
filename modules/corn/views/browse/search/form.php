
<?php
    $form2 = $this->beginWidget('bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'bulkForm',
            'htmlOptions'=>array('class' => 'smart-form','data-parsley-validate'),
            'type' => 'horizontal'
        )
    );
?>
        <div class="col col-md-6"><div class="control-group">
        <label class="control-label required" for="webform-data-level">
            <span>Variable</span><span class="required">*</span>
        </label>
        <div class="controls">
            <?= Html::activeDropDownList(new app\modules\corn\models\Attributes(), 'id',
      ArrayHelper::map(app\modules\corn\models\Attributes::find()->all(), 'id', 'abbrev'));
?>
    <?php
    
//        $tags = CMap::mergeArray(array(''=>''),$tags);
//        $this->widget('bootstrap.widgets.TbSelect2', array(
//            'name' => 'select_var',
//            'options' => array(
//                'allowClear' => true,
//                'placeholder' => '',
//            ),
//            'value' => $key,
//            'data' => $tags,
//            'htmlOptions' => array(
//                'id' => 'select-var-form',
//            ),
//        ));
        echo '<br/>';
    ?>
        </div></div></div>
        <?php
            echo '<div class="col col-md-6">';
//            foreach($scaleValues as $varId => $scales){
//                if(!empty($scales)){
//                    $variable = Variable::model()->findByPk($varId);
//                    $abbrev = strtolower($variable->abbrev);
//                    echo '<div class="select2-div" id="select2-div-'.$abbrev.'" style="display:none">';
//                    $this->widget('bootstrap.widgets.TbSelect2', array(
//                        'name' => 'bulkform-'.$abbrev,
//                        'options' => array(
//                            'allowClear' => true,
//                            'placeholder' => ''
//                        ),
//                        'data' => $scales,
//                        'htmlOptions' => array(
//                            'id' => 'bulkform-fld-'.$abbrev,
//                            'class' => 'bulkform-flds notactive',
//                        ),
//                        'asDropDownList' => true
//                    ));
//                    echo '</div>';
//                }
//            }
//            $this->widget('bootstrap.widgets.TbDatePicker', array(
//                'name' => 'bulkform-date',
//                'htmlOptions' => array(
//                    'id' => 'bulkform-fld-date', 'class' => 'bulkform-flds notactive',
//                    'style' => 'display:none'
//                ),
//                'options' => array(
//                    'autoclose' => true,
//                    'format' => 'yyyy-mm-dd',
//                    'forceParse' => true
//                ),
//            ));
//            echo '<input
//                type="number"
//                step="0.01"
//                name="bulkform-float"
//                id="bulkform-fld-float"
//                class="bulkform-flds notactive"
//                style="display:none"
//                min="0"
//            >';
//            echo '<input
//                type="number"
//                name="bulkform-number"
//                id="bulkform-fld-number"
//                class="bulkform-flds notactive"
//                style="display:none"
//                min="0"
//            >';
            echo '<input
                type="text"
                name="bulkform-text"
                id="bulkform-fld-text"
                class="bulkform-flds notactive"
                style="display:none"
            >';
//            if(isset($isFldLoc) && ($isFldLoc)){
//                echo '<div id="fldlocs-div" style="display:none">';
//                $fldLocMult = Variable::model()->findByAttributes(array('abbrev'=>'FLD_LOC_MULTIPLE'))->id;
//                echo '<span class="label label-important">Note</span> The studies you selected have multiple locations. Input fields are provided for each location.<br/>';
//                foreach($locationIdArr as $loc_id){
//                    $crit = new CDbCriteria;
//                    $crit->compare('place_id',$loc_id);
//                    $crit->compare('facility_type','Plot');
//                    $crit->compare('is_void',false);
//                    $fieldLocations = Facility::model()->findAll($crit);
//                    $fieldLocArray = [];
//                    foreach($fieldLocations as $field){
////                                    $fieldLocArray[] = array('id'=>$field->id,'text'=>$field->name);
//                        $fieldLocArray[$field->id] = $field->name;
//                    }
//                    if(!empty($fieldLocArray)){
//                        $place = Place::model()->findByPk($loc_id);
//
//                ?>
                
                <div class="controls">
                //<?php
//                    $facArray = [];
//                    foreach($fieldLocations as $fac){
//                        $facArray[] = array('id'=>$fac->id,'name'=>$fac->name,'latitude'=>$fac->latitude,'longitude'=>$fac->longitude,'object_id'=>$fac->object_id,'layer_id'=>$fac->layer_id,'table_id'=>$fac->table_id);
//                    }
//                    $fldLocsArr[$loc_id] = $facArray;
//                    $placeAbbrev = strtolower($place->abbrev);
//                    echo '<div style="margin-bottom:10px;" class="col col-md-11 fldloc-select2-div" id="fldloc-div-'.$placeAbbrev.'">';
//                    echo $this->widget('bootstrap.widgets.TbSelect2', array(
//                        'name' => 'bulkform-fldloc',
//                        'data' => $fieldLocArray,
//                        'htmlOptions'=>array(
//                            'style'=>'width:10px;',
//                            'class' => 'bulkform-fld notactive fld-loc-' . $loc_id,
//                            'id' => 'bulkform-fld-fldloc-'.$loc_id,
//                            'multiple' => 'multiple'
//                        ),
////                                  'asDropDownList' => false,
//                    ),true);
//
//                    echo '</div>';
//                    echo '<a style="margin:6px 0px 0px 0px;color: darkslategray;" href="#" class="pull-right"><i class="facility-selector fa fa-map-marker" id="selector-'.$loc_id.'"></i></a>';
//
////                                          echo '<input type="text" id="facarr-'.$loc_id.'" value="'.$facStr.'" style="display:none">';
//                    ?>
                    </div>
            //<?php
//                    }
//                }
//                echo '</div>';
//                $this->renderPartial('study/fld_loc',array(
//                    'fldLocsArr' => $fldLocsArr
//                ));
//            }

            echo '<div id="notif" style="color:red"></div>';
            echo '</div>';
        ?>
    <?php $this->endWidget();?>
