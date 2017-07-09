
jQuery(document).ready(function($) {
	
  $( function() {
    $('.sortable').sortable();
    $('.sortable').disableSelection();
    $('.sortable').on('sortstop', function(e){
    	feed = $(this).attr('feed');
    	if( is_defined( feed ) ){
	    	// get list if childs
	    	the_id_arr = [];
	    	$(this).find('>*').each(function(e){
	    		the_id = $(this).attr('the_id');
	    		if( is_defined( the_id ) ){
	    			the_id_arr.push(the_id);
	    		}
	    	});
	    	// send the request
	    	if( the_id_arr.length > 0 ){
	    		the_id_s = the_id_arr.join(',');
	    		$.ajax({
		    		url: './?do_action=sortable_agent',
		    		type: 'POST',
		    		data: { 'feed': feed, 'the_id_s': the_id_s },
		    	}).done(function(html){
		    		if( html != 'OK' ){
		    			// cl( html );
		    			alert( text_sortable_something_wrong );
		    		}
		    	});
	    	}
	    	
	    }	
    })
  } );

});

