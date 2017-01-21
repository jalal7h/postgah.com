<?

# jalal7h@gmail.com
# 2017/01/21
# 1.1

function setting( $slug=null, $text=null ){

	#
	# it wants all rich settings
	if(! $slug ){
		if(! $rw_s = table('setting') ){
			e( dbe() );
		
		} else {
			foreach ($rw_s as $rw) {
				$rw_s0[ $rw['slug'] ] = $rw['text'];
			}
			return $rw_s0;
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
	} else if(! dbqc('setting', ['slug'=>$slug]) ){
		dbs( 'setting', ['text'=>$text, 'slug'=>$slug] );

	} else if(! dbs( 'setting', ['text'=>$text], ['slug'=>$slug] ) ){
		e( dbe() );
	
	} else {
		return true;
	}
	
}






