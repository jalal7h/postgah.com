<?

# jalal7h@gmail.com
# 2016/10/23
# 1.1

function convbox( $text, $dir=null ){

	$class = "convbox";

	# 
	if( $dir ){
		
		$dir = explode(" ", $dir);
		
		foreach( $dir as $i => $dir_this ){
			if(! $dir[$i] = trim($dir[$i]) ){
				unset($dir[$i]);
			} else if( in_array( strtolower($dir[$i]) , ['rtl','ltr'] ) ){
				$the_dir = $dir[$i];
				unset($dir[$i]);
			}
		}

		$dir = trim( implode(' ', $dir) );
		
		$class.= " ".$dir;

	}
	
	if( is_admin() ){
		$class.= " admin";
	} else {
		$class.= " not_admin";
	}

	return '<div class="'.$class.'" '.( $the_dir ? 'style="direction: '.$the_dir.';" ' : '' ).'>'.$text.'</div>';

}

