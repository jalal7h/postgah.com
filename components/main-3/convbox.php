<?

# jalal7h@gmail.com
# 2016/10/23
# 1.1

function convbox( $text, $dir=null ){

	if(! in_array( strtolower($dir) , ['rtl','ltr'] ) ){
		$class = $dir;
		$dir = null;
	}

	return '<div class="convbox'.
		( $class ? " ".$class : '' ).'" '.
		( $dir ? 'style="direction: '.$dir.';" ' : '' ).
		'>'.$text.'</div>';

}

