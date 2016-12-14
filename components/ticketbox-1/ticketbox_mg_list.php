<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_mg_list(){

	$user_id = admin_logged();

	switch ($_REQUEST['do']) {
		
		case 'flag':
			ticketbox_flag();
			break;

		case 'remove':
			dbrm( 'ticketbox', null, true );
			break;

		case 'view':
			return ticketbox_view();
		
		case 'form':
			return ticketbox_mg_form();

		case 'saveNew':
			ticketbox_mg_saveNew();
			break;
			
		case 'saveEdit':
			ticketbox_mg_saveEdit();
			break;
			
	}


	###################################################################################
	# the new version 1.30

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `ticketbox` INNER JOIN `ticketbox_user` on `ticketbox`.`id` = `ticketbox_user`.`ticketbox_id` WHERE `ticketbox`.`hide`='0' AND `user_id`='1' ORDER BY `ticketbox_user`.`flag` ASC , `ticketbox_user`.`flag` ASC , `date_updated` DESC "; // AND `ticketbox_user`.`flag`='0'
	$list['id_column'] = 'ticketbox_id';
	
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&do=view&id=".$rw["ticketbox_id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['addnew_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func=ticketbox_mg_form"';
	$list['remove_url'] = true; // link dokme hazf
	// $list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	$list['modify_url'] = true;
	// $list['tr_color_identifier'] = '( ticketbox_user($rw["id"])["flag"] ? 0 : 1 )';
	$list['tr_class'] = 'ticketbox_mg_list_trClass($rw)';
	$list['tr_color_identifier'] = '!$rw["flag"]';

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array('head'=>lmtc('ticketbox:name'), 'content' => '"<span>#".$rw["ticketbox_id"]."</span> ".$rw[\'name\']');
	$list['list_array'][] = array('head'=>__('وضعیت'), 'content' => 'ticketbox_replyStatus($rw)');
	$list['list_array'][] = array('head'=>__('تاریخ'), 'content' => 'substr( UDate($rw[\'date_updated\']) , 0 , 16 )');
		
	$list['height'] = 100;

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name" ];

	#
	# dokme enteghal be archive
	$list['linkTo']['move_to_archive'] = [
		'url' => '_URL."/?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=flag&id=".$rw["ticketbox_id"]',
		'icon' => '14a',
		'name' => 'انتقال به آرشیو',
		'color' => '#62bb00',
		'width' => 33,
	];

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

	$ticketbox_id = $rw['ticketbox_id'];

	if( dbr( dbq(" SELECT COUNT(*) FROM `ticketbox_post` WHERE `ticketbox_id`='$ticketbox_id' ") , 0, 0) > 1 ){
		if( ticketbox_isReplied( $ticketbox_id ) ){
			$class[] = "replied";
		} else {
			$class[] = "notreplied";
		}
	}

	if( ticketbox_isNew( $ticketbox_id ) ){
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








