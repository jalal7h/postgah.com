<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function fbcomment_remove( $id ){

	if(! $rs = dbq(" SELECT `id` FROM `fbcomment` WHERE `comment_id`='$id' ") ){
		e( dbe() );
	
	} else if(! dbn($rs) ){
		//

	} else while( $rw = dbf($rs) ){
		fbcomment_remove( $rw['id'] );
	}

	dbrm( 'fbcomment', $id );

	return true;

}






