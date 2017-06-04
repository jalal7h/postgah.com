<?

# jalal7h@gmail.com
# 2016/10/28
# 1.0

$GLOBALS['cmp']['tallfooter_mg'] = 'فوتر';
$GLOBALS['cmp-icon']['tallfooter_mg'] = '0c9';

function tallfooter_mg(){

	#
	# actions
	switch ($_REQUEST['do']) {
		
		case 'remove':
			listmaker_remove('tallfooter');
			break;
		
		case 'flag':
			listmaker_flag('tallfooter');
			break;
		
		case 'prio':
			listmaker_prio('tallfooter');
			break;
		
		case 'form':
			return tallfooter_mg_form();
		
		case 'saveNew':
			tallfooter_mg_saveNew();
			break;
		
		case 'saveEdit':
			tallfooter_mg_saveEdit();
			break;
		
	}
	
	#
	# the list
	tallfooter_mg_list();

}




