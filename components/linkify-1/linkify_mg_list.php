<?

# jalal7h@gmail.com
# 2016/03/18
# Version 1.2

function linkify_mg_list(){
	
	$parent = intval( $_REQUEST['parent'] );
	$cat = trim(strip_tags($_REQUEST['l']));

	# 
	# the list
	$list['name'] = 'linkify_mg_list';
	$list['query'] = " SELECT * FROM `linkify` WHERE 1 AND `cat`='$cat' AND `parent`='$parent' ORDER BY `prio` ASC ";
	$list['tdd'] = 10;
	
	#
	# base url is needed in version upper 1.2
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&l=".$_REQUEST["l"].($parent?'&parent='.$parent:'').'"';

	#
	# target
	if( $GLOBALS['linkify_items'][ $_REQUEST['l'] ]['haveSub'] ){
		$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&l=".$_REQUEST["l"].'&parent=".$rw["id"]';
	}

	#
	# actions
	$list['modify_url'] = true;
	$list['addnew_url'] = false;
	$list['remove_url'] = true;
	$list['up_or_down'] = true;
	$list['setflag_url'] = true;
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array
	if( $GLOBALS['linkify_items'][ $_REQUEST['l'] ]['haveIcon'] ){
		$list['list_array'][] = array( "head"=>lmtc("linkify:pic") , "tag"=>"th", "picture" => '$rw[\'pic\']');
	}
	$list['list_array'][] = array("head"=>lmtc("linkify:name"), "content" => '$rw[\'name\']');
	$list['list_array'][] = array("head"=>lmtc("linkify:url"), "content" => '$rw[\'url\']');

	#
	# search columns
	$list['search'] = array("name","url");

	#
	# echo result
	echo listmaker_list( $list );

	#
	# new form link
	echo "<a class='submit_button' href='./?page=admin&cp=".$_REQUEST['cp']."&l=".$_REQUEST["l"]."&parent=".$_REQUEST['parent']."&do=form'>ثبت پیوند جدید</a>";
}













