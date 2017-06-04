<?php

# jalal7h@gmail.com
# 2017/01/16
# 1.0

// access : user / admin

add_action('sortable_agent');
add_jstext( 'sortable_something_wrong', __('خطایی در مرتب سازی رخ داده است') );

function sortable_agent(){
	
	if(! $feed = var_control($_REQUEST['feed'], 'a-z0-9_/') ){
		e();

	} else if(! $the_id_s = var_control($_REQUEST['the_id_s'], '0-9,' ) ){
		e();

	} else {
		

		# 
		# decode the feed if needed
		if(! strstr($feed, '/') ){
			$feed = str_dec($feed);
		}


		#
		# explode the feed
		$feed = explode('/', $feed );
		$tableName = $feed[0];
		$access = $feed[1];
		

		#
		# handle the access
		if( $access == 'admin' and admin_logged() ){
			//
		} else if( $access == 'user' and user_logged() ){
			$access_query = " AND `user_id`='".user_logged()."' ";
		} else {
			ed();
		}


		# 
		# get list of prio
		if(! $rs = dbq(" SELECT `id`,`prio` FROM `$tableName` WHERE 1 $access_query AND `id` IN ($the_id_s) ") ){
			ed();

		} else if(! dbn($rs) ){
			ed();

		} else while( $rw = dbf($rs) ){
			$prio_list[] = $rw['prio'];
		}


		#
		# sort the prio list
		asort($prio_list);
		foreach ($prio_list as $i => $prio) {
			if( sizeof($sorted_prio_list) and in_array( $prio, $sorted_prio_list ) ){
				$over_prio++;
				$sorted_prio_list[] = $prio + $over_prio;
			} else {
				$sorted_prio_list[] = $prio;

			}
		}
		$prio_list = $sorted_prio_list;
		

		#
		# id list
		$the_id_arr = explode( ',', $the_id_s );
		foreach ($the_id_arr as $i => $the_id){
			if(! dbs( $tableName, [ 'prio'=>$prio_list[$i] ], ['id'=>$the_id] ) ){
				ed();
			}
		}


		# 
		# finish
		echo "OK";


	}

}






