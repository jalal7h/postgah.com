<?

# jalal7h@gmail.com
# 2016/05/17
# Version 1.1

/*

check mikne ke in address vojud dare ya na 
wildcard ham mifahme
yani tahesh * bezani
masalan ye file darim : 
data/images/umbrella.jpeg

bad tu function mizani

if( fileupload_ifexists( "data/images/um*" ) ){
	echo "true";
} else {
	echo "false";
}

in true bar migardune
/*README*/


function fileupload_ifexists($path){
	
	// return true;
	$path = "data/".$path;
	if(strstr($path,"*")){
		$path_arr = explode("*",$path);
		$dir = dirname($path_arr[0])."/";
		$file = str_replace($dir, "", $path);
		$file_arr = explode("*",$file);
		if(!$dp = opendir($dir)){
			echo "err - ".__LINE__;
		} else while($d = readdir($dp)){
			if(substr($d,0,strlen($file_arr[0]))!=$file_arr[0]){
				continue;
			// } else if(substr($d,-1*strlen($file_arr[1]))!=$file_arr[1]){
				// continue;
			} else {
				return $dir.$d;
			}
		}
	} else if(@file_exists($path)){
		return true;
	} else {
		return false;
	}
}
