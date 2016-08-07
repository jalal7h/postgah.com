<?

# jalal7h@gmail.com
# 2016/07/30
# 1.0

$GLOBALS['do_action'][] = 'pgItem_mg_reject';

function pgItem_mg_reject(){
	
	if(! $item_id = $_REQUEST['item_id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	} else if( $rw_item['flag']!=0 ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbs('item', ['flag'=>'1'], ['id'=>$item_id]) ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbs('item_reject', ['item_id'=>$item_id, 'text']) ){
		e(__FUNCTION__,__LINE__);

	} else {
		return true;
	}

}

