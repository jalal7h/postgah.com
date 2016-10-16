<?

# jalal7h@gmail.com
# 2016/10/09
# 1.0

function position_mg_saveNew(){

	if(! $type = $_REQUEST['type'] ){
		dg();

	} else if(! $name = $_REQUEST['name'] ){
		dg();
		
	} else if(! dbs( 'position', [ 'name', 'parent', 'type' ] ) ){
		dg();
		
	} else {
		//
	}
	
}

