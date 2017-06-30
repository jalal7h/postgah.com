<?

# jalal7h@gmail.com
# 2016/10/28
# 2.0

function linkify_mg_this(){
	
	#
	# actions
	switch ($_REQUEST['do1']) {
		
		case 'form':
			return linkify_mg_this_form();

		case 'saveNew':
			linkify_mg_this_saveNew();
			break;

		case 'saveEdit':
			linkify_mg_this_saveEdit();
			break;

		case 'prio':
			listmaker_prio([ 'linkify', 'same'=>'parent,cat' ]);
			break;

		case 'remove':
			listmaker_remove( 'linkify' );
			break;

		case 'flag':
			listmaker_flag( 'linkify' );
			break;
	}

	# 
	# the list
	linkify_mg_this_list();
	
}









