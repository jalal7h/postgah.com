
$(document).ready(function($) {
	
	$('.tabizer > div').on('click', function(){

		$(this).parent().find(' > div').removeClass('cur');
		$(this).addClass('cur');

		rel = $(this).attr('rel');
		$('.tabizer-c > .tab').hide();
		$('.tabizer-c > .tab.'+rel).show();

	});

	$('.tabizer > div').first().addClass('cur');
	$('.tabizer-c > .tab').hide();
	$('.tabizer-c > .tab').first().show();

});