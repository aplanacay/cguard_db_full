/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {

    $('#search-btn-id').click(function() {

        $('#stud-info').modal('show')
                .find('#search-modal-id')
                .load($(this).attr('value'));
    });
});
$(document).ready(function() {
    $('#attributes-abbrev').on('change', function() {
        console.log($(this).val());
        console.log('here');
    });
});
$(document).ready(function() {
    var sourceVar;
    var sourceOperators;
    var isLoadSavedList = false;
    var productString;


//    persistVars = $.parseJSON(persistVars);
//    
//    $.each(persistVars,function(i,obj){
//        if($('#persist-'+i).length){}
//        else{
//            if(obj instanceof Object){
//                $.each(obj, function(j,v){
//                    $('#fd-form').prepend('<input type="text" class="hidden pers-vars" id="persist-'+i+'['+j+']" name="'+i+'['+j+']" value="'+v+'" style="display:none"/>');
//                });
//            }
//            else{
//                $('#fd-form').prepend('<input type="text" class="hidden pers-vars" id="persist-'+i+'" name="'+i+'" value="'+obj+'" style="display:none"/>');
//            }
//        }
//    });

    $('#clear-btn').bind('click', function() {
        Loading.show();
        $('#cond-div').html('');
        $('#input-fields').html('');
        $(".value-field").remove();
        $(".vars").remove();

        $('#add-cond-button').removeClass('disabled');
        Loading.hide();
    });
//
//    $('#select2-condition').select2({
//        data: [{id:"and",text:"And"},{id:"or",text:"Or"}],
//    });
//
//    $('#filter-data-modal-apply-btn').click(function(){
//        var validated = $('#fd-form').parsley('validate');
//        if(validated){
//            var idArr = [];
//            $('.value-field').each(function(i,obj){
//                if($.inArray(obj.id, idArr) > -1){}
//                else{
//                    idArr.push(obj.id);
//                    var value = $(obj).val();
//                    var idr = obj.id.split('-');
//                    var idr = idr[2];
//                    if(value !== ''){
//                        if(obj.type !== 'date'){
//                            if(value.indexOf('"') === -1){
//                                if(value.indexOf(',') === -1){
//                                    $("#raw-filter-"+idr).val('"'+value+'"');
//                                }else{
//                                    var str = '';
//                                    var newValArr = value.trim().split(',');//.join('"",""');
//
//                                    $.each(newValArr,function(i,c){
//                                        if(str!==''){
//                                            str = str + '"",""';
//                                        }
//                                        str = str + c.trim();
//                                    });
//                                    var newVal = '"' + str + '"';
//                                    $('#raw-filter-'+idr).val(newVal);
//                                }
//                            }else{
//                                if(value.indexOf('",') !== -1){
//                                    var str = '';
//                                    var arr = value.split('",');
//                                    $.each(arr,function(i,v){
//                                        if(v.indexOf('"') !== -1){
//                                            v = v.replace(/"/g,'');
//                                            if(str !== ''){
//                                                str = str + '","';
//                                            }
//                                            v = v.trim();
//                                            v = '"' + v + '"';
//                                            str = str + v;
//                                        }else{
//                                            if(v.indexOf(',') === -1){
//                                                if(str !== ''){
//                                                    str = str + '","';
//                                                }
//                                                v = '"' + v.trim() + '"';
//                                                str = str + v;
//                                            }else{
//                                                var vArr = v.split(',');
//                                                $.each(vArr, function(i,u){
//                                                    if(str !== ''){
//                                                        str = str + '","';
//                                                    }
//                                                    u = '"' + u.trim() + '"';
//                                                    str = str + u;
//                                                });
//                                            }
//                                        }
//                                    });
//                                    $("#raw-filter-"+idr).val(str);
//                                }
//                                else if(value.indexOf(',"') !== -1){
//                                    var str = '';
//                                    var arr = value.split(',"');
//                                    $.each(arr,function(i,v){
//                                        if(v.indexOf('"') !== -1){
//                                            v = v.replace(/"/g,'');
//                                            if(str !== ''){
//                                                str = str + '","';
//                                            }
//                                            v = v.trim();
//                                            v = '"' + v + '"';
//                                            str = str + v;
//                                        }else{
//                                            if(v.indexOf(',') === -1){
//                                                if(str !== ''){
//                                                    str = str + '","';
//                                                }
//                                                v = '"' + v.trim() + '"';
//                                                str = str + v;
//                                            }else{
//                                                var vArr = v.split(',');
//                                                $.each(vArr, function(i,u){
//                                                    if(str !== ''){
//                                                        str = str + '","';
//                                                    }
//                                                    u = '"' + u.trim() + '"';
//                                                    str = str + u;
//                                                });
//                                            }
//                                        }
//                                    });
//                                    $("#raw-filter-"+idr).val(str);
//                                }
//                                else{
//                                    $("#raw-filter-"+idr).val(value);
//                                }
//                            }
//                        }else{
//                            $("#raw-filter-"+idr).val(value);
//                        }
//                    }
//                }
//            });
//            var exists = [];
//            var existsId = [];
//            var existsVar = [];
//            var existsVarArr = {};
//            var existsVarID = [];
//            $('.pers-vars').each(function(i,obj){
//                if(obj.value ===null || obj.value ===false || obj.value === ' ' || obj.value === ''){}
//                else{
//                    if($.inArray(obj.id, existsId) > -1){}
//                    else{
//                        exists[obj.name] = obj.value;
//                        existsId.push(obj.id);
//                    }
//                }
//            });
//            var modelInArr = $.inArray(model.toLowerCase(), ["product","seedstorage"]);
//            if(modelInArr > -1){
//                $('.vars').each(function(i,obj){
//                    if(obj.value ===null || obj.value ===false || obj.value === ' ' || obj.value === ''){}
//                    else{
//                        if($.inArray(obj.id, existsVarID) > -1){}
//                        else{
//                            var classlist = $(obj).attr('class');
//                            if (classlist.indexOf('select2-operator') >= 0){
//                                exists[obj.name] = obj.value;
//                                existsVarID.push(obj.id);
//                            }
//                            else{
//                                if(typeof obj.value !== 'undefined'){
//                                    existsVarArr[obj.name] = obj.value;
//                                }
//                                existsVar[obj.name] = obj.value;
//                                existsVarID.push(obj.id);
//                            }
//                        }
//                    }
//                });
//                var arrJson = JSON.stringify(existsVarArr);
//                var fltrUrl = location.protocol + '//' + location.host + location.pathname;
//                var md5str = $.md5(fltrUrl + gridId);
//                $.ajax({
//                    url: parseFilterUrl,
//                    data: {key: md5str, value: arrJson},
//                    async: false,
//                    type: 'POST',
//                    dataType: 'json',
//                    success: function(){
//                    }
//                });
//                exists['filter']= md5str;
//                var url = $.param.querystring(action,exists);
//                window.location = url;
//            }
//            else{
//                $('.vars').each(function(i,obj){
//                    if(obj.value ===null || obj.value ===false || obj.value === ' ' || obj.value === ''){}
//                    else{
//                        if($.inArray(obj.id, existsId) > -1){}
//                        else{
//                            exists[obj.name] = obj.value;
//                            existsId.push(obj.id);
//                        }
//                    }
//                });
//                var url = $.param.querystring(action,exists);
//                window.location = url;
//            }
//        }        
//    });
//
//    $('#add-cond-button').bind('click', function(){
//        console.log('add button');
//        Loading.show();
//        $('#add-cond-button').addClass('disabled');
//        if($('#filter-row-unknown').length){}else{
//            $.ajax({
//                url: filterDataUrl,
//                type: 'POST',
//                async: false,
//                dataType: 'json',
//                data: {abbrevs:abbrevs,value:'none',headers:headers},
//                success: function(data) {
//                    sourceVar = data;
//                }
//            });
//
//            $('#cond-div').append("<div id='filter-row-unknown' class='filter-row row no-margin'>\n\
//                <div class='col col-md-1'><a href='#' id='filter-remove-unknown' style='padding: 1px 8px 2px 8px' class='btn btn-small remove-row-filter' title='Remove condition'>x</a></div>\n\
//                <div class='col col-md-3' id='var-div-unknown'><input type='text' id='filter-variable-unknown' class='select2-variable'/></div>\n\
//                <div class='col col-md-3' id='op-div-unknown'><input type='text' id='filter-operator-unknown' class='select2-operator vars hidden'/></div>\n\
//                <div class='col col-md-5' id='val-div-unknown'></div>\n\
//                </div>");
//            Loading.hide();
//            $('.remove-row-filter').bind('click', function(){
//                var idr = this.id;
//                var idr = this.id.split('-');
//                var idr = idr[2];
//                $("#filter-row-"+idr).remove();
//
//                if($('.filter-row').length){}else{$('#add-cond-button').removeClass('disabled');}
//            });
//
//            $('.select2-variable').select2({
//                data: sourceVar,
//                placeholder: 'Select column'
//            });
//
//            $('.select2-variable').bind('change', function(){
//                var val = $('#'+this.id).val();
//                var id = this.id.split('-');
//                var idOld = id[2];
//                if($('#filter-row-'+val).length){
//                    bootbox.alert('Column is already selected');
//                }else{
//                    $('#val-div-'+idOld).html('');
//                    $('#filter-row-'+idOld).attr('id','filter-row-'+val);
//                    $('#filter-remove-'+idOld).attr('id','filter-remove-'+val);
//                    if($('#filter-operator-'+idOld).length){
//                        $('#filter-operator-'+idOld).attr('id','filter-operator-'+val);
//                    }
//                    if($('#filter-value-'+idOld).length){
//                        $('#filter-value-'+idOld).attr('id','filter-value-'+val);
//                    }
//                    $('#'+this.id).attr('id','filter-variable-'+val);
//                    $('#var-div-'+idOld).attr('id','var-div-'+val);
//                    $('#op-div-'+idOld).attr('id','op-div-'+val);
//                    $('#val-div-'+idOld).attr('id','val-div-'+val);
//
//                    $.ajax({
//                        url: filterDataUrl1,
//                        type: 'POST',
//                        async: false,
//                        dataType: 'json',
//                        data: {value:val, abbrevs:abbrevs},
//                        success: function(data) {
//                            sourceOperators = data;
//                        }
//                    });
//
//                    $('#filter-operator-'+val).removeClass('hidden');
//                    $('#filter-operator-'+val).select2({
//                        data: sourceOperators,
//                        placeholder: 'Select operator'
//                    });
//                }
//
//            });
//
//            $('.select2-operator').bind('change',function(){
//                var val = $('#'+this.id).val();
//                var id = this.id.split('-');
//                var variable = id[2];
//
//                var dataType;
//
//                $.ajax({
//                    url: filterDataUrl2,
//                    type: 'POST',
//                    async: false,
//                    dataType: 'json',
//                    data:{variable:variable},
//                    success: function(data){
//                        dataType = data;
//                    }
//                });
//
//                $('#'+this.id).attr('name','Operator['+variable+']');
//                if(val == 'is null' || val == 'is not null'){
//                    $('#val-div-'+variable).html('<input type="text" id="filter-value-'+variable+'" placeholder="Enter value" value="'+val+'" class="value-field parsley-success" style="display:none"/>');
//                    $('#val-div-'+variable).append('<input type="text" id="raw-filter-'+variable+'" name="'+model+'['+variable+']" class="vars" style="display:none;"/>');
//                }
//                else{
//                    if(dataType == 'timestamp'){
//                        $('#val-div-'+variable).html('<input type="date" id="filter-value-'+variable+'" placeholder="Enter value" required="true" class="value-field"/>');
//                        $('#val-div-'+variable).append('<input type="text" id="raw-filter-'+variable+'" name="'+model+'['+variable+']" class="vars" style="display:none;"/>');
//                    }
//                    else if(dataType == 'date'){
//                        $('#val-div-'+variable).html('<input type="text" id="filter-value-'+variable+'" placeholder="yyyy-mm-dd" required="true" class="value-field"/>');
//                        $('#val-div-'+variable).append('<input type="text" id="raw-filter-'+variable+'" name="'+model+'['+variable+']" class="vars" style="display:none;"/>');
//                    }
//                    // else if(dataType == 'numeric' || dataType == 'float' || dataType == 'bigint' || dataType == 'smallint' || dataType == 'integer'){
//                    //     $('#val-div-'+variable).html('<input type="number" step="0.00001" name="'+model+'['+variable+']" id="filter-value-'+variable+'" required="true" class="value-field"/>');
//                    // }
//                    else{
//                        $('#val-div-'+variable).html('<input type="text" id="filter-value-'+variable+'" placeholder="Enter value" required="true" class="value-field"/>');
//                        $('#val-div-'+variable).append('<input type="text" id="raw-filter-'+variable+'" name="'+model+'['+variable+']" class="vars" style="display:none;"/>');
//                        
//                    }
//                }
//
//                $('#add-cond-button').removeClass('disabled');
//            });
//
//        }
//    });
//
//    
//    $('#load-saved-list-button').bind('click', function(){
//        
//        Loading.show();
//        $('#add-cond-button').addClass('disabled');
//        $('#load-saved-list-button').addClass('disabled');
//        
//        // if($('#filter-row-unknown').length){Loading.hide();}else{
//            $.ajax({
//                url: filterDataUrl3,
//                type: 'POST',
//                async: false,
//                dataType: 'json',
//                data: {abbrevs:abbrevs,value:'none',headers:headers},
//                success: function(data) {
//                    sourceVar = data;
//                }
//            });
//            
//            if($('#filter-row-designation').length){
//                $('#cond-div').append("<div id='filter-row-savedlist' class='filter-row row no-margin'>\n\
//                <div class='col col-md-5'><id='saved-list-label' style='padding: 1px 8px 2px 8px' class='' >Saved List </a></div>\n\
//                <div class='col col-md-3' id='load-div-designation'><input type='text' id='load-saved-list' class='select2-saved-list'/></div>\n\
//                <div class='col col-md-1' id='op-div-designation'></div>\n\
//                <div class='col col-md-5' id='saved-div-designation'></div>\n\
//                </div>");
//            }
//            else{
//
//                $('#cond-div').append("<div id='filter-row-designation' class='filter-row row no-margin'>\n\
//                    <div class='col col-md-5'><id='saved-list-label' style='padding: 1px 8px 2px 8px' class='' >Saved List </a></div>\n\
//                    <div class='col col-md-3' id='load-div-designation'><input type='text' id='load-saved-list' class='select2-saved-list'/></div>\n\
//                    <div class='col col-md-1' id='op-div-designation'><input type='text' id='filter-operator-designation' class='select2-operator vars hidden'/></div>\n\
//                    <div class='col col-md-5' id='saved-div-designation'></div>\n\
//                    </div>");
//            }
//            Loading.hide();
//            
//            $('.select2-saved-list').select2({
//                data: sourceVar,
//                placeholder: 'Select saved list'
//            });
//            
//            $('.select2-saved-list').bind('change', function(){
//                var val = $('#'+this.id).val();
//                var id = this.id.split('-');
//                var idOld = id[2];
//                
//                $.ajax({
//                    url: filterDataUrl4,
//                    type: 'POST',
//                    async: false,
//                    dataType: 'json',
//                    data: {savedListId:val},
//                    success: function(data) {
//                        productString = data;
//                    }
//                });
//                
//                if($('#filter-value-designation').length){
//                    var curValFilter = $('#filter-value-designation').val();
//                    var curValRaw = $('#raw-filter-designation').val();
//                    $('#filter-value-designation').val(curValFilter + ',' + productString);
//                    $('#raw-value-designation').val(curValRaw + ',' + productString);
//                }
//                else{
//                    $('#filter-operator-designation').attr('name','Operator[designation]');
//                    $('#filter-operator-designation').val('=');
//
//                    $('#saved-div-designation').html('<input type="text" id="filter-value-designation" placeholder="Enter value" required="true" value="" class="value-field" style="display:none;">');
//                    $('#saved-div-designation').append('<input type="text" id="raw-filter-designation" name="'+model+'[designation]" class="vars" style="display:none;"/>');
//                    $('#filter-value-designation').val(productString);
//                    $('#raw-filter-designation').val(productString);
//                
//                }
//                isLoadSavedList = true;
//            });
//            
//            $('#add-cond-button').removeClass('disabled');
//        // }
//    });
//    
//    $('.remove-row-filter').bind('click', function(){
//        var idr = this.id;
//        var idr = this.id.split('-');
//        var idr = idr[2];
//        while($('#filter-row-'+idr).length){
//            $('#filter-row-'+idr).remove();
//        }
//        if($('.filter-row').length){}else{$('#add-cond-button').removeClass('disabled');}
//    });
});

