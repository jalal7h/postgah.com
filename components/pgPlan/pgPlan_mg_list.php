<?

function pgPlan_mg_list(){

	#
	# action
	switch($_REQUEST['do']){
		
		case 'saveNew' : 
			pgPlan_mg_saveNew();
			break;
		
		case 'saveEdit' : 
			pgPlan_mg_saveEdit();
			break;
		
		case 'prio' :
			listmaker_prio([ 
				'plan' , 
				'up_or_down'=>$_REQUEST['up_or_down'], 
				'same'=>( $_REQUEST['cat_id'] ? 'cat_id' : "" )
			]);
			break;

		case 'remove' : 
			listmaker_remove('plan');
			break;

		case 'flag' : 
			listmaker_flag('plan');
			break;
	}
	
	###################################################################################
	# the new version 1.2

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `plan` WHERE 1 ORDER BY `prio` ASC , `id` DESC ";
	$list['tdd'] = 5; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';
	
	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func=pgPlan_mg_form&id=".$rw["id"]';
	
	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['modify_url'] = false; // link icon modify
	$list['addnew_url'] = false; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['up_or_down'] = true; // link priority
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	$list['tr_color_identifier'] = '$rw["flag"]';

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array( "head"=>lmtc("plan:pic") , "tag"=>"th", "picture" => '$rw[\'icon\']');
	$list['list_array'][] = array("head"=>lmtc("plan:name"), "content" => '$rw["name"]');
	$list['list_array'][] = array("head"=>lmtc("plan:cat_id"), "content" => 'cat_translate($rw[\'cat_id\'])');
	$list['list_array'][] = array("head"=>lmtc("plan:position_id"), "content" => 'position_translate($rw[\'position_id\'])');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array('name','name_on_form','sample_page');

	#
	# paging select
	$list['paging_select'] = array(
		'cat_id' => "<option value=''>.. گروه ..</option>".cat_display('adsCat',$is_array=false,$parent=0,$optionPreStr=""),
		
	);



	#
	# echo result
	echo listmaker_list( $list );

	#
	########################################################################################

}


