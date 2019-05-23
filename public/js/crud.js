jQuery(document).ready(function($) {

  $(':input').not(':button, :submit, :reset, :hidden, .hide, .hidden').val('').removeAttr('checked').removeAttr('selected');
  $('#divFile > div > input').val('');
  $('#divImg > div > input').val('');
	$('#toFile').change(function(){
		if(this.checked) {
			$('#divFile').removeClass('hide');
		} else {
			$('#divFile').addClass('hide');
		}
	});

	$('#toImg').change(function(){
		if(this.checked) {
			$('#divImg').removeClass('hide');
		} else {
			$('#divImg').addClass('hide');
		}
	});

	$('#toFile2').change(function(){
		if(this.checked) {
			$('#divFile2').removeClass('hide');
		} else {
			$('#divFile2').addClass('hide');
		}
	});

	$('#toImg2').change(function(){
		if(this.checked) {
			$('#divImg2').removeClass('hide');
		} else {
			$('#divImg2').addClass('hide');
		}
	});
});