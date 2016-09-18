<?

$GLOBALS['block_layers']['contact_vw_form'] = 'فرم تماس با ما';

function contact_vw_form(){
	
	switch($_REQUEST['do']) {
		case 'send':
			return contact_vw_send();
	}

	if(! $rs = dbq(" SELECT * FROM `setting` WHERE `slug` LIKE 'contact_email_address_%' ORDER BY `slug` ")){
		e(__FUNCTION__,__LINE__);
		
	} else if( dbn($rs)==0 ){
		e(__FUNCTION__,__LINE__);

	} else while( $rw = dbf($rs) ){
		$vars['email_select_option'].= '<option value="'.$rw['slug'].'">'.str_replace('@','[at]',$rw['text']).'</option>';		
	}
	
	$vars['token'] = token_make();

	echo template_engine('contact', $vars);

}




