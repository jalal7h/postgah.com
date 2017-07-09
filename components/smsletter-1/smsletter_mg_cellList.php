<?

function smsletter_mg_cellList(){

	###################################################################################
	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `user` WHERE `cell` LIKE '%9%' ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = false;

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['modify_url'] = false; // link icon modify
	$list['addnew_url'] = false; // link icon "new" vaqti ke list khali hast dide mishe
	$list['remove_url'] = false; // link dokme hazf
	$list['up_or_down'] = false; // link priority
	$list['setflag_url'] = false; // link active / inactive
	$list['paging_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&p=%%"';
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array("head"=>lmtc("user:cell"), "content" => '$rw[\'cell\']');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("cell");

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

	echo "<a download class='newsletter-cell-list' href='"._URL."/?do_action=smsletter_mg_cellList_download'>".__("دریافت فایل حاوی شماره‌ها")."</a>";

}

