<?

# jalal7h@gmail.com
# 2017/01/03
# 1.2

add_init( 'init_etc', 1 );

function init_etc(){
	
	#
	# session
	if( session_id()=='' ){
		session_start();
	}
	
	#
	# _PAGE
	if(! $page_id = $_REQUEST['page'] ){
		$page_id = 1;
	}
	define( '_PAGE', $page_id );

	# 
	# main components
	$needed_components = [ 'main', 'main.admin', 'main.db', 'main.include', 'layout' ];
	if(! is_component( $needed_components ) ){
		echo 'the following component is needed : <br>'.implode(', ', $needed_components);
		die();
	}

	is_component_load();

}

