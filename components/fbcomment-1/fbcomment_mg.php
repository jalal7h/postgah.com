<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

$GLOBALS['cmp']['fbcomment_mg'] = 'مدیریت نظرات';
$GLOBALS['cmp-icon']['fbcomment_mg'] = '27a';

function fbcomment_mg(){
	
	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'flag':
			listmaker_flag('fbcomment');
			break;

		case 'remove':
			fbcomment_remove( $_REQUEST['id'] );
			break;
		
	}

	# 
	# the list
	$list['name'] = 'fbcomment';
	$list['query'] = " SELECT * FROM `fbcomment` WHERE `flag`='0' ORDER BY `id` ASC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'"';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['addnew_url'] = false; // link icon "new" vaqti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['setflag_url'] = true;

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array("content" => 'fbcomment_mg_info($rw)');
	$list['list_array'][] = array("content" => 'time_inword($rw["date_created"])');
 
	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("text");

	#
	# echo result
	echo listmaker_list( $list );

}











