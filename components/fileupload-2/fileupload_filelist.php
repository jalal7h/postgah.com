<?

/*

// list of files in /path/to/files


$list = fileupload_filelist( "data/images" );
print_r( $list );

// list e file haye dakhele data/images ro tu array mide.

/*README*/


function fileupload_filelist($path){
	if(!$dp = @opendir($path)){
		// echo "err - ".__LINE__;
	} else while($d = @readdir($dp)){
		if(substr($d, 0, 1)=='.'){
			continue;
		} else {
			$list[] = $path."/".$d;
		}
	}
	
	if(sizeof($list)){
		return $list;
	} else {
		return false;
	}
}



