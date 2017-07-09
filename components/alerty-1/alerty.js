
function alerty( t, hide_delay=4 ){
jQuery(document).ready(function($) {
	
	if( $('#alerty').length == 0 ){
		$('body').append('<div id="alerty"></div>');
	}
	
	msg_id = 'msg'+rand(6);
	$('#alerty').append('<div class="msg" id="'+msg_id+'" ></div>');
	
	$('#alerty #'+msg_id).hide();
	$('#alerty #'+msg_id).html( t );
	$('#alerty #'+msg_id).show();

	if( hide_delay != 0 ){
		alerty_hide( msg_id, hide_delay );
	}

});
}

function alerty_hide( id, hide_delay ){
	setTimeout( function(){
		$('#alerty #'+id).addClass('hide');
		// cl( 'class hide added to '+id );
	}, hide_delay * 1000 );
}





