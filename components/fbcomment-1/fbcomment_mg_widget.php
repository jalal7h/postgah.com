<?php

# jalal7h@gmail.com
# 2017/05/21
# 1.0

add_adminwidget([ 
	'func'	=> 'fbcomment_mg_widget',
	'grid'	=> 6,
	'cover'	=> true,
#	'prio'	=> 2,
]);

function fbcomment_mg_widget(){
	
	#
	# access control
	if( is_component('useraccess') and (! useraccess(admin_logged(), 'fbcomment_mg') ) ){
		return;
	}

	if( setting('fbcomment_needForConfirm') != 1 ){

		$count_of_comments = number_format( dbqc( 'fbcomment', [ 'flag'=>0 ] ) );

		if( $count_of_comments ){
			echo template_engine( 'fbcomment_mg_widget', [ 'count_of_comments' => $count_of_comments ] );
		}

	}

}


