<?php

# jalal7h@gmail.com
# 2017/06/04
# 1.0

function ticketbox_view_post( $rw ){

	$rw['text'] = nl2br($rw['text']);
	$rw['user_name'] = user_detail( $rw['user_id'] )['name'];
	$rw['user_avatar'] = is_component('useravatar') ? useravatar( $rw['user_id'] ) : '';
	$rw['user_type'] = is_adminUser($rw['user_id']) ? 'admin' : 'user';

	return template_engine( 'ticketbox_view_post', [ 
	
		'post' => (object) $rw ,

	]);

}


