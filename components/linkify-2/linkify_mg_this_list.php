<?

# jalal7h@gmail.com
# 2016/10/28
# 2.0

function linkify_mg_this_list(){
	
	if(! $cat = intval($_REQUEST['cat']) ){
		ed(__FUNCTION__,__LINE__);

	} else if(! $rw_linkify_config = table( 'linkify_config', $cat ) ){
		ed(__FUNCTION__,__LINE__);
	}

	$parent = intval($_REQUEST['parent']);


	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `linkify` WHERE 1 AND `cat`='$cat' AND `parent`='$parent' ORDER BY `prio` ASC ";
	$list['tdd'] = 10;
	
	#
	# base url is needed in version upper 1.2
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&cat=".$cat.'&do='.$_REQUEST['do'].'&parent='.$parent.'"';

	#
	# target
	if( $rw_linkify_config['haveSub'] == 1 ){
		$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&do=".$_REQUEST['do']."&cat=".$cat.'&parent=".$rw["id"]';
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
	if( $rw_linkify_config['haveIcon'] == 1 ){
		$list['list_array'][] = [ "head"=>lmtc("linkify:pic") , "tag"=>"th", "picture" => '$rw[\'pic\']'];
	}
	$list['list_array'][] = ["head"=>lmtc("linkify:name"), "content" => '$rw[\'name\']'];
	$list['list_array'][] = ["head"=>lmtc("linkify:url"), "content" => '"<a target=\'_blank\' href=\'".$rw[\'url\']."\'>".( strlen($rw[\'url\']) > 23 ? ".. ".substr($rw[\'url\'] , -20 ) : $rw[\'url\'] )."</a>"'];
	if( $rw_linkify_config['haveSub'] == 1 ){
		$list['list_array'][] = ["head"=>'زیرپیوند', "content" => '"<center>".dbr(dbq(" SELECT COUNT(*) FROM `linkify` WHERE `parent`=\'".$rw[\'id\']."\' "),0,0)."</center>"'];
	}

	#
	# search columns
	$list['search'] = [ "name", "url" ];

	#
	# echo result
	echo listmaker_list( $list );

	#
	# new form link
	echo "<a class='submit_button' href='./?page=admin&cp=".$_REQUEST['cp']."&cat=".$cat.'&do='.$_REQUEST['do']."&parent=".$parent."&do1=form'>ثبت پیوند جدید</a>";
}













