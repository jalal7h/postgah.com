<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function abusereport_mg_remove_userItems( $silent=false ){
	
	if(! $user_id = $_REQUEST['user_id'] ){
		e();
		
	} else if(! $rw_user = table('user', $user_id) ){
		e();
		
	} else if(! $id = $_REQUEST['id'] ){
		e();
		
	} else if(! $rw_ar = table('abusereport', $id) ){
		e();
		
	} else if(! $rs = dbq(" SELECT `id` FROM `".$rw_ar['table_name']."` WHERE `user_id`='$user_id' ") ){
		e();

	} else if(! dbn($rs) ){
		//

	} else {
		

		# # # # #
		# texty 
		#
		if(! $silent ){

			if( is_column( $rw_ar['table_name'], 'user_id' ) ){
				if( $foreign = $rw_item['user_id'] ){
					$vars['bad_user_name'] = table('user', $foreign, 'name');
				}
			} else {
				$foreign = 0;
			}
			
			if( $rw_ar['user_id'] or $foreign ){
				
				$vars['item_id'] = $rw_item['id'];
				$vars['item_name'] = ( $rw_item['name'] ? $rw_item['name'] : sub_string($rw_item['text'],0,150) );

				if( $lmtc = lmtc($rw_ar['table_name']) ){
					$vars['item_title'] = $lmtc[0];

				} else {
					$vars['item_title'] = __('آیتم');
				}

				echo texty( 'abusereport_mg_remove_userItems', $vars, [ $rw_ar['user_id'] , $foreign ] );

			}

		}

		# 
		# # # # #


		# remove
		$func_remove = $rw_ar['table_name']."_remove";

		while( $rw = dbf($rs) ){
			
			if( function_exists($func_remove) ){
				if(! $func_remove( $rw['id'] ) ){
					e();
				}
		
			} else if(! dbrm( $rw_ar['table_name'], $rw['id'] ) ){
				e();
			}
			
		}
		#
		
	}

}









