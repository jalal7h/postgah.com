<?

# jalal7h@gmail.com
# 2016/09/14
# 1.2

function is_table( $table ){

	if( $table=="" ){
		return false;
	
	}if(! $rs = dbq(" SHOW TABLES LIKE '$table' ") ){
		dg();
	
	} else if(! dbn($rs) ){
		return false;

	} else if( dbr($rs,0,0)!=$table ){
		return false;
	
	} else {
		return true;
	}
	
}

