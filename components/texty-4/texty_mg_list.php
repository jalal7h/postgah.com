<?

# jalal7h@gmail.com
# 2016/09/22
# 1.0

function texty_mg_list(){

	#
	# list
	###################################################################################
	# the new version 1.2

	# 
	# the list
	$table = 'texty';
	$list['name'] = __FUNCION__;
	$list['query'] = " SELECT * FROM `$table` WHERE 1 ORDER BY `name` ASC ";
	$list['tdd'] = 5; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&do=form&id=".$rw["id"]';

	$list['addnew_url'] = false; // link icon "new" vaqti ke list khali hast dide mishe
	$list['remove_url'] = false; // link dokme hazf
	$list['up_or_down'] = false; // link priority
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = [ "head"=>lmtc($table.":name"), "title"=>'$rw["slug"]', "content"=>'$rw[\'name\']' ];

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "slug", "name", "prompt", "user_email_subject", "user_email_content", "admin_email_subject", "admin_email_content", "user_sms", "admin_sms" ]; 

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

}


