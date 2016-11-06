<?

# jalal7h@gmail.com
# 2016/08/28
# 1.0

function mss_mg_client_list(){

	mss_mg_client_reset();


	$table = 'mailserverselector_func';

	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'form':
			return mss_mg_client_form();

		case 'saveEdit':
			mss_mg_client_saveEdit();
			break;

		case 'saveNew':
			mss_mg_client_saveNew();
			break;

	}

	#
	# list
	###################################################################################
	# the new version 1.2

	# 
	# the list
	$list['name'] = __FUNCION__;
	$list['query'] = " SELECT * FROM `$table` WHERE 1 ORDER BY `name` ASC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&func2='.$_REQUEST['func2'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&func2='.$_REQUEST['func2'].'&do=form&id=".$rw["id"]';

	$list['addnew_url'] = false; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = false; // link dokme hazf
	$list['paging_url'] = true; // not needed when we have 'tdd'
	$list['modify_url'] = true;
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = [ "head"=>lmtc($table.":name"), "content"=>'$rw[\'name\']' ];
	$list['list_array'][] = [ "head"=>lmtc("mailserverselector_provider")[0], "content"=>'table("mailserverselector_provider", $rw["mailserverselector_provider_id"],"name")' ];

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name", "call_from_func" ]; 

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################
	

}


