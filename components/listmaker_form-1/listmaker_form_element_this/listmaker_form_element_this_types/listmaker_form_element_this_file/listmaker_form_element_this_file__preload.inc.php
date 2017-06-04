<?

# jalal7h@gmail.com
# 2017/01/06
# 1.6

function listmaker_form_element_this_file__preload( $info, $pre ){

	$c.= "<div class=\"lmfetfp\" ".( $GLOBALS['listmaker_form-rw'][ $info['name'] ] ? '' : "style='display:".( $pre ? '' : 'none' ).";'" ).">";
	
	#
	# its new form
	if( $pre and $GLOBALS['listmaker_form-rw'] ){
		
		#
		# its edit form, and single file
		if(! $info['ArrayInput'] ){
			$c.= listmaker_form_element_this_file__preload_solo( $info, $pre );

		# its edit form, and multi file
		} else {
			$c.= listmaker_form_element_this_file__preload_multi( $info, $pre );
		}
	
	}

	$c.= "</div>";

	return $c;
}



function listmaker_form_element_this_file__preload_solo( $info, $pre ){

	#
	# file source
	if(! $file_src = $GLOBALS['listmaker_form-rw'][ $info['name'] ] ){
		return "";
	
	#
	# file tumb image
	} else {
		$file_extn = strtolower( substr(strrchr($file_src, "."), 1) );
		if( in_array($file_extn, ['jpg','jpeg','png','gif', 'ico'] ) ){
			$tumb_icon = "<img src=\""._URL."/".( $file_extn!='ico' ? "resize/50x50/" : '').$file_src."\"/>";
		} else {
			$tumb_icon = "<div class='tumb_icon'>".$file_extn."</div>";
		}
	}


	#
	# table : id : column
	$TableIdColumn = $info['formTable'].":".$GLOBALS['listmaker_form-rw']['id'].":".$info['name'];
	$TableIdColumn_md5 = md5($TableIdColumn);
	$_SESSION['lmfetfp-remove-stack'][ $TableIdColumn_md5 ] = $TableIdColumn;


	# 
	# the c
	$c.= $tumb_icon;
	$c.= "<a href=\""._URL."/".$file_src."\" class=\"open\" target=\"_blank\">".__("نمایش")."</a>";
	$c.= "<a href=\"\" rel=\"".$TableIdColumn_md5."\" class=\"remove\">".__("حذف")."</a>";

	return $c;
}



function listmaker_form_element_this_file__preload_multi( $info, $pre ){

	$table = $pre['table'];
	$id = $pre['id'];
	$column = $pre['column'];

	if(! $rw = table( $table, $id ) ){
		e();
	
	} else if(! $file_src = $rw[ $column ] ){
		e();		
	
	} else {
		
		#
		# file tumb image
		$file_extn = strtolower( substr(strrchr($file_src, "."), 1) );
		if( in_array($file_extn, ['jpg','jpeg','png','gif'] ) ){
			$tumb_icon = "<img src=\"".$file_src."\"/>";
		} else {
			$tumb_icon = "<div class='tumb_icon'>".substr($file_extn,0,3)."</div>";
		}

		#
		# variables
		$TableIdColumn = $table.":".$id.":".$column;
		// error_log($TableIdColumn);
		$TableIdColumn_md5 = md5($TableIdColumn);
		$_SESSION['lmfetfp-remove-stack'][ $TableIdColumn_md5 ] = $TableIdColumn;
		$_SESSION['lmfetfp-remove-stack-deleteRow'][ $TableIdColumn_md5 ] = true;
		
		# 
		# the c
		$c.= $tumb_icon;
		$c.= "<a href=\"".$file_src."\" class=\"open\" target=\"_blank\">".__("نمایش")."</a>";
		$c.= "<a href=\"\" rel=\"".$TableIdColumn_md5."\" class=\"remove\">".__("حذف")."</a>";

	}

	return $c;

}











