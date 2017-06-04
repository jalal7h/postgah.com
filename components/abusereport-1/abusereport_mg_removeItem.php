<?

function abusereport_mg_removeItem(){

	if(! $id = $_REQUEST['id'] ){
		e();

	} else if(! $rw_ar = table('abusereport', $id) ){
		e();

	} else if(! $rw_item = table( $rw_ar['table_name'], $rw_ar['table_id'] ) ){
		e();

	} else {


		# # # # #
		# texty 
		#

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

			echo texty( 'abusereport_mg_removeItem', $vars, [ $rw_ar['user_id'] , $foreign ] );

		}

		# 
		# # # # #


		# remove
		if( function_exists( $func_remove = $rw_ar['table_name']."_remove" ) ){
			if(! $func_remove( $rw_ar['table_id'] ) ){
				e();
			}
		
		} else if(! dbrm( $rw_ar['table_name'], $rw_ar['table_id'] ) ){
			e();
		}
		#


	}

}

