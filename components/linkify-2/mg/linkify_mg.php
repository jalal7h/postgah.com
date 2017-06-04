<?

# jalal7h@gmail.com
# 2017/01/06
# 1.1

$GLOBALS['cmp']['linkify_mg'] = 'جعبه های پیوند';
$GLOBALS['cmp-icon']['linkify_mg'] = '14c';

function linkify_mg(){

	switch ($_REQUEST['do']) {
		
		case 'form':
			return linkify_mg_form();

		case 'saveNew':
			linkify_mg_saveNew();
			break;

		case 'saveEdit':
			linkify_mg_saveEdit();
			break;

		case 'flag':
			if( table('linkify_config', $_REQUEST['id'])['pinned'] != 1 ){
				listmaker_flag('linkify_config');
			} else {
				echo convbox( __("غیرفعالسازی این جعبه پیوند ممکن نیست") );
			}
			break;

		case 'remove':
			if( table('linkify_config', $_REQUEST['id'])['pinned'] != 1 ){
				listmaker_remove('linkify_config');
			} else {
				echo convbox( __("حذف این جعبه پیوند ممکن نیست") );
			}
			break;

		case 'view':
			return linkify_mg_this();
		
	}

	

	###################################################################################
	# the new version 1.2

	# 
	# the list
	$table = 'linkify_config';
	$list['head'] = 'Linkboxes';
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `$table` WHERE 1 ORDER BY `id` DESC ";
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '_URL."/?page=admin&cp='.$_REQUEST['cp'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '_URL."/admin/linkify/view/".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['modify_url'] = '_URL."/admin/linkify/edit/".$rw["id"]';
	$list['addnew_url'] = '_URL."/admin/linkify/new"';
	$list['remove_url'] = true; // link dokme hazf
	$list['setflag_url'] = true; // link active / inactive
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = ["head"=>lmtc($table.":name"), "content" => '$rw["name"]'];
	$list['list_array'][] = ["head"=>__('تعداد پیوند'), "content" => 'dbqc( "linkify" , [ "cat"=>$rw["id"] ] )'];
	
	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name" ]; 
	
	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

}


