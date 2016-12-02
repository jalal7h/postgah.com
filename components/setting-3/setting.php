<?

# jalal7h@gmail.com
# 2016/11/01
# 1.0

function setting( $slug=null, $text=null ){

	#
	# it wants all rich settings
	if(! $slug ){
		if(! $rs = dbq(" SELECT * FROM `setting` WHERE 1 ")){
			e( dbe() );
		
		} else if(! dbn($rs) ){
			e();
		
		} else {
			while( $rw = dbf($rs) ){
				$rw_s[ $rw['slug'] ] = $rw['text'];
			}
			return $rw_s;
		}

		return false;
	
	#
	# wants some specific record
	} else if( $text === null ){
		
		if(! $rs = dbq(" SELECT `text` FROM `setting` WHERE `slug`='$slug' LIMIT 1 ")){
			e( dbe() );
		
		} else if( dbn($rs) != 1 ){
			return false;

		} else if(! $rw = dbf($rs) ){
			e();

		} else {
			return $rw['text'];
		}
	
	#
	# wants to store some text in some slug
	} else if(! dbn(dbq(" SELECT * FROM `setting` WHERE `slug`='$slug' LIMIT 1 ")) ){
		dbs( 'setting', ['text'=>$text, 'slug'=>$slug] );

	} else if(! dbs( 'setting', ['text'=>$text], ['slug'=>$slug] ) ){
		e( dbe() );
	
	} else {
		return true;
	}
	
}






