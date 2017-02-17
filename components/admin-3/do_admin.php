<?

# jalal7h@gmail.com
# 2016/10/27
# 1.1

function do_admin(){

	if( function_exists('cat_define_globals') ){
		cat_define_globals();
	}

	if( function_exists('linkify_define_globals') ){
		linkify_define_globals();
	}
	
	echo '<div id="do_admin">';
	do_admin_sidebar();
	do_admin_mainbar();
	echo '</div>';
	
}





