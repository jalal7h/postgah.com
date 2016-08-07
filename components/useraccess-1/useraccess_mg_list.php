<?

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
			listmaker_flag( 'users', null, null, 'flag_admin' );
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
	$list['query'] = " SELECT * FROM `users` WHERE `permission`='2' AND `id`!='1' ORDER BY `id` DESC ";
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
	// $list['addnew_url'] = true; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# flag_admin
	$list['tr_color_identifier'] = '$rw["flag_admin"]';

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array("head"=>lmtc("users:name"), "content" => '$rw[\'name\']');
	$list['list_array'][] = array("head"=>lmtc("users:username"), "content" => '$rw[\'username\']');
	$list['list_array'][] = array("head"=>lmtc("users:management_title"), "content" => '$rw[\'management_title\']');
	$list['list_array'][] = array("head"=>lmtc("users:register_date"), "content" => 'Vaght_2_taghvim( U2Vaght($rw[\'register_date\']) )');
	$list['list_array'][] = array("head"=>'وضعیت', "content" => 'useraccess_mg_list__status($rw)');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array('name','username','tell','management_title');

	#
	# paging select
	// $list['paging_select'] = array(
	// 	'cityId' => "<option value=''>استان » شهر</option>".city_options($array=false),
	// 	'maghta' => "<option value=''>مقطع تحصیلی</option>".cat_display('maghta',$is_array=false,$parent=0,$optionPreStr=""),
	// 	'group' => "<option value=''>گروه شغلی</option>".cat_display('group',$is_array=false,$parent=0,$optionPreStr=""),
	// 	'jensiat' => "<option value=''>جنسیت</option>".cat_display('jensiat',$is_array=false,$parent=0,$optionPreStr=""),
		
	// );

	#
	# echo result
	echo listmaker_list( $list );
	
	#
	########################################################################################

}





