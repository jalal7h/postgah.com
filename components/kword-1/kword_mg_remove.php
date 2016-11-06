<?

# jalal7h@gmail.com
# 2016/05/13
# Version 1.0

function kword_mg_remove(){
	
	if( is_table('kwordbanned') ){
		
		if(! $id = $_REQUEST['id'] ){
			e(__FUNCTION__,__LINE__);

		} else if(! $rw = table('kword', $id) ){
			// e(__FUNCTION__,__LINE__);

		} else if(! $rw['kword'] = trim($rw['kword']) ) {
			;//

		} else {
			dbq(" INSERT INTO `kwordbanned` (`kword`) VALUES ('".$rw['kword']."') ");
		}

	}

	listmaker_remove('kword');

}






