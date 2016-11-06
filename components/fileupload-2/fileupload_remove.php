<?

/*
# $dir : directory of destination, placed on `data` directory.
# $id : name of the subdirectory.
# $numb : number of the files to be removed. (empty == remove all).
#
# fileupload_remove("slideshow", "11", "1");



in function baraye pak kardan e ax haye tuye directory "data" hast.

# fileupload_remove("slideshow", "11", "1");
in az address e "data/slideshow/11" ye dune file pak mikone

# fileupload_remove("news", "54" );
in harchi tu "data/news/54" hast ro pak mikone

/*README*/


function fileupload_remove( $dir, $id, $numb=null ){
	
	$dir = "data/$dir/$id";
	
	if(!file_exists($dir)){
		return true;
	
	} else if(!$dp = opendir($dir)){
		echo "err - ".__LINE__;
	
	} else while($d = readdir($dp)){
		
		$file_addr = $dir."/".$d;
		
		if(substr($d,0,1)=="."){
			continue;
		
		} else if(!$numb){
			// remove all
			@unlink($file_addr);
		
		} else {
			if(substr($d,0,strlen($numb)+1)==$numb."-"){
				@unlink($file_addr);
				break;
			}
		}

	}

	return true;

}






