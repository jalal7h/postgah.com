<?

# jalal7h@gmail.com
# 2017/06/09
# 1.3

add_layer( 'contact_vw_form', 'فرم تماس با ما' , 'center' );

function contact_vw_form(){

	switch($_REQUEST['do']) {
		case 'send':
			if( contact_vw_send() ) return;
			break;
	}

	if(! $rs = dbq(" SELECT * FROM `setting` WHERE `slug` LIKE 'contact_email_address_%' ORDER BY `slug` ")){
		e();
		
	} else if( dbn($rs) == 0 ){
		e();

	} else while( $rw = dbf($rs) ){
		$vars['email_select_option'].= '<option value="'.$rw['slug'].'">'.str_replace('@','[at]',$rw['text']).'</option>';		
	}
	
	$vars['contact_address'] = nl2br(setting('contact_address'));

	echo template_engine('contact_vw_form', $vars );

}




