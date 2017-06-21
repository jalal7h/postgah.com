<?php

# jalal7h@gmail.com
# 2017/05/01
# 1.0

add_adminusertab( 'ticketbox_viewUserTicketList', 'تیکت‌ها' );

function ticketbox_viewUserTicketList(){

	$user_id = intval($_REQUEST['id']);

	###################################################################################
	# the new version 1.30

	# 
	# the list
	$list['head'] = __('لیست %%', [ lmtc('ticketbox')[1] ]);
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `ticketbox` INNER JOIN `ticketbox_user` on `ticketbox`.`id` = `ticketbox_user`.`ticketbox_id` WHERE `ticketbox`.`hide`='0' AND `ticketbox_user`.`flag`='".intval($_REQUEST['flag'])."' AND `user_id`='$user_id' ORDER BY `ticketbox_user`.`flag` ASC , `date_updated` DESC ";
	$list['id_column'] = 'ticketbox_id';
	$list['target_blank'] = true;
	
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '_URL."/?page=admin&cp='.$_REQUEST['cp'].'&do='.$_REQUEST['do'].'&id='.$_REQUEST['id'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '_URL."/admin/ticketbox/view/".$rw["ticketbox_id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['addnew_url'] = false;//'_URL."/?page=admin&cp='.$_REQUEST['cp'].'&func=ticketbox_mg_form"';
	$list['remove_url'] = false; // link dokme hazf
	// $list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	$list['modify_url'] = false;
	// $list['tr_color_identifier'] = '( ticketbox_user($rw["id"])["flag"] ? 0 : 1 )';
	// $list['tr_class'] = 'ticketbox_mg_list_trClass($rw)';
	$list['tr_color_identifier'] = '!$rw["flag"]';

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array('head'=>lmtc('ticketbox:name'), 'content' => '"<span>#".$rw["ticketbox_id"]."</span> ".$rw[\'name\']');
	$list['list_array'][] = array('head'=>__('وضعیت'), 'content' => 'ticketbox_replyStatus($rw)');
	$list['list_array'][] = array('head'=>__('تاریخ'), 'content' => 'substr( UDate($rw[\'date_updated\']) , 0 , 16 )');
	
	// $list['height'] = 100;

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name" ];

	#
	# dokme enteghal be archive
		// $list['linkTo']['move_to_archive'] = [
		// 	'url' => '_URL."/?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=flag&id=".$rw["ticketbox_id"]',
		// 	'icon' => '14a',
		// 	'name' => __('انتقال به آرشیو'),
		// 	'color' => '#62bb00',
		// 	'width' => 33,
		// 	'text_archivePrompt' => __('آیا مایل به انتقال این پیام به آرشیو هستید؟'),
		// ];

	#
	# paging select
	// $list['paging_select']['flag'] = "<option value=''>".__('پیامهای فعال')."</option><option value='1'>".__('آرشیو پیام‌ها')."</option>";
	// $list['paging_select']['cat'] = "<option value=''>".cat_detail('ticketbox')['name']."</option>".cat_display('ticketbox',$is_array=false);
	
	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################





}


