
jQuery(document).ready(function($){
	
	dpElement = $(".calendar-fa");

	dpElement.persianDatepicker({
		formatDate: "YYYY/0M/0D",
	});

	dpElement.on('keypress',function(e){
		e.preventDefault();
	});
	
});


