<?

# -spi- for postgah

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_user_form(){

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

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "ticketbox" ,
			"action" => "./?'.query_string_set( 'do1', null ).'",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do1",
		!]
			
			'.( $item_id ? '
				[!"hidden:user_id"=>"'.$user_id.'"!]
				[!"hidden:item_id"=>"'.$item_id.'"!]
				[!"hidden:h"=>"'.$h.'"!]
				[!"hidden:cat"=>"0"!]
				
				[!"text:user_name_memo/disabled"=>"'.table('user',$rw_item['user_id'],'name').'","'.__('گیرنده پیام').'"!]
			
			' : '
				[!"select:cat*", "option"=>"<option value=\'0\' ></option>".cat_display("ticketbox",false)!]
			' ).'
			
			<hr>
			
			'.( ticketbox_client_to_client ? '[!"searchbox:user_id*"=>ticketbox_user($rw["id"])["foreign"],"feed"=>"user(name)[id]","'.__('گیرنده پیام').'"!]' : '' ).'
			
			[!"text:name*"!]
			
			'.( $_REQUEST['id'] ? '' : '[!"textarea:text*","'.__('متن پیام').'"!]' ).'
			
			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}









