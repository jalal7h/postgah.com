<?

# jalal7h@gmail.com
# 2016/12/24
# 1.1

if( $_REQUEST['page'] ){
	
	$_REQUEST['page'] = mb_ereg_replace('[^a-z0-9]+' , '' , $_REQUEST['page'] );
	
	if( $_GET['page'] ){
		$_GET['page'] = mb_ereg_replace('[^a-z0-9]+' , '' , $_GET['page'] );		
	
	} else if( $_POST['page'] ){
		$_POST['page'] = mb_ereg_replace('[^a-z0-9]+' , '' , $_POST['page'] );		
	}

}

if( $_REQUEST ){
	foreach ($_REQUEST as $k => $v) {
		
		if(! is_string($v) ){
			continue;
		} else if(! $v ){
			continue;
		}
		
		// $_REQUEST[ $k ] = str_replace( "'", "\'", $v );
		$_REQUEST[ $k ] = mysql_escape_string( $v );

		if( $_GET[ $k ] ){
			// $_GET[ $k ] = str_replace( "'", "\'", $v );
			$_GET[ $k ] = mysql_escape_string( $v );

		} else if( $_POST[ $k ] ){
			// $_POST[ $k ] = str_replace( "'", "\'", $v );
			$_POST[ $k ] = mysql_escape_string( $v );
		}

	}
}
