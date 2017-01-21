<?

# jalal7h@gmail.com
# 2017/01/21
# 1.1

add_component( 'faq_mg', 'سوالات متداول', '059' );

function faq_mg(){

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

		case 'form':
			return faq_mg_form();

		case 'flag':
			listmaker_flag('faq');
			break;

	}

	#
	# list
	faq_mg_list();
	
}

