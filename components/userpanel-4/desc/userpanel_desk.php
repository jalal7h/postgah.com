<?

# jalal7h@gmail.com
# 2017/01/23
# 2.4

add_layer( 'userpanel_desk', 'میز کاربری', 'center' );

function userpanel_desk(){

	if( ! user_logged() ){
		user_logout( layout_link(60) );
	}

	foreach( userpanel_menu_items() as $item ){
		
		$func = $item['func'];
		$slug = $item['slug'];

		if( $slug == $_REQUEST['do_slug'] ){
			echo "<div class=\"userpanel_desk\">";
			call_user_func($func);
			echo "</div>";
			return;
		}

	}

	redirect( _URL . '/404.php' );

}




