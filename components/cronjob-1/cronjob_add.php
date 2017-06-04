<?

# jalal7h@gmail.com
# 2016/07/20
# 1.0

// baraye ezafe kardan e task be cron estefade mishe, faghat U support mikone

// only supports the U format
// cronjob_add( 'func', '1400332211' );
// cronjob_add( 'func'/*function*/, '1400332211'/*date*/, '11'/*var*/ );
// cronjob_add( 'pgPlan_syncItemPlan', $date_start, $item_id );
// function cronjob_add( $func, $date, $vars=null )

/*README*/

function cronjob_add( $func, $date, $vars=null ){

	$func = trim($func);
	$date = trim($date);

	if( !is_numeric($date) or strlen($date)!=10 ){
		e();
	
	} else if(! dbs( 'cronjob', [ 'func'=>$func, 'date'=>$date, 'vars'=>$vars ] ) ){
		e();

	} else {
		return true;
	}

}






