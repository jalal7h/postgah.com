<?

function ed( $text, $line=null, $etc=null ){
	e( $text, $line, $etc );
	die();
}

function e( $text, $line=null, $etc=null ){

	if( $line ){
		$text.= " : ".$line;
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


