
jQuery(document).ready(function($) {
	
	$('.lmfe_isDate.calendar-en').datepicker({
        dateFormat: 'yy/mm/dd',
		numberOfMonths: 1,
		changeYear: true,
		changeMonth: true,
		yearRange: "-90:+10",
    });

});


