<?

# jalal7h@gmail.com
# 2016/12/17
# 1.0

$GLOBALS['do_action'][] = 'ticketbox_view_save';

function ticketbox_view_save(){
	
	# age user e admin bud, ticket be esme main admin sabt beshe
	if( is_adminUser($_REQUEST['user_id']) ){
		$_REQUEST['user_id'] = 1;
	}

	if(! $user_id = intval($_REQUEST['user_id']) ){
		ed();
	
	} else if( admin_logged() != $user_id and user_logged() != $user_id ){
		ed();
	}
	
	if(! $_REQUEST['ticketbox_id'] = intval($_REQUEST['ticketbox_id']) ){
		ed();

	} else if(! $rw_tb = table('ticketbox', $_REQUEST['ticketbox_id']) ){
		ed();

	} else if(! $_REQUEST['text'] = ticketbox_text_clean( $_REQUEST['text'] ) ){
		ed();

	} else if( !is_adminUser($user_id) and !ticketbox_user( $_REQUEST['ticketbox_id'], $user_id ) ){
		ed();

	} else if(! $id = dbs( 'ticketbox_post', [ 'ticketbox_id', 'user_id'=>$user_id, 'text' ] ) ){
		ed();
		
	} else {
		
		# 
		# date_updated on ticketbox
		dbs( 'ticketbox', [ 'date_updated'=>U() ], [ 'id'=>$_REQUEST['ticketbox_id'] ] );

		# 
		# remove from archive, back to live list, for both users
		dbq(" UPDATE `ticketbox_user` SET `flag`='0' WHERE `ticketbox_id`='".$_REQUEST['ticketbox_id']."' ");

		# 
		# set as new for foreign
		$foreign = ticketbox_user( $_REQUEST['ticketbox_id'], $user_id )['foreign'];
		ticketbox_setAsNew( $_REQUEST['ticketbox_id'], $foreign );

		# 
		# congra and display the new post
		echo "OK";
		echo ticketbox_view_post( table( 'ticketbox_post' , $id ) );
		


		# ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ##
		# texty
		#

		# the vars
		$vars['ticket_id'] = $rw_tb['id'];
		$vars['ticket_name'] = $rw_tb['name'];
		if(! $vars['ticket_cat'] = cat_translate($rw_tb['cat']) ){
			$vars['ticket_cat'] = "نامشخص";
		}
		$vars['ticket_link'] = ticketbox_user_link($rw_tb);
		$vars['ticket_adminlink'] = _URL."/?page=admin&cp=ticketbox_mg&func=ticketbox_mg_list&do=view&id=".$rw_tb['id'];


		# vaziat e user_id
		if( ticketbox_client_to_client
			and !is_master($foreign)
			and !is_master($user_id)
		){
			switch (ticketbox_client_to_client) {
				case 'public': $tctc_public = true; break; // ejaze ersal be user, "azad hast"
				case 'private': $tctc_private = true; break; // "limit hast"
			}
		}
		if( !$tctc_public and !$tctc_private ) {
			$tctc_off = true;
			$user_id = 1; // "ejaze nist"
		}


		# if its a support ticket
		if( $tctc_off ){

			# reply from admin
			if( is_master($user_id) ){
				texty( "ticketbox_view_save_support", $vars, [ 0, $foreign ] );
			
			# reply from user
			} else {
				texty( "ticketbox_view_save_support", $vars, [ $user_id, 0 ] );
			}

		# if its a client message
		} else {
			
			$vars['sender_user_name'] = table('user', $user_id, 'name');
			$vars['receiver_user_name'] = table('user', $foreign, 'name');

			# if its a "free" client message
			if( $tctc_public ){
				texty( 'ticketbox_view_save_to_client', $vars, [ $user_id , $foreign ] );

			# if its a "limited" client message
			} else if( $tctc_private ){
				
				$table_name = $rw_tb['table_name'];
				$table_id = $rw_tb['table_id'];

				if( $lmtc = lmtc($table_name) ){
					$vars['item_title'] = $lmtc[0];
				} else {
					$vars['item_title'] = __('آیتم');
				}

				$vars['item_id'] = $table_id;
				$vars['item_name'] = table( $table_name, $table_id, 'name' );
				$vars['item_link'] = _URL;
				$func_link = $table_name."_link";
				if( function_exists($func_link) ){
					$vars['item_link'] = $func_link( $table_id );
				}

				texty( 'ticketbox_view_save_askFromSeller', $vars, [ $user_id , $foreign ] );
				
			}

		}

		#
		# ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ##


		# 
		# die
		die();

	}
	
}


function ticketbox_text_clean( $text ){

	$text = strip_tags($text);
	$text = str_replace("'", "", $text );
	$text = trim($text);

	return $text;

}










