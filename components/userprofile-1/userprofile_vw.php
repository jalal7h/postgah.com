<?
$GLOBALS['block_layers']['userprofile_vw'] = 'پروفایل کاربر';

# jalal7h@gmail.com
# 2016/05/17
# Version 1.1

function userprofile_vw(){
	
	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $rw = table("users", $id)){
		echo "<script> location.href='"._URL."/404.php';</script>";
		die();

	} else {
		if( file_exists($rw['profile_pic']) ){
			$size = getimagesize( $rw['profile_pic'] );
			$rw['profile_pic_width'] = $size[0];
			$rw['profile_pic_height'] = $size[1];
		} else {
			
			$rw['profile_pic_hide_style'] = '
			<style>
			.userprofile_vw .avatar {
				display: none;
			}
			.userprofile_vw .detail {
				width: 100%;
				border-left: 0px
			}
			</style>';



		}
		echo template_engine( 'userprofile_vw', $rw );
	}
}

