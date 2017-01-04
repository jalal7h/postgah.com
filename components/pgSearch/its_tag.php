<?

# jalal7h@gmail.com
# 2017/01/04
# 1.0

add_init( function(){
	
	if( $_REQUEST['its_tag'] != 1 ){
		//

	} else if(! kword_is( pgSearch_q() ) ){
		d404();
	}

});

