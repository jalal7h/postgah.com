
$(document).ready(function(){

	$('input[type=jtoggle]').wrap('<ul class="jtoggle-ul" ></ul>');
	$('.jtoggle-ul').append('<li class="yes">ON<li class="middle"><li class="no">OFF');

	$('input[type=jtoggle]').each(function( index ){
		
		if( $(this).val()!="0" ){
			$(this).parent().find('.yes').css({'margin-left':'0px'});
			$(this).parent().find('.no').css({'margin-right':'-45px'});
		}
		
	});

	$('.jtoggle-ul').on('mousedown', function (){
		
		if( $(this).find('input[type=jtoggle]').val()=="0" ){
			console.log('if 0');
			$(this).find('.yes').css({'margin-left':'0px'});
			$(this).find('.no').css({'margin-right':'-45px'});
			$(this).find('input[type=jtoggle]').val( "1" );
		
		} else {
			console.log('if 1');
			$(this).find('.yes').css({'margin-left':'-45px'});
			$(this).find('.no').css({'margin-right':'0px'});
			$(this).find('input[type=jtoggle]').val( "0" );
		}

		// console.log( $(this).find('input[type=jtoggle]').val() );

	});

});

