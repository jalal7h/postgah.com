<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function ticketbox_user_saveNew(){

	# -spi- for postgah
	if( $item_id = $_REQUEST['item_id'] ){
		if(! $rw_item = table('item', $item_id) ){
			echo convbox("پیوند غیرمجاز","transparent");
			return false;
		} else if(! $user_id = user_logged() ){
			echo convbox("پیوند غیرمجاز","transparent");
			return false;
		} else if(! $h = $_REQUEST['h'] ){
			echo convbox("پیوند غیرمجاز","transparent");
			return false;
		} else {
			$string = $user_id.$item_id;
			$new_h = md5x( $string , $length=12, $dynamic=true , $url=true );
			if( $h != $new_h ){
				echo convbox("پیوند غیرمجاز","transparent");
				return false;
			}
		}
	}

	$foreign = $rw_item['user_id'];

	if( ticketbox_client_to_client ){
		if(! $_REQUEST['user_id'] = intval($_REQUEST['user_id']) ){
			ed();
		}
	}

	# -spi- for postgah
	$_REQUEST['cat'] = intval($_REQUEST['cat']);

	if(! $current_user_id = user_logged() ){
		ed();
	
	# -spi- for postgah
	// } else if(! $_REQUEST['cat'] = intval($_REQUEST['cat']) ){
		// e();

	} else if(! $_REQUEST['name'] = trim($_REQUEST['name']) ){
		e();

	} else if(! $_REQUEST['text'] = trim($_REQUEST['text']) ){
		e();

	#
	# ticketbox
	# -spi- for postah
	} else if(! $ticketbox_id = dbs( 'ticketbox', ['cat','name','item_id'] ) ){
		e();

	#
	# ticketbox post
	} else if(! dbs('ticketbox_post',['ticketbox_id'=>$ticketbox_id,'user_id'=>$current_user_id,'text'] ) ){
		e();

	#
	# ticketbox user
	} else if(! dbs( 'ticketbox_user', [ 'user_id'=>$current_user_id, 'ticketbox_id'=>$ticketbox_id, 'flag'=>1 ] ) ){
		e();
		
	} else {

		# -spi- for postgah
		if( $item_id ){
			if(! dbs( 'ticketbox_user', [ 'user_id'=>$foreign, 'ticketbox_id'=>$ticketbox_id, 'flag'=>1 ] ) ){
				ed();
			}

		} else if( ticketbox_client_to_client ){
			if(! dbs( 'ticketbox_user', [ 'user_id', 'ticketbox_id'=>$ticketbox_id, 'flag'=>1 ] ) ){
				ed();
			}

		} else {
			if(! dbs( 'ticketbox_user', [ 'user_id'=>1, 'ticketbox_id'=>$ticketbox_id, 'flag'=>1 ] ) ){
				ed();
			}
		}

		return true;
		
	}

	return false;

}









