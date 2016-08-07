<?

# jalal7h@gmail.com
# 2016/06/14
# Version 1.2

$GLOBALS['do_action'][] = 'catcustomfield_mg';

function catcustomfield_mg(){

	f_admin__a_html__header();
	echo "<div class='".__FUNCTION__."'>";
	
	if(! $cat_id = intval($_REQUEST['cat_id']) ){
		e(__FUNCTION__,__LINE__);
		return false;
	} else if(! $rw = table("cat", $cat_id) ){
		e(__FUNCTION__,__LINE__);
		return false;
	}

	switch ($_REQUEST['do']) {
		
		case 'form':
			return catcustomfield_mg_form();
		
		case 'saveNew':
			catcustomfield_mg_saveNew();
			break;
		
		case 'saveEdit':
			catcustomfield_mg_saveEdit();
			break;

		case 'remove':
			listmaker_remove('catcustomfield');
			break;

		case 'prio':
			listmaker_prio(['catcustomfield','up_or_down'=>$_REQUEST['up_or_down'],'same'=>'cat_id' ]);
			break;

		case 'flag':
			listmaker_flag('catcustomfield');
			break;
		
	}

	echo "<div class='head'>خصیصه‌های ".$rw['name']."</div>";

	###################################################################################
	# the new version 1.2

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `catcustomfield` WHERE `cat_id`='$cat_id' ORDER BY `prio` ASC ";
	// $list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?do_action='.$_REQUEST['do_action'].'&cat_id='.$cat_id.'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?do_action='.$_REQUEST['do_action'].'&cat_id='.$cat_id.'&do=form&id=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	// $list['modify_url'] = true; // link icon modify
	$list['remove_url'] = true; // link dokme hazf
	$list['up_or_down'] = true; // link priority
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = false; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array("head"=>lmtc("catcustomfield:name"), "content" => '$rw[\'name\']');
	$list['list_array'][] = array("head"=>lmtc("catcustomfield:type"), "content" => '$GLOBALS[\'catcustomfield-select-options\'][$rw[\'type\']]');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("name");

	#
	# echo result
	echo listmaker_list( $list );
	
	#
	########################################################################################



	echo "</div>";
	f_admin__a_html__footer();
}