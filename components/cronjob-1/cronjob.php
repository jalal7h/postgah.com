<?

# jalal7h@gmail.com
# 2016/07/20
# 1.1

// $GLOBALS['cronjob'][] = [ 'pgItem_expire_agent', '0 0 * * *' ];
// $GLOBALS['cronjob'][] = [ 'pgItem_expire_agent', '0 0 * * sun,mon', $variable_value ];
// $GLOBALS['cronjob'][] = [ 'pgItem_expire_agent', '143084800' ];

/*README*/

$GLOBALS['do_action'][] = 'cronjob';

function cronjob(){

	cronjob_fetch_db_cronjobs();
	
	if(! sizeof($GLOBALS['cronjob']) ){
		return false;
	
	} else foreach( $GLOBALS['cronjob'] as $k => $cron ){
		
		$func = trim($cron[0]);
		$time = trim($cron[1]);
		$vars = trim($cron[2]);
		$cronjob_table_id = trim($cron[3]);

		// its U format
		if( is_numeric($time) and strlen($time)==10 ){
			
			if( $time < U() ){
				
				if( $cronjob_table_id ){
					dbrm( 'cronjob', $cronjob_table_id );
				}
				
				if(! function_exists($func) ){
					e('function '.$func.' not defined');
				
				} else if( $vars ){
					$func( $vars );
				
				} else {
					$func();
				}

			} else {
				// its soon for this cron
			}

		// its cronjob format
		} else {
			
			$time_arr = explode(" ", $time);
			
			if( sizeof($time_arr) != 5 ){
				ed();
			}

			$time_min = $time_arr[0];
			$time_hour = $time_arr[1];
			$time_day = $time_arr[2];
			$time_month = $time_arr[3];
			$time_dow = $time_arr[4];

			// 0 (for Sunday) through 6 (for Saturday)
			$time_dow = str_ireplace( 
				['sun','mon','tue','wed','thu','fri','sat'] , 
				['0','1','2','3','4','5','6'] , 
				$time_dow);

			if( $time_min!="*" and (! strstr( ','.$time_min.',' , ','.intval(date("i",U())).',' ) ) ){
				// min is not satisfied

			} else if( $time_hour!="*" and (! strstr( ','.$time_hour.',' , ','.date("G",U()).',' ) ) ){
				// hour is not satisfied

			} else if( $time_day!="*" and (! strstr( ','.$time_day.',' , ','.date("j",U()).',' ) ) ){
				// day is not satisfied
				
			} else if( $time_month!="*" and (! strstr( ','.$time_month.',' , ','.date("n",U()).',' ) ) ){
				// month is not satisfied

			} else if( $time_dow!="*" and (! strstr( ','.$time_dow.',' , ','.date("w",U()).',' ) ) ){
				// dayOfWeek is not satisfied

			} else {
				$func();
			}

		}

	}

}






