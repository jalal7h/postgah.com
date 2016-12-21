<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

$GLOBALS['userpanel_item'][ 51 ] = [ 'ticketbox_user_list', 'پیام ها', '0e6' ];

function ticketbox_user_list(){
	
	if(! $user_id = user_logged() ){
		ed();
	}

	switch ($_REQUEST['do1']) {
		
		case 'flag':
			ticketbox_flag();
			break;

		case 'view':
			return ticketbox_view();
		
		case 'form':
			return ticketbox_user_form();

		case 'saveNew':
			ticketbox_user_saveNew();
			break;
			
	}


	echo js_print( 'ticketbox', 'ticketbox_user_list_archive' );

	###################################################################################
	# the new version 1.30

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `ticketbox` INNER JOIN `ticketbox_user` on `ticketbox`.`id` = `ticketbox_user`.`ticketbox_id` WHERE `ticketbox`.`hide`='0' AND `ticketbox_user`.`flag`='".intval($_REQUEST['flag'])."' AND `user_id`='$user_id' ORDER BY `ticketbox_user`.`flag` ASC , `date_updated` DESC ";
	$list['id_column'] = 'ticketbox_id';

	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = 'ticketbox_user_link( $rw["ticketbox_id"] )';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['addnew_url'] = true;
	// $list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	// $list['modify_url'] = true;
	$list['tr_color_identifier'] = '!$rw["flag"]';
	$list['tr_class'] = 'ticketbox_user_list_trClass($rw)';
	$list['addnew_prompt'] = __('ارسال پیام پشتیبانی جدید');

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array('head'=>lmtc('ticketbox:name'), 'content' => '"<span>#".$rw["ticketbox_id"]."</span> ".$rw[\'name\']');
	$list['list_array'][] = array('head'=>__('نوع'), 'content' => 'ticketbox_type($rw)');
	$list['list_array'][] = array('head'=>__('وضعیت'), 'content' => 'ticketbox_replyStatus($rw)');
	$list['list_array'][] = array('head'=>__('تاریخ'), 'content' => '"<span title=\"".substr(UDate($rw[\'date_updated\']),0,16)."\">".time_inword($rw[\'date_updated\'])."</span>"');
		
	$list['height'] = 100;

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name" ];

	#
	# dokme enteghal be archive
	$list['linkTo']['move_to_archive'] = [
		'url' => '_URL."/?page=".$_REQUEST["page"]."&do=".$_REQUEST["do"]."&do1=flag&id=".$rw["ticketbox_id"]',
		'icon' => '14a',
		'name' => 'انتقال به آرشیو',
		'color' => '#62bb00',
		'width' => 35,
		'text_archivePrompt' => __('آیا مایل به انتقال این پیام به آرشیو هستید؟'),
	];

	#
	# paging select
	$list['paging_select']['flag'] = "<option value=''>پیامهای فعال</option><option value='1'>آرشیو پیام‌ها</option>";

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################


}



function ticketbox_user_list_trClass( $rw ){

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







