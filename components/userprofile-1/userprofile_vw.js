
$(document).ready(function($) {
	$('.userprofile_vw .avatar img').on('click', function(){
		src = $(this).attr('src');
		rel = $(this).attr('rel');
		if( rel!='/' ){
	    	var image_size = rel.split("/");
    		// cl( 'w: '+image_size[0]+' , h: '+image_size[1]);
			hitbox('<a target="_blank" href="'+src+'"><img src="'+src+'" /></a>', image_size[0], image_size[1] );
		}
	});
});