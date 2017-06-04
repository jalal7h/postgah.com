<?

function pgSaleDuration(){

	switch ($_REQUEST['do']) {
		
		case 'form':
			return pgSaleDuration_form();

		case 'saveNew':
			pgSaleDuration_saveNew();
			break;
		
		case 'saveEdit':
			pgSaleDuration_saveEdit();
			break;

		case 'remove':
			listmaker_remove('sale_duration');
			break;

		case 'flag':
			listmaker_flag('sale_duration');
			break;

		case 'prio':
			listmaker_prio('sale_duration');
			break;
	}

	
	pgSaleDuration_list();

}


