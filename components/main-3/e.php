<?

# jalal7h@gmail.com
# 2016/10/28
# 1.4

function e( $text=null, $line=null, $etc=null ){

	if( $line ){
		$text.= " : ".$line;
	
	} else {
		$bt1 = debug_backtrace()[1];
		$bt0 = debug_backtrace()[0];
		$text = $bt1['function'] . " : " . $bt0['line'] . "; " . $text;
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

function dg( $text = "" ){
	
	if(! defined('debug') ){
		return false;
	
	} else if( debug != true ){
		return false;
	
	} else {

		$dbg = debug_backtrace();
		$d0 = $dbg[0];
		$d1 = $dbg[1];

		if( $text ){
			if( is_array($text) ){
				$text = json_encode($text);
			}
		}

		error_log( "debug :: line ".$d0['line']." at function ".$d1['function']." , ran at line ".$d1['line']." of ".basename($d1['file']).( $text ? ", ".$text : "" ) );

	}
}




