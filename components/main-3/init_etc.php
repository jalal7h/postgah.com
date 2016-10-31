<?

# jalal7h@gmail.com
# 2016/07/01
# 1.1

$GLOBALS['do_init'][] = 'init_etc';

function init_etc(){
	
	#
	# session
	if( session_id()=='' ){
		session_start();
	}

	# 
	# main components
	$needed_components = [ 'main', 'main.admin', 'main.db', 'main.include', 'layout' ];
	if(! is_component( $needed_components ) ){
		echo 'the following component is needed : <br>'.implode(', ', $needed_components);
		die();
	}

	is_component_load();

}

