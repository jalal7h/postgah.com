<?

# jalal7h@gmail.com
# 2016/08/28
# 1.1

function e( $text=null, $line=null, $etc=null ){

	if( $line ){
		$text.= " : ".$line;
	
	} else {
		$bt = debug_backtrace()[1];
		$text = $bt['function'] . " : " . $bt['line'] . "; " . $text;
	}
	
	if( $etc ){
		$text.= " (".$etc.")";
	}

	#
	# echo 
	echo "<center>".$text."</center>";
	
	#
	# error log
	error_log( 'e : ' . $text );

	return false;
}


function ed( $text, $line=null, $etc=null ){
	e( $text, $line, $etc );
	die();
}


