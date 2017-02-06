<?php

# jalal7h@gmail.com
# 2017/01/20
# 1.1

add_action('catcustomfield_mg_add');

function catcustomfield_mg_add(){
	
	if(! admin_logged() ){
		ed();

	} else if(! $cat_id = $_REQUEST['cat_id'] ) {
		ed();
		
	} else if(! $type = $_REQUEST['type'] ) {
		ed();
		
	} else {

		$name = $GLOBALS['catcustomfield-select-options'][ $type ];
		$name = __( "%% جدید", [ $name ] );

		if( $rw = table( 'catcustomfield', ['cat_id'=>$cat_id], ['prio'=>'desc'], 1 ) ){
			$prio = $rw['prio'] + 1;
		} else {
			$prio = 1;
		}

		if(! $id = dbs('catcustomfield', [ 'cat_id', 'type', 'name'=>$name, 'prio'=>$prio, 'display_as_filter'=>0, 'grid'=>12, 'flag'=>1 ]) ){
			ed();

		} else {
			$rw = table( 'catcustomfield', $id );
			catcustomfield_mg_list_this( $rw );
		}

	}

}

