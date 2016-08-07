<?

/*

	listmaker_fileupload( 'litesponsor', $id );
	
	hameye field haye `<input type="file"` ro shenasai mikone,
	age taki bashan, tu hamun table ke moarefi mishe mirize, tu sotuni hamnam ba esme `input`
	age az nou`e array bashan (dokme + dashte bashan va chandtai bashan) tu ye table digei be esme `table`_`input` mirize, masalan age esme `input` bahse `image`, va esme table bashe `litesponsor`, hameye `image` ha ro mirize tu table `litesponsor_image`, va `id` az `table` mirize tu column e `litesponsor_id`, va address e file i ke upload mishe ro mirize tu ye column be esme `input`, ke inja mishe `image`

	dar majmu, in function ro call konim, hamin kafie baraye kolle saveNew, va saveEdit, va dge niaz nis kari konim.

	in function ro tu saveNew va saveEdit call mikonim, esme table va `id` ro behesh midim.
	
	paramter e sevom, extension haye mojaz hast, ke pishfarzesh extension e ax ha hast.
	age * bedim, hamechio ghabul mikone, 
	masalan: "zip,rar,tar.gz" ya "*" , ya "wmv,flv,avi" 

*/


function listmaker_fileupload( $table , $id , $ext_array=null ){

	#
	# no file to upload
	if(! sizeof($_FILES) ){
		;//
	
	#
	# some input[] found
	} else foreach ($_FILES as $column => $r) {
		
		#
		# its a single input
		if( $_REQUEST['ArrayInput_'.$column]!=1 ){
			listmaker_fileupload_solo( $table, $column, $id, $ext_array );

		#
		# its an ArrayInput
		} else {
			listmaker_fileupload_multi( $table, $column, $id, $ext_array );
		}
	}

}


function listmaker_fileupload_solo( $table, $column, $id, $ext_array ){

	#
	# its not defined in `table`
	if(! is_column( $table, $column ) ){
		;//

	# its defined on table, its single, and we should update the table
	} else {
		$f = fileupload_upload([ $column=>$table."_".$column, "id"=>$id, 'ext'=>$ext_array ]);
		if( $f[0] ){
			dbs( $table, [ $column=>$f[0] ], [ "id"=>$id ] );
		}
	}
}


function listmaker_fileupload_multi( $table, $column, $id, $ext_array ){
	
	#
	# variables
	$fg_tableName = $table."_".$column;
	$fg_foregnIdColumn = $table."_id";
	
	#
	# upload
	$f = fileupload_upload([ $column=>$table.'_'.$column, 'id'=>$id, 'ext'=>$ext_array ]);
	
	# 
	# store in db
	if(! sizeof($f) ){
		;//
	} else foreach ( $f as $i => $filepath ) {
		
		$rw_in_tbl = $_REQUEST[ $column.'_in_table' ][ $i ];

		#
		# not uploaded
		if(! $f[$i] ){
			continue;
		
		#
		# new
		} else if(! $rw_in_tbl ){
			if(! dbq(" INSERT INTO `$fg_tableName` (`$fg_foregnIdColumn`,`$column`) VALUES ('$id', '".$f[$i]."') ") ){
				e(__FUNCTION__,__LINE__);
			}

		#
		# replace
		} else {

			#
			# its removed, we need to insert
			if(! $rs_crit = dbq(" SELECT COUNT(*) FROM `$fg_tableName` WHERE `id`='$rw_in_tbl' LIMIT 1 ") ){
				e(__FUNCTION__,__LINE__);
			} else if(! dbn($rs_crit) ){
				if(! dbq(" INSERT INTO `$fg_tableName` (`id`,`$fg_foregnIdColumn`,`$column`) VALUES ('$rw_in_tbl', '$id', '".$f[$i]."') ") ){
					e(__FUNCTION__,__LINE__);
				}

			#
			# we just need to update
			} else {
				dbs( $fg_tableName, [$column=>$f[$i]], ['id'=>$rw_in_tbl] );
			}

		}
	}

}









