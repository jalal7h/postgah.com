<?

# jalal7h@gmail.com
# 2017/01/04
# 1.1

// mavaredi k hameja karbord nadare, be vasete in function be footer ezafe mishe.

// har anche be vaseteye in function moarefi beshe, besurat e tag e <script .. dar entehaye khorujie html ghabele moshahede khahad bud
// js_enqueue( _URL."/?do_action=listmaker_form_element_this_positionbox_preload&info=".str_enc(json_encode($info))."&nc=".date("md") );
// js_enqueue( 'listmaker_form', 'listmaker_form_element_this_positionbox' );

# age file_name nadasht, link e js e, age dasht tarkibi az component/filename(bedune .ext) hast.

/*README*/

function js_enqueue( $component_name, $file_name='' ){
	
	if( $GLOBALS['js_enqueue_flag'][ $component_name.'/'.$file_name ] ){
		return "";
	} else {
		$GLOBALS['js_enqueue_flag'][ $component_name.'/'.$file_name ] = true;
	}

	// this is a js link
	if( ( $file_name == '' ) and ( $component_name != mb_ereg_replace('[^A-Za-z0-9\_\-\.]+','',$component_name) ) ){
		$js_path = $component_name;
		$GLOBALS['js_enqueue'][] = $component_name;
	
	} else if(! $component_path = fileupload_ifexists("components/".$component_name."*", "") ){
		e();
	
	} else if(! $file_path = $component_path."/".$file_name.'.js' ){
		e();

	} else if(! file_exists( $file_path ) ){
		e();
		echo $file_path;

	} else if(! $GLOBALS['include_all_js'] ){
		e();
	
	} else if(! in_array( $file_path, $GLOBALS['include_all_js'] ) ){
		e();

	} else if(! $this_file = implode( '' , file($file_path) ) ){
		// e(); //the file is empty
		// echo $file_path;

	} else if(! strstr($this_file,"/*print*/") ){
		e();
		echo "it does not contain the word 'print'";


	} else {
		$GLOBALS['js_enqueue'][] = $file_path;
	}

}










