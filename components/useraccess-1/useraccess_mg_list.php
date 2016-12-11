<?

# jalal7h@gmail.com
# 2016/09/19
# 1.1

function useraccess_mg_list(){

	#
	# action
	switch ($_REQUEST['do']) {

		case 'saveNew':
			useraccess_mg_saveNew();
			break;

		case 'saveEdit':
			useraccess_mg_saveEdit();
			break;
			
		case 'flag':
			listmaker_flag('user');
			break;

		case 'remove':
			useraccess_mg_remove();
			break;

	}


	#
	# list

	###################################################################################
	# the new version 1.2

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['class'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `user` WHERE `permission`='2' AND `id`!='1' ORDER BY `id` DESC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp'].'_form&id=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	// $list['addnew_url'] = true; // link icon "new" vaqti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array("head"=>lmtc("user:name"), "content" => '$rw[\'name\']');
	$list['list_array'][] = array("head"=>lmtc("user:username"), "content" => '$rw[\'username\']');
	$list['list_array'][] = array("head"=>lmtc("user:management_title"), "content" => '$rw[\'management_title\']');
	$list['list_array'][] = array("head"=>__('زمان ثبت‌نام'), "content" => '( $rw[\'date_created\']==0 ? \''.__('نامشخص').'\' : time_inword($rw[\'date_created\']) )');
	$list['list_array'][] = array("head"=>__('وضعیت'), "content" => 'useraccess_mg_list__status($rw)');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array('name','username','tell','management_title');

	#
	# echo result
	echo listmaker_list( $list );
	
	#
	########################################################################################

}





