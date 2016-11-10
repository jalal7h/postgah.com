<?

# jalal7h@gmail.com
# 2016/11/10
# 2.1

function cat_mg_prio_move( $id , $operation ){
	
	if(! $rw = table("cat", $id) ){
		e();
	
	} else {
		
		$cat = $rw['cat'];
		$parent = $rw['parent'];
		cat_prio_fix( $cat, $parent );
		
		if( $operation=="+" ){
			$new_prio = $rw['prio'] + 1;
		
		} else {
			$new_prio = $rw['prio'] - 1;
		}

		$replacement_prio = $rw['prio'];
		
		#
		# check if its on edge
		if(! $rs0 = dbq(" SELECT COUNT(*) FROM `cat` WHERE `cat`='".$cat."' AND `parent`='$parent' AND `prio`='".$new_prio."' LIMIT 1 ") ){
			e(dbe());
		
		} else if( dbr($rs0,0,0) == 0 ){
			// its on edge
			return true;
		
		} else {

			#
			# havu
			dbs( 'cat', ['prio'=>$replacement_prio], ['cat'=>$cat,'parent'=>$parent,'prio'=>$new_prio] );
			
			#
			# the guy
			dbs( 'cat', ['prio'=>$new_prio], ['cat'=>$cat,'parent'=>$parent,'id'=>$id] );

		}
	}
}

function cat_prio_fix( $cat, $parent=0 ){
	
	if(! $rs = dbq(" SELECT * FROM `cat` WHERE `cat`='$cat' AND `parent`='$parent' ORDER BY `prio` ")){
		e(dbe());
	
	} else {

		$prio = 1;

		while( $rw = dbf($rs) ){
			dbs( 'cat', [ 'prio'=>$prio ], [ 'id'=>$rw['id'] ] );
			$prio++;
		}

	}
}






