<?

# jalal7h@gmail.com
# 2017/05/22
# 1.1

add_component( 'fbcomment_mg', 'نظرات', '27a' );

function fbcomment_mg(){
	
	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'flag':
			listmaker_flag( 'fbcomment' );
			echo "00";
			break;

		case 'remove':
			fbcomment_remove( $_REQUEST['id'] );
			break;
		
	}

	# 
	# the list
	# --------------------------------------------
	if(! $rs = dbq(" SELECT DISTINCT `table_name` FROM `fbcomment` WHERE 1 ") ){
		e();
	} else while( $rw = dbf($rs) ){
		$table_name = $rw['table_name'];
		$comment_tables[ $table_name ] = lmtc( $table_name )[1];
	}
	echo listmaker_list([
		'head' => __('لیست %%', [ lmtc('fbcomment')[1] ] ),
		'table' => 'fbcomment',
		'where' => ( $_REQUEST['table_name'] and is_table($_REQUEST['table_name']) ) ? [ 'table_name'=>$_REQUEST['table_name'] ] : [] ,
		'order' => [ 'flag'=>'asc', 'id'=>'desc' ],
		'limit' => 10,
		'url' => [
			'base' => '_URL."/?page=admin&cp=".$_REQUEST["cp"]', // *
			'remove' => true, 'flag' => true,
		],
		'filter' => ( sizeof($comment_tables) > 0 ? [ 'table_name' => [ '.. '.__('بخش').' ..', $comment_tables ] ] : [] ) ,
		'item' => [ [ 'fbcomment_mg_info($rw)' ], [ 'time_inword($rw["date_created"])' ] ],
		'search' => [ 'text' ],
	]);
	# --------------------------------------------

}











