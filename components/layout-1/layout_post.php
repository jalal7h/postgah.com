<?
$GLOBALS['block_layers']['layout_post'] = 'پست دلخواه';

function layout_post( $table_name, $page_id ){
	
	switch($table_name){
		
		case 'page_layer' :
			$query = " select * from `page_layer` where `id`='$page_id' limit 1 ";
			break;
		
		case 'page_frame' :
			$query = " select * from `page_frame` where `id`='$page_id' limit 1 ";
			break;
	}
	
	if(! $rs = dbq($query) ){
		e(__FUNCTION__,__LINE__,dbe());
	
	} else if(! $rw = dbf($rs) ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		$allow_eval = false;
		
		switch(strtoupper($rw['type'])){
		
			case 'HTML' :
				//if($rw['framed']){
					//$rw['data']= "<div style=padding:10px >".$rw['data']."</div>";
				//}
				break;
				
			case 'PHP5' : 
				$allow_eval=true;
				break;
			
			case 'TEXT' :
			DEFAULT : 
				$rw['data']=htmlspecialchars($rw['data']);
				$rw['data']=nl2br($rw['data']);
				break;
				
		}

		if(strtoupper($rw['type'])!='PHP5'){
			$rw['data'] = "<div class='layout-html-content'>".$rw['data']."</div>";
		}

		return layout_post_box( $rw['name'], $rw['data'], $allow_eval, $rw['framed'], $rw['position'] );
	}

	return false;
}

function post( $table_name, $page_id ){
	return layout_post( $table_name, $page_id );
}

