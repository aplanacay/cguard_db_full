$('document').ready(function() {
    var active = true;
    $('#collapse-init').click(function() {
        if (active) {
            active = false;
            $('.panel-collapse').collapse('show');
            $('.panel-title').attr('data-toggle', '');
            $(this).html('<span class=\'glyphicon glyphicon-minus\'></span> Collapse All');
        } else {
            active = true;
            $('.panel-collapse').collapse('hide');
            $('.panel-title').attr('data-toggle', 'collapse');
            $(this).html('<span class=\'glyphicon glyphicon-plus\'></span> Expand All');
        }
    });
    
    $('#accordion').on('show.bs.collapse', function() {
        if (active) {
            $('#accordion .in').collapse('hide');
        }else{
              $('#accordion .in').collapse('hide');  
        }
    });
});

