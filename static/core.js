$(document).ready(function(){
	$('.add_liquor').click(function(){
		$('#needed_rows_liquor').append('<tr><td><input name="liquors_needed[]" type="text"/></td><td><input name="measures_needed[]" type="text"/></td><td><input name="proof_needed[]" type="text"/></td></tr>')
	})
	$('.add_mixer').click(function(){
		$('#needed_rows_mixer').append('<tr><td><input name="mixer_needed[]" type="text"/></td><td><input name="mixer_measure_needed[]" type="text"/></td></tr>')
	})
	$('.submit').click(function(){
		$(this).closest('form').submit()
	})
})