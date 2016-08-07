<?

# jalal7h@gmail.com
# 2016/04/16
# Version 1.3

function listmaker_formfield_file_preuploadedfiles( $field ){

	# 
	# if its new form
	if(! $GLOBALS['listmaker_formtag-rw'] ){
		return "";
	
	#
	# if its not a `file` input
	} else if( $field['type']!='file' ){
		return "";

	} else if(! $field['table_id'] = ($_REQUEST['table_id'] ?$_REQUEST['table_id'] :$_REQUEST['id']) ){
		return "";
	
	} else {

		#
		# what to do
		switch ( $field['preview'] ) {
			case 'off': return "";
			case 'simple': return listmaker_formfield_file_preuploadedfiles__simple( $field );
			case 'expand':
			default: return listmaker_formfield_file_preuploadedfiles__expand( $field );
		}

	}
}



function listmaker_formfield_file_preuploadedfiles__simple( $field ){
	
	$debug = false;
	
	$dir = FILE_UPLOAD_DATA_DIR."/".str_replace(array("[","]"), "", $field['name'])."/".$field['table_id'];
	if($debug)echo __LINE__." - ".$dir."<br>";

	#
	# open box
	$c.= "<div class='listmaker_formfield_file_preuploadedfiles_simple lmfffpufs'>";
	
	#
	# if its defined on `table`
	if( isset($GLOBALS['listmaker_formtag-rw'][ $field['name'] ]) ){
		if($debug)echo __LINE__."<br>";
		
		# 
		# we have value
		if( $file_path = $GLOBALS['listmaker_formtag-rw'][ $field['name'] ] ){
			if($debug)echo __LINE__." - ".$field['name']."<br>";
			
			$_SESSION['listmaker_formfield-validtoremove-table_id_column-'.md5($file_path) ] = $GLOBALS['listmaker_formtag-tableName'].":".$GLOBALS['listmaker_formtag-rw']['id'].":".$field['name'];

			$d = basename($file_path);
			$c.= listmaker_formfield_file_preuploadedfiles__simple_this( $dir, $d );
		
		# its empty
		} else {
			if($debug)echo __LINE__." - ".$field['name']."<br>";
			$c.= "";
		}
	
	#
	# if its a mass file upload
	} else if(! file_exists($dir) ){
		if($debug)echo __LINE__."<br>";
		return "";
	
	} else if(! $dp = opendir($dir) ){
		if($debug)echo __LINE__."<br>";
		return "";
	
	} else {

		while($d = readdir($dp)){
			if(substr($d,0,1)=='.'){
				continue;
			} else {
				if($debug)echo __LINE__."<br>";
				$flag = true;
				$c.= listmaker_formfield_file_preuploadedfiles__simple_this( $dir, $d );
			}
		}
		
		#
		# if already there is no file, return nothing
		if(! $flag ){
			if($debug)echo __LINE__."<br>";
			return "";
		}

	}

	#
	# close box
	$c.= "</div>";

	if($debug)echo __LINE__."<br>";

	return $c;
}

function listmaker_formfield_file_preuploadedfiles__simple_this( $file_dir, $file_name ){

	$file_path = $file_dir."/".$file_name;
	$_SESSION['listmaker_formfield-validtoremove'][] = $file_path;

	$ext = substr(strtolower(strrchr($file_name, ".")),1);

	if(in_array( $ext, array("jpg","jpeg","png","gif"))){
		$c.= "
		<div title='حذف فایل' class='imgc'>
			<a title='نمایش کامل' class='blank' href='".$file_path."' target='_blank'>open</a>
			<a rel='".$file_path."' title='حذف' class='remove' >remove</a>
			<img src='".$file_path."' />
		</div>";
	} else {
		$c.= "
		<div title='حذف فایل' class='imgc notpic'>
			<a title='نمایش کامل' class='blank' href='".$file_path."' target='_blank'>open</a>
			<a rel='".$file_path."' title='حذف' class='remove' >remove</a>
			<div class=text >".strtoupper($ext)."</div>
		</div>";
	}

	return $c;
}


function listmaker_formfield_file_preuploadedfiles__expand( $field ){
	
	$dir = FILE_UPLOAD_DATA_DIR."/".str_replace(array("[","]"), "", $field['name'])."/".$field['table_id'];

	if(! file_exists($dir) ){
		mkdir($dir);
		// echo __LINE__." ".$dir."<br>";

	} else if(! $dp = opendir($dir) ){
		echo __LINE__."<br>";

	} else {
		
		$c.= "<div class='listmaker_formfield_file_preuploadedfiles lmfffpuf'>";
		
		while($d = readdir($dp)){
			
			if( substr($d,0,1)=='.' ){
				continue;
			
			} else {
				
				$file_path = $dir."/".$d;
				$file_name = $d;
				
				$_SESSION['listmaker_formfield-validtoremove-table_id_column-'.md5($file_path) ] = $GLOBALS['listmaker_formtag-tableName'].":".$GLOBALS['listmaker_formtag-rw']['id'].":".$field['name'];
	
				$_SESSION['listmaker_formfield-validtoremove'][] = $file_path;

				$ext = substr(strtolower(strrchr($d, ".")),1);

				if(in_array( $ext, array("jpg","jpeg","png","gif"))){
					$c.= "
					<div>
						<div rel='".$file_path."' title='حذف فایل' class='imgc'>
							<img src='".$file_path."' />
						</div>
						<a target=_blank href='".$file_path."' >".$file_name."</a>
					</div>";
				
				} else {
					$c.= "
					<div>
						<div rel='".$file_path."' title='حذف فایل' class='imgc notpic'>".strtoupper($ext)."</div>
						<a target=_blank href='".$file_path."' >".$file_name."</a>
					</div>";
				}
				
			}
		}

		$c.= "</div>";

	}

	return $c;
}



