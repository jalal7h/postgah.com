<?

$GLOBALS['do_action'][] = 'smsletter_mg_cellList_download';

function smsletter_mg_cellList_download(){

	if(! $rs = dbq(" SELECT `cell` FROM `user` WHERE `cell` LIKE '%9%' ORDER BY `cell` ") ){
		e();
		
	} else {
		
		# 
		# header
		header("Content-Type: plain/text"); 
		header("Content-disposition: inline; filename=newsletter-cell-list.txt");
		header("Pragma: no-cache"); 
		header("Expires: 0");
		
		# 
		# loop
		while( $rw = dbf($rs) ){
			if( $rw['cell'] = trim($rw['cell']) ){
				echo $rw['cell'] . "\n";
			}
		}

	}

}








