<?

# jalal7h@gmail.com
# 2016/10/09
# 1.0

function position_mg_remove(){

	if(! dbq(" DELETE FROM `position` WHERE `id`='".$_REQUEST['id']."' AND `type`='".$_REQUEST['type']."' LIMIT 1 ") ){
		e( __FUNCTION__, __LINE__ );
	}
	
}

