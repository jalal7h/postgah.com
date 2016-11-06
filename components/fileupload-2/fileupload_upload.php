<?

# jalal7h@gmail.com
# 2016/05/17
# Version 3.3

/*
# $list = array(
# 	id : name of the subdirectory. (if not null)
# 	input : name of <input tag. / directory of destination, placed on `data` directory.
# 	numb : number of the input[] to be saved. (empty == save all).
# 	ext : valid file extensions for upload (empty = picture) [ jpeg , png , gif , mp4 ] , if "all" it will not be chekced
# );
# $array_of_file_path = fileupload_upload( array("id"=>"2", "input"=>"pic", "ext"=>['mpg','mov'] ) );

# $f = fileupload_upload([ 'fInpName'=>'file_dir', 'id'=>11, 'ext'=>'wmv,avi,mp4' ]);
# $f = fileupload_upload([ 'fInpName'=>'file_dir', 'ext'=>'*' ]);
# $f = fileupload_upload([ 'fInpName'=>'file_dir' ]);


# $list = array(
# 	id : name of the subdirectory. (if not null)
# 	input : name of <input tag. / directory of destination, placed on `data` directory.
# 	numb : number of the input[] to be saved. (empty == save all).
# 	ext : valid file extensions for upload (empty = picture) [ jpeg , png , gif , mp4 ] , if "all" it will not be chekced
# );
# $array_of_file_path = fileupload_upload( array("id"=>"2", "input"=>"pic") );


# $array_of_file_path = fileupload_upload( array("id"=>"2", "input"=>"pic") );
inja "pic" esm e "<input type=file" hast, va hamchenin esme directory ke baiad file tush save beshe
va in function dare, hameye <input haye type=file ke name="pic[]" hast ro file esh ro mirize tu data/pic/2
va khorujish ke tu $array_of_file_path hast, ye array hast az address e file hai ke upload shode

masalan , 
array(
	[0]=>"data/pic/2/some-name.jpeg",
	[1]=>"data/pic/2/some-name2.jpeg",
);

/*README*/


if(! defined('FILE_UPLOAD_DATA_DIR') ){
	define( 'FILE_UPLOAD_DATA_DIR' , 'data' );
}

function fileupload_upload( $list ){
	
	#
	# config
	$data_dir = FILE_UPLOAD_DATA_DIR;
	#

	if(! $id = $list['id'] ){
		$id = $_REQUEST['id'];
	}
	// echo $id;
	// die();

	#
	# input and input_dest
	if(! $input = $list['input'] ){
		foreach ($list as $k => $r) {
			if(! in_array($k, ['id','input','numb','ext']) ){
				$input = $k;
				$input_dest = $r;
				break;
			}
		}
	}
	if(! $input ){
		e(__FUNCTION__,__LINE__);
		die();
	} else if(! $input_dest ){
		$input_dest = $input;
	}
	#

	#
	# numb
	if(!$numb = $list['numb']){
		$numb = null;
	}
	#

	#
	# ext
	if(! $ext = $list['ext']){
		$ext = ['jpg','jpeg','gif','png'];
	
	} else if( in_array($ext, ["all","*"] ) ){
		$ext = "*";
	
	} else if(! is_array($ext) ){
		$ext = explode(",", $ext);
	}
	#

	#
	# make dir
	if(! file_exists($data_dir) ){
		if(! strstr($data_dir, "/") ){
			mkdir($data_dir);
		} else {
			$data_dir_tmp = explode("/", $data_dir);
			foreach ($data_dir_tmp as $ki0 => $ri0) {
				if(! $ri0 = trim($ri0) ){
					continue;
				}
				$data_dir_tmp_cur.= $ri0."/";
				if(! file_exists($data_dir_tmp_cur) ){
					mkdir($data_dir_tmp_cur);	
				}
			}
		}
	}
	#

	#
	# base dir
	$base_dir = $data_dir."/".$input_dest;
	if(! file_exists($base_dir) ){
		mkdir($base_dir);
	}
	if( $id ){
		$base_dir.= "/$id";
		if(! file_exists($base_dir) ){
			mkdir($base_dir);
		}
	}
	#

	#
	# list of FILES
	$_FILE = $_FILES[$input];
	$count = sizeof($_FILE['name']);
	for($i=0; $i<$count; $i++){
				
		#
		# if we need some specific one to be uploaded
		if($numb){
			if( $numb!=$i ){
				continue;
			}
		}

		#
		# have some error
		if( $_FILE['error'][$i]!=0 ){
			$file_nnme_arr[] = "";
			continue;

		# 
		# file is empty
		} else if( $_FILE['size'][$i]==0 ){
			$file_nnme_arr[] = "";
			continue;
		
		#
		# ready for upload
		} else {
			
			$file_name = $_FILE['name'][$i];
			$file_extn = substr(strtolower(strrchr($file_name, '.')),1);
			
			$file_real_name = $file_name;
			$file_real_name = substr( $file_real_name , 0 , -1*(strlen($file_extn)+1) );
			$file_real_name = mb_ereg_replace('[^A-Za-z0-9\-\_]+','', $file_real_name);
			$file_real_name = substr( $file_real_name, 0, 50 );

			$file_nnme = $base_dir."/";
			$file_nnme.= $i."-";
			$file_nnme.= U()."-";
			if(! $id ){
				$file_nnme.= rand(1000,9999)."-";
			}

			// $file_nnme.= substr( md5($file_name.U()),0,6 ).
			$file_nnme.= $file_real_name;
			$file_nnme.= ".".$file_extn;

			$file_nnme_arr[] = $file_nnme;
			$file_addr = $_FILE['tmp_name'][$i];
			
			if( ($ext!="*") and (!in_array($file_extn, $ext)) ){
				return false;
			
			} else if(! copy($file_addr, $file_nnme) ){
				return false;
			}

		}
	}
	#

	#
	# return result
	return $file_nnme_arr;
	#
}
