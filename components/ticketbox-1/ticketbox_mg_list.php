<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_mg_list(){

	$user_id = admin_logged();

	switch ($_REQUEST['do']) {
		
		case 'flag':
			$ticketboxUser_id = ticketbox_user( $_REQUEST['id'] )['id'];
			listmaker_flag( 'ticketbox_user', null, $ticketboxUser_id );
			break;

		case 'view':
			return ticketbox_mg_view();
		
	}


	###################################################################################
	# the new version 1.30

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `ticketbox` WHERE 1 AND `id` IN (SELECT `ticketbox_id` FROM `ticketbox_user` WHERE `user_id`='$user_id' AND `ticketbox_id`=`ticketbox`.`id`) ORDER BY `date_updated` DESC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&do=view&id=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['addnew_url'] = true;
	$list['remove_url'] = true; // link dokme hazf
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	$list['tr_color_identifier'] = '( ticketbox_user($rw["id"])["flag"] ? 0 : 1 )';
	$list['tr_class'] = 'ticketbox_mg_list_trClass($rw)';

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array('head'=>lmtc('ticketbox:name'), 'content' => '$rw[\'name\']');
	// $list['list_array'][] = array('head'=>lmtc('ticketbox:url'), 'content' => '$rw[\'url\']');
	// $list['list_array'][] = [ 'head'=>lmtc('ticketbox:name'), 'title'=>'$rw["slug"]', "content"=>'$rw[\'name\']' ];
	
	$list['height'] = 100;

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name" ];


	#
	# paging select
	$list['paging_select']['cat'] = "<option value=''>".cat_detail('ticketbox')['name']."</option>".cat_display('ticketbox',$is_array=false);
	
	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

}


function ticketbox_mg_list_trClass( $rw ){

	if( ticketbox_isReplied($rw['id']) ){
		$class[] = "replied";
	} else {
		$class[] = "notreplied";
	}

	if( ticketbox_isNew($rw['id']) ){
		$class[] = "new";
	} else {
		$class[] = "notnew";
	}

	if( sizeof($class) ){
		return implode(" ", $class);
	} else {
		return "";
	}

}









