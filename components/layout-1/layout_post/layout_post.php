<?

# jalal7h@gmail.com
# 2017/01/29
# 1.2

add_layer( 'layout_post', 'پست دلخواه', '', 'N' );

function layout_post( $rw /* $rw_pagelayer */ ){
	
	$allow_eval = false;
	
	// $rw['data'] = str_replace( "\'", "'", $rw['data'] );
	$rw['data'] = stripcslashes( $rw['data'] );

	switch(strtoupper($rw['type'])){
	
		case 'HTML' :
			break;
			
		case 'PHP5' : 
			$allow_eval = true;
			break;
		
		case 'TEXT' :
		default : 
			$rw['data'] = htmlspecialchars($rw['data']);
			$rw['data'] = nl2br($rw['data']);
			break;
			
	}

	if(! $rw['framed'] ){
	
		if( strtoupper($rw['type']) == 'PHP5' ){
			$rw['data'] = "<div class='layout-php5-raw-content'>".$rw['data']."</div>";

		} else {
			$rw['data'] = "<div class='layout-html-raw-content'>".$rw['data']."</div>";
		}
	
	}

	return layout_post_box( $rw['name'], $rw['data'], $allow_eval, $rw['framed'], $rw['pos'] );
	
}

function post( $rw ){
	return layout_post( $rw );
}



