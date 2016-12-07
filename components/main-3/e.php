<?

# jalal7h@gmail.com
# 2016/12/07
# 1.6

function e( $text=null, $line=null, $etc=null, $its_ed=0 ){

	if( $line ){
		$text.= " : ".$line;
	
	} else {
		$bt1 = debug_backtrace()[1+$its_ed];
		$bt0 = debug_backtrace()[0+$its_ed];
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


function ed( $text=null, $line=null, $etc=null ){
	
	e( $text, $line, $etc, $its_ed=1 );
	die();

}


function dg( $text = "" ){
	
	if(! defined('debug') ){
		//
	
	} else if( debug != true ){
		//
	
	} else {

		$dbg = debug_backtrace();
		$d0 = $dbg[0];
		$d1 = $dbg[1];
		$d2 = $dbg[2];
		$d3 = $dbg[3];

		if( $text ){
			if( is_array($text) ){
				$text = json_encode($text);
			}
		}

		// error_log( "debug: ".$d1['function'].":".$d0['line']."; ".$d1['line'].":".basename($d1['file'])."; ".( $text ? ", ".$text : "" ) );
		error_log( 
			"debug: ".
			$d1['function'].":".$d0['line']."; ".
			$d2['function'].":".$d1['line']."; ".
			$d3['function'].":".$d2['line']."; ".
			$text );

	}

	return false;

}




