<?

function nl_management_emailList(){

	#
	# action
	switch ($_REQUEST['do']) {
		case 'remove':
			listmaker_remove("newsletter");
			break;
		
		default:
			# code...
			break;
	}


	###################################################################################
	# 
	# the list
	$list['name'] = 'linkify_mg_list';
	$list['query'] = " SELECT * FROM `newsletter` WHERE 1 ";
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
	$list['addnew_url'] = false; // link icon "new" vaghti ke list khali hast dide mishe
	$list['remove_url'] = true; // link dokme hazf
	$list['up_or_down'] = false; // link priority
	$list['setflag_url'] = false; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array("head"=>lmtc("newsletter:email"), "content" => '$rw[\'email\']');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("email");

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

	echo "<a class='newsletter-email-list' href='"._URL."/newsletter-email-list.txt'>دریافت فایل حاوی ایمیلها</a>";

}

