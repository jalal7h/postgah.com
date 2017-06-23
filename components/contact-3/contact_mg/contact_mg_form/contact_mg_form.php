<?

# jalal7h@gmail.com
# 2017/01/21
# 1.0

function contact_mg_form(){

	if(! $id = $_REQUEST['id'] ){
		e();

	} else if(! $rw = table('contact',$id) ){
		e();
		
	} else {
		echo template_engine( 'contact_mg_form', [ 'rw' => $rw ] );
	}
	
	return false;

}

