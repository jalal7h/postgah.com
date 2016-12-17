<?

$GLOBALS['do_action'][] = 'pgItem_display_ticketboxLinkMaker';

function pgItem_display_ticketboxLinkMaker(){

	if(! $user_id = user_logged() ){
		echo "<a onclick=\"alert('برای سوال از فروشنده ابتدا وارد سایت شوید'); return false;\" href=\"#\" class=\"submit_button ask_from_seller gray\">".__('سوال از فروشنده')."</a>";
	
	} else if(! $item_id = $_REQUEST['item_id'] ){
		ed();
	
	} else if(! $rs = dbq(" SELECT * FROM `ticketbox` INNER JOIN `ticketbox_user` on `ticketbox`.`id` = `ticketbox_user`.`ticketbox_id` WHERE `user_id`='$user_id' AND `ticketbox`.`table_name`='item' AND `ticketbox`.`table_id`='$item_id' LIMIT 1 ") ){
		e( dbe() );
	
	} else if( dbn($rs) == 1 ){
		$link = _URL."/?page=14&do=ticketbox_user_list&do1=view&id=".dbr($rs,0,'ticketbox_id');
		echo "<a href=\"$link\" class=\"submit_button ask_from_seller\">".__('سوال از فروشنده')."</a>";
		
	} else {
		
		$string = $user_id.$item_id;
		$h = md5x( $string , $length=12, $dynamic=true , $url=true );
		
		$link = _URL."/?page=14&do=ticketbox_user_list&do1=form&table_name=item&table_id=$item_id&user_id=$user_id&hash_code=".ticketbox_private_token_make([ 'table_name'=>'item', 'table_id'=>$item_id, 'user_id'=>$user_id ]);
		echo "<a href=\"$link\" class=\"submit_button ask_from_seller\">".__('سوال از فروشنده')."</a>";
		
	}

}

