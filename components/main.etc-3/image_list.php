<?

# jalal7h@gmail.com
# 2017/05/13
# 1.0

add_action('image_list');

function image_list( $filename=null ){

	#
	# run as a function
	if( $filename ){
		if( $filepath = $GLOBALS['include_all_image'][ $filename ] ){
			return $filepath;
		} else {
			d404();
		}
	}

	#
	# run as an action
	if(! $filename = $_REQUEST['filename'] ){
		d404();
	
	} else if(! $filepath = $GLOBALS['include_all_image'][ $filename ] ){
		d404();

	} else {
		echofile( $filepath );
	}

}

