<?

$GLOBALS['cmp']['fbcm_mg'] = 'مدیریت نظرات';
$GLOBALS['cmp-icon']['fbcm_mg'] = '27a';

function fbcm_mg(){

	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'flag':
			listmaker_flag('facebookComment');
			break;

		case 'remove':
			fbcm_mg_remove( $_REQUEST['id'] );
			break;
		
	}

	# 
	# the list
	$list['name'] = 'facebookComment';
	$list['query'] = " SELECT * FROM `facebookComment` WHERE `flag`='0' ORDER BY `id` ASC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'"';

	#
	# target // maghsad e click ruye har row
	// $list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&l=".$_REQUEST["l"].'&parent=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['addnew_url'] = false; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['setflag_url'] = true;

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array("content" => 'fbcm_mg_info($rw)');
	$list['list_array'][] = array("content" => '
		str_replace( " ", "&nbsp;", Vaght_2_taghvim(U2Vaght($rw[\'date\'])) )
	');
 
	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("text");

	#
	# echo result
	echo listmaker_list( $list );


}


function fbcm_mg_info( $rw ){

	$profile_name = table("users", $rw['user_id'], "name");
	$profile_link = _URL."/@".$rw['user_id'];

	$item_name = table($rw['table_name'],$rw['table_id'],'name');
	$item_link = _URL."/?page=".$rw['page_id']."&id=".$rw['table_id']."&#comment-".$rw['id'];

	$info = __( '%% درباره %%', ["<a target=_blank href='$profile_link' class='name'>$profile_name</a>","<a target=_blank href='$item_link'>$item_name</a> : "] );
	$info.= $rw['text'];

	return $info;
}


function fbcm_mg_remove( $id ){

	if(! $rs = dbq(" SELECT `id` FROM `facebookComment` WHERE `comment_id`='$id' ") ){
		e(__FUNCTION__, __LINE__, dbe());
	
	} else if(! dbn($rs) ){
		;//

	} else while( $rw = dbf($rs) ){
		fbcm_mg_remove( $rw['id'] );
	}

	dbq(" DELETE FROM `facebookComment` WHERE `id`='$id' LIMIT 1 ");

	return true;
}








