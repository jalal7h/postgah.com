
// 2017/05/30

document.write('<div id="tooltip" class="cl_l1r_border"></div>');

jQuery(document).ready(function($) {
	
	// remove all 'title' , and replace it with 'tooltip-title'
	$("*").each(function(index){
		var attr_title = $(this).attr('title');
		if(typeof attr_title !== typeof undefined && attr_title !== false){
			var attr_skip = $(this).attr('skiptooltip');
			if(typeof attr_skip === typeof undefined || attr_title === false ){
				$(this).removeAttr('title');
				$(this).attr('tooltip-title', attr_title);
			}
		}
	});

	// run tooltip
	mouse_left = 0;
	mouse_right = 0;
	mouse_top = 0;
	$(document).on( "mousemove", function( e ) {
		mouse_left = e.pageX;
		mouse_right = $(window).width() - mouse_left;
		mouse_top = e.pageY;
		// cl( "pageX: " + e.pageX + ", pageY: " + e.pageY );
	});

	$('*').on('mouseenter', function(){
		
		var title = $(this).attr('tooltip-title');
		
		if(typeof title !== typeof undefined && title !== false && title!=''){
			$('#tooltip').html( title );

			$('#tooltip').css({ 'left': 'auto', 'right': 'auto' });
			$('#tooltip').show();
			ttw = $('#tooltip').outerWidth();
			$('#tooltip').hide();

			if( $(window).width() < mouse_left + ttw + 50 ){
				$('#tooltip').css({ 'right': (mouse_right+18), 'top':(mouse_top+18), 'left' : 'auto' });

			} else {
				$('#tooltip').css({ 'left':(mouse_left+18), 'top':(mouse_top+18), 'right' : 'auto' });
			}

			$('#tooltip').show(100);
		}
	
	}).on('mouseleave', function(){
		$('#tooltip').hide();
	});


});