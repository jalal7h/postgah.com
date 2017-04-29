<?

# jalal7h@gmail.com
# 2017/04/29
# 1.3

# title / kw / desc
# echo news_meta('kw');

function news_meta( $type ){

	if(! $id = $_REQUEST['id'] ){
		// e();

	} else if(! $rw = table("news", $id) ){
		// e();
	
	} else if(! $rw['flag'] ){
		d404();

	} else {

		switch ( $type ) {

			case 'title':
				return $rw['name'];
			
			case 'kw':
				return $rw['tag'];
			
			case 'desc':
				$desc = $rw['text'];
				$desc = str_replace( "\n", "", $desc );
				$desc = strip_tags( $desc );
				$desc = sub_string( $desc, 0, 1000 );
				$desc = trim( $desc );
				return $desc;
				
		}
		
	}

}









