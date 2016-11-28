<?

# jalal7h@gmail.com
# 2016/11/27
# 1.0

function billing_management_offline_methods(){
	
	#
	# actions
	switch($_REQUEST['do']){
		
		case 'form':
			return billing_management_offline_methods_form();

		case 'saveNew':
			billing_management_offline_methods_saveNew();
			break; 

		case 'saveEdit':
			billing_management_offline_methods_saveEdit();
			break;

		case 'remove':
			billing_management_offline_methods_remove();
			break;
	}

	#
	# list
	billing_management_offline_methods_list();

}







