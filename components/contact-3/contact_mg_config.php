<?

function contact_mg_config(){
	
	switch ($_REQUEST['do']) {
		
		case 'saveNew':
			contact_mg_config_save();
			break;

	}

	echo lmfo([
		'table'	  => 'setting' ,
		'action'  => './?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'],
		'name'	  => __FUNCTION__ ,
		'class'	  => __FUNCTION__ ,
		'switch'  => 'do',
	]);

	if(! $rs = dbq(" SELECT * FROM `setting` WHERE `slug` LIKE 'contact_email_address_%' ORDER BY `slug` ") ){
		e();

	} else if(! dbn($rs) ){
		;//

	} else while( $rw = dbf($rs) ){
		$lmfe_arr[] = [__('آدرس ایمیل'),'email:contact_email_address[]'=>$rw['text']];
	}
	$old_email_address = lmfe( $lmfe_arr );

	echo lmfe([
		
		'<div>',	
			[ setting_rw('contact_tell')['name'],'text:contact_tell'=>setting('contact_tell'),'inDiv'],
			[setting_rw('contact_cell')['name'],'text:contact_cell'=>setting('contact_cell'),'inDiv'],
			[setting_rw('contact_fax')['name'],'text:contact_fax'=>setting('contact_fax'),'inDiv'],
			[setting_rw('contact_address')['name'],'textarea:contact_address'=>setting('contact_address'),'inDiv'],
		'</div>',

		'<div>',
		$old_email_address,
		[__('آدرس ایمیل'),'email:contact_email_address+'],
		'</div>',

		"<hr>",

		['submit:'.__('ثبت'),'inDiv'],

	]);

	echo lmfc();

}


