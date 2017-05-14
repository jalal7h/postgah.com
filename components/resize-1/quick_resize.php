<?

# jalal7h@gmail.com
# 2017/05/14
# 1.1

add_action('quick_resize');

function quick_resize(){

	if(! $addr = trim($_REQUEST['address']) ){
		e();

	} else if(! $width = intval($_REQUEST['width']) ){
		e();

	} else if(! $height = intval($_REQUEST['height']) ){
		e();
	}

	$il = 'image_list';
	$ill = strlen($il);

	if( substr( $addr, 0, $ill+1 ) == $il.'/' ){
		if(! $filename = trim( substr( $addr, $ill+1) ) ){
			d404();
		} else {
			$addr = image_list( $filename );
		}
	}

	if( $_REQUEST['cut'] == '1'	){
		multi_size_pic( $addr, $width, $height, $cut=true );

	} else {
		multi_size_pic( $addr, $width, $height );
	}

	die();

}



