
var ctrl_pressed = 0;
var shift_pressed = 0;
var alt_pressed = 0;

jQuery(document).ready(function($) {

	$(document).on('keydown', function(e){
		// ctrl
		if( e.keyCode == 91 || e.keyCode == 93 || e.keyCode == 17 ){
			ctrl_pressed = 1;
			// cl('control pressed');
		}
		// shift
		if( e.keyCode == 16 ){
			shift_pressed = 1;
			// cl('shift pressed');
		}
		// alt
		if( e.keyCode == 18 ){
			alt_pressed = 1;
			// cl('alt pressed');
		}
	
	}).on('keyup', function(e){
		// ctrl
		if( e.keyCode == 91 || e.keyCode == 93 || e.keyCode == 17 ){
			ctrl_pressed = 0;
			// cl('control released');
		}
		// shift
		if( e.keyCode == 16 ){
			shift_pressed = 0;
			// cl('shift released');
		}
		// alt
		if( e.keyCode == 18 ){
			alt_pressed = 0;
			// cl('alt released');
		}
	});



});
