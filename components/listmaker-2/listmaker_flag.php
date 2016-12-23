<?

# jalal7h@gmail.com
# 2015/11/30
# 1.1

/*
	listmaker_flag( "links" );

	listmaker_flag( "links" , $id=11 );
	listmaker_flag( "links" ); // age $id ro behesh nadim az $_REQUEST['id'] mikhune

in ye record az table links ro sotun e "flag" ro toggle mikone

** toggle kollan yani, age 0 bud 1 mikone, age 1 bud 0 mikone.

karborde listmaker_flag baraye enable/disable kardan e ye record e.
/*README*/


function listmaker_flag( $table_name , $setFlagTo=null , $id=null , $column="flag" ){
	
	if( $id === null ){
		if(! $id = $_REQUEST['id']){
			e();
		}
	}


	if( $setFlagTo ){
		$value_query = "'$setFlagTo'";
	} else {
		$value_query = "MOD(`$column`+1,2)";
	}


	if(! $rw = table( $table_name , $id ) ){
		e();
	}
	
	if(! dbq(" UPDATE `$table_name` SET `$column`=$value_query WHERE `id`='$id' LIMIT 1 ") ){
		e( dbe() );

	} else {
		return true;
	}


	return false;

}









