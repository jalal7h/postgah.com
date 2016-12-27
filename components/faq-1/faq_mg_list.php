<?

# jalal7h@gmail.com
# 2016/12/27
# 1.1

function faq_mg_list(){
	
	#
	# actions
	switch ($_REQUEST['do']) {
		
		case 'saveNew':
			faq_mg_saveNew();
			break;
		
		case 'saveEdit':
			faq_mg_saveEdit();
			break;

		case 'remove':
			dbrm('faq');
			break;

		case 'prio':
			listmaker_prio('faq');
			break;
	}



	###################################################################################
	# the list
	#
	
	$table = 'faq';
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `$table` WHERE 1 ORDER BY `prio` ASC ";
	$list['tdd'] = 5; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp=faq_mg&func=faq_mg_list"';
	
	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp=faq_mg&func=faq_mg_form&id=".$rw["id"]';

	$list['addnew_url'] = '"./?page=admin&cp=faq_mg&func=faq_mg_form"';
; // [true/false/url] default is false
	$list['remove_url'] = true; // link dokme hazf
	$list['up_or_down'] = true; // link priority
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	$list['remove_prompt'] = '__("آیا مایل به حذف هستید?")';
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = [ "content" => '$rw["name"]' ];
		
	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name","text" ];
	
	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################
	

}







