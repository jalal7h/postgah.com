<?

# jalal7h@gmail.com
# 2016/07/13
# 1.1

function cat_translate( $id ){

	if(! $rs = dbq(" SELECT `name` FROM `cat` WHERE `id`='$id' LIMIT 1 ") ){
		echo "err".__LINE__;
	
	} else if( dbn($rs)!=1 ){
		return "";
	
	} else {
		return dbr( $rs, 0, 0 );
	}
}


