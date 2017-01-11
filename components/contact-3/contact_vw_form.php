<?

# jalal7h@gmail.com
# 2017/01/10
# 1.1

add_layer( 'contact_vw_form', 'فرم تماس با ما' , 'center' );

function contact_vw_form(){
	
	switch($_REQUEST['do']) {
		case 'send':
			return contact_vw_send();
	}

	if(! $rs = dbq(" SELECT * FROM `setting` WHERE `slug` LIKE 'contact_email_address_%' ORDER BY `slug` ")){
		e();
		
	} else if( dbn($rs)==0 ){
		e();

	} else while( $rw = dbf($rs) ){
		$vars['email_select_option'].= '<option value="'.$rw['slug'].'">'.str_replace('@','[at]',$rw['text']).'</option>';		
	}
	
	echo template_engine('contact', $vars);

}




