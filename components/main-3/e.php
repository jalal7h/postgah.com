<?

# jalal7h@gmail.com
# 2016/09/12
# 1.2

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

function dg( $text="" ){
	
	if(! defined('debug') ){
		return false;
	
	} else if( debug != true ){
		return false;
	
	} else {

		$dbg = debug_backtrace();
		$d0 = $dbg[0];
		$d1 = $dbg[1];

		error_log( "debug :: line ".$d0['line']." at function ".$d1['function']." , ran at line ".$d1['line']." of ".basename($d1['file']).($text?", ".$text:"") );

	}
}




