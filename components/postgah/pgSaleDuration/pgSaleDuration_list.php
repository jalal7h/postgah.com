<?

function pgSaleDuration_list(){
	
	###################################################################################

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `sale_duration` WHERE 1 ORDER BY `prio` ASC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&do=form&id=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['remove_url'] = true; // link dokme hazf
	$list['up_or_down'] = true; // link priority
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array( "head"=>lmtc("sale_duration:name"), "content" => '$rw[\'name\']');
	$list['list_array'][] = array("head"=>lmtc("sale_duration:days"), "content" => '$rw[\'days\']');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("name","days");

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

	########################################################################################

}


