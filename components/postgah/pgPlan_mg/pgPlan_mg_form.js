
$(document).ready(function($) {
	
	$('.pgPlan_mg_form_duration_c div.more').on('click', function(){

		new_div = $('.pgPlan_mg_form_duration_c div.new').html();
		new_div = "<div>" + new_div + "</div>";
		$('.pgPlan_mg_form_duration_c div.more_div').append( new_div );

	});

});
