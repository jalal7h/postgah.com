<?php

# jalal7h@gmail.com
# 2017/05/21
# 1.0

add_adminwidget([ 
	'func'	=> 'contact_mg_widget',
	'grid'	=> 6,
	'cover'	=> true,
]);

function contact_mg_widget(){
	
	#
	# access control
	if( is_component('useraccess') and (! useraccess(admin_logged(), 'contact_mg') ) ){
		return;
	}

	$messages = number_format( dbqc( 'contact' ) );

	if( $messages ){
		echo template_engine( 'contact_mg_widget', [ 'messages' => $messages ] );
	}

}

