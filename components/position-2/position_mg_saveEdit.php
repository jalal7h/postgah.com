<?

# jalal7h@gmail.com
# 2016/10/09
# 1.0

function position_mg_saveEdit(){
	
	if(! $name = $_REQUEST['name'] ){
		dg();
		
	} else if(! dbs('position', ['name','parent'] , ['id'] ) ){
		dg();
		
	} else {
		//
	}
	
}

