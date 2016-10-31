<?

# jalal7h@gmail.com
# 2016/10/28
# 1.0

function tallfooter_mg_list(){
	
	###################################################################################
	# the new version 1.2

	# 
	# the list
	$table = 'tallfooter';
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `$table` WHERE 1 ORDER BY `prio` ASC, `id` ASC ";
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&do=form&id=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	// $list['modify_url'] = true;
	$list['addnew_url'] = true; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['setflag_url'] = true; // link active / inactive
	$list['up_or_down'] = true; // link priority
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = ["head"=>lmtc($table.":name"), "content" => 'tallfooter_mg_list_theName($rw)'];
	$list['list_array'][] = ["head"=>lmtc($table.":type"), "content" => 'tallfooter_mg_list_theType($rw)'];
	
	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name" ]; 
	
	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

}


function tallfooter_mg_list_theName( $rw ){

	if( $rw['type'] == 'hr' ){
		return '- - - - - - - -';
	
	} else {
		return $rw['name'];
	}

}


function tallfooter_mg_list_theType( $rw ){

	switch ($rw['type']) {
		
		case 'hr':
			return 'جدا کننده';

		case 'html':
			return 'محتوای html';
		
		case 'linkify':
			return 'جعبه پیوند';
		
		case 'social':
			return 'جامعه مجازی';
		
		default:
			return 'نامشخص';
		
	}

}






