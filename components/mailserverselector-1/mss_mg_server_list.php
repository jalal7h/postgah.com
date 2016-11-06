<?

# jalal7h@gmail.com
# 2016/08/28
# 1.0

function mss_mg_server_list(){

	$table = 'mailserverselector_provider';

	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'form':
			return mss_mg_server_form();

		case 'saveEdit':
			mss_mg_server_saveEdit();
			break;

		case 'saveNew':
			mss_mg_server_saveNew();
			break;

		case 'prio':
			listmaker_prio( $table );
			break;

		case 'remove':
			listmaker_remove( $table );
			break;

		case 'flag':
			listmaker_flag( $table );
			break;

	}

	#
	# list
	###################################################################################
	# the new version 1.2

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `$table` WHERE 1 ORDER BY `prio` ASC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&do=form&id=".$rw["id"]';

	// $list['addnew_url'] = true; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['up_or_down'] = true; // link priority
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = [ "head"=>lmtc($table.":name"), "content"=>'$rw[\'name\']' ];
	$list['list_array'][] = [ "head"=>lmtc($table.":type"), "content"=>'mss_server_typeName($rw[\'type\'])' ];
	$list['list_array'][] = [ "head"=>lmtc($table.":sender_addr"), "content"=>'$rw[\'sender_addr\']' ];

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name", "sender_name", "sender_addr", "server_addr", "server_username" ]; 

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################
	
}


// tokyo story, 

$GLOBALS['mss_server_typeName'] = [
	'phpmail' => 'PHP Mail',
	'smtp' => 'SMTP Server',
];

function mss_server_typeName( $type ){
	
	if(! sizeof($GLOBALS['mss_server_typeName']) ){
		return false;

	} else if(! $GLOBALS['mss_server_typeName'][ $type ] ){
		return false;

	} else {
		return $GLOBALS['mss_server_typeName'][ $type ];
	}

}






