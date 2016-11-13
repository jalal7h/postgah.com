<?

function contact_mg_list(){
	
	switch( $_REQUEST['do'] ){

		case 'remove':
			listmaker_remove('contact');
			break;

		case 'form':
			return contact_mg_form();

		case 'send':
			contact_mg_send();
			break;

	}

	###################################################################################
	# the new version 1.2

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['class'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `contact` WHERE 1 ORDER BY `id` DESC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&do=form&id=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['addnew_url'] = false; // link dokme hazf
	$list['remove_url'] = true; // link dokme hazf
	$list['paging_url'] = true; // not needed when we have 'tdd'
	// $list['modify_url'] = true; 
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array( "head"=>lmtc("contact:name"), "content" => '"<a href=\'mailto:".$rw[\'email\']."\'>".$rw[\'name\']."</a>"');
	$list['list_array'][] = array("head"=>lmtc('contact:date'), "content" => 'time_inword($rw[\'date\'])');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = ["name","subject","content","email","cell"];

	#
	# echo result
	echo listmaker_list( $list );
	
	#
	########################################################################################

}


