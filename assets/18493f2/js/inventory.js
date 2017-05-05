$(function(){
	$('#modalButton').click(function(){
		$('#modal').modal('show')
			.load('#modalContent')
			.load($(this).attr('value'));
	})
});
