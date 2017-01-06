<?

# jalal7h@gmail.com
# 2017/01/06
# 2.1

function linkify_mg_this_list(){
	
	if(! $cat = intval($_REQUEST['cat']) ){
		ed();

	} else if(! $rw_linkify_config = table( 'linkify_config', $cat ) ){
		ed();
	}

	$parent = intval($_REQUEST['parent']);


	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `linkify` WHERE 1 AND `cat`='$cat' AND `parent`='$parent' ORDER BY `prio` ASC ";
	$list['tdd'] = 10;
	
	#
	# base url is needed in version upper 1.2
	$list['base_url'] = '_URL."/?page=admin&cp='.$_REQUEST['cp']."&cat=".$cat.'&do='.$_REQUEST['do'].'&parent='.$parent.'"';

	#
	# target
	if( $rw_linkify_config['haveSub'] == 1 ){
		// $list['target_url'] = '_URL."/?page=admin&cp='.$_REQUEST['cp']."&do=".$_REQUEST['do']."&cat=".$cat.'&parent=".$rw["id"]';
		$list['target_url'] = '_URL."/admin/linkify/view/'.$cat.'/".$rw["id"]';
	}

	#
	# actions
	$list['modify_url'] = true;
	$list['addnew_url'] = true;
	$list['addnew_prompt'] = __("ثبت پیوند جدید");
	$list['remove_url'] = true;
	$list['up_or_down'] = true;
	$list['setflag_url'] = true;
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array
	if( $rw_linkify_config['haveIcon'] == 1 ){
		$list['list_array'][] = [ "head"=>lmtc("linkify:pic") , "tag"=>"th", "picture" => '$rw[\'pic\']'];
	}
	$list['list_array'][] = ["head"=>lmtc("linkify:name"), "content" => '$rw["name"]'];
	$list['list_array'][] = ["head"=>lmtc("linkify:url"), "content" => 'linkify_mg_this_list_url($rw)'];
	if( $rw_linkify_config['haveSub'] == 1 ){
		$list['list_array'][] = ["head"=>__('زیرپیوند'), "content" => '"<center>".dbr(dbq(" SELECT COUNT(*) FROM `linkify` WHERE `parent`=\'".$rw[\'id\']."\' "),0,0)."</center>"'];
	}

	#
	# search columns
	$list['search'] = [ "name", "url" ];

	#
	# echo result
	echo listmaker_list( $list );

}



function linkify_mg_this_list_url( $rw ){

	$the_url = $rw["url"];
	$the_url = linkify_URL_remove( $the_url );
	
	$the_title = str_replace( 'http://', '', $the_url );
	if( strlen($the_title) > 22 ){
		$the_title = substr( $the_title , 0, 10 )."..".substr( $the_title , -10 );
	}

	$c = "<a class=\"url\" target=\"_blank\" href=\"".$the_url."\">".$the_title."</a>";

	return $c;

}









