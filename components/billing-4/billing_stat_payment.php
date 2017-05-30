<?

// $list = array (
// 	"user_id" => "11" ,
// 	"method" => "mellat" ,
// 	"skipwallet" => true ,
// 	"date" => array ( 
// 		"day" => "1394/12/12" , // the day
// 		"week" => "1394/12/12" , // end day
// 		"month" => "1394/12/12" , // end day
// 		"monthIn" => "1394/12" , // this month
// 		"year" => "1394/12/12" , // end day
// 		"yearIn" => "1394" , // this year
// 	) ,
// );
// echo billing_stat_payment( $list );
/*README*/

function billing_stat_payment( $list ){

	$q = " SELECT SUM(`cost`) FROM `billing_invoice` WHERE `date`>0 ";
	
	if( $user_id = $list['user_id'] ){
		$q.= " AND `user_id`='$user_id' ";
	}
	
	if( $method = $list['method'] ){
		$q.= " AND `method`='$method' ";
	}
	
	if( $list['skipwallet'] ){
		$q.= " AND `method`!='wallet' ";
	}
	
	if( $date = $list['date'] ){
		
		foreach ($date as $k => $d) {
			
			switch ($k) {
				case 'day':
					$d = $d." 00:00:00";
					$d = DateU($d);
					$date_from = $d;
					$date_to = $d + (3600 * 24);
					break;

				case 'week':
					$d = $d." 23:59:59";
					$d = DateU($d);
					$date_to = $d;
					$date_from = $d - (3600 * 24 * 7);
					break;

				case 'month':
					$d = $d." 23:59:59";
					$d = DateU($d);
					$date_to = $d;
					$date_from = $d - (3600 * 24 * 30);
					break;
				
				case 'monthIn':
					$d_month = substr($d, 5, 2);
					$day_max = ($d_month<=6?31:($d_month==12?29:30));
					$date_from = DateU( $d."/01 00:00:00" );
					$date_to = DateU( $d."/$day_max 23:59:59" );
					break;
				
				case 'year':
					$d = $d." 23:59:59";
					$d = DateU($d);
					$date_to = $d;
					$date_from = $d - (3600 * 24 * 365);
					break;

				case 'yearIn':
					$d_year = substr($d, 0, 4);
					$date_from = DateU( $d."/01/01 00:00:00" );
					$date_to = DateU( $d."/12/29 23:59:59" );
					break;
			}
			
			break;
		
		}
		
		$q.= " AND (`date`>'$date_from' AND `date`<'$date_to') ";

	}

	if(! $rs = dbq( $q ) ){
		e();

	} else {

		$sum_of_cost = dbr( $rs, 0, 0 );

		if( lang_code == 'fa' ){
			return $sum_of_cost;

		} else {
			// return number_format( $sum_of_cost, 2, '.', '' );
			return round( $sum_of_cost , 2 );
		}

	}

	// return "kk";

	
}



