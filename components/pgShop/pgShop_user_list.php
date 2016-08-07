<?

function pgShop_user_list(){

	if(! $user_id = user_logged() ){
		die();
	}

	switch ($_REQUEST['do1']) {
		
		case 'form':
			return pgShop_user_form();
		
		case 'saveNew':
			pgShop_user_saveNew();
			break;
		
		case 'saveEdit':
			pgShop_user_saveEdit();
			break;
		
		case 'remove':
			pgShop_user_remove();
			break;

		case 'flag':
			listmaker_flag('shop');
			break;
		
	}
	
	###################################################################################
	# the new version 1.2

	# 
	# the list
	$table = "shop";
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `$table` WHERE 1 AND `user_id`='$user_id' ORDER BY `id` DESC ";
	$list['tdd'] = 5; // tedad dar safhe
	
	# 
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'"';

	# 
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do1=form&id=".$rw["id"]';

	# 
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	// $list['addnew_url'] = true; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['setflag_url'] = true; // link active / inactive
	
	# 
	# list array // list e sotun haye list
	$list['list_array'][] = array("head"=>lmtc($table.":logo"), "tag"=>"th", "picture" => '$rw[\'logo\']');
	$list['list_array'][] = array("head"=>lmtc($table.":name"), "content" => '$rw[\'name\']');
	$list['list_array'][] = array("head"=>lmtc($table.":path"), "content" => '$rw[\'path\']');

	# 
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("name","path","desc","address","phone");

	# 
	# paging select
	// $list['paging_select'] = array(
	// 	'cityId' => "<option value=''>استان » شهر</option>".city_options($array=false),
	// 	'maghta' => "<option value=''>مقطع تحصیلی</option>".cat_display('maghta',$is_array=false,$parent=0,$optionPreStr=""),
	// 	'group' => "<option value=''>گروه شغلی</option>".cat_display('group',$is_array=false,$parent=0,$optionPreStr=""),
	// 	'jensiat' => "<option value=''>جنسیت</option>".cat_display('jensiat',$is_array=false,$parent=0,$optionPreStr=""),
		
	// );
	
	// $list['linkTo'][] = [
	// 	'url' => '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=tour_management_list&p=".$_REQUEST["p"]."&do=setHotel&id=".$rw["id"]',
	// 	'icon' => '021',
	// 	'name' => 'بروزرسانی',
	// 	'color' => '#f00',
	// 	'width' => 65,
	// ];

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

}

