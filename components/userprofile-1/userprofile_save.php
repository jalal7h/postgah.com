<?

function userprofile_save(){
	
	if(! $uid = user_logged() ){
		$prompt = "error on ".__LINE__;
	
	} else if(! $rw = table("users", $uid)){
		$prompt = "error on ".__LINE__;
	
	} else if(! $name = trim(strip_tags($_REQUEST['name'])) ){
		$prompt = "لطفا نام خود را به درستی وارد کنید!";
	
	} else if(! $username = trim(strip_tags($_REQUEST['username'])) ){
		$prompt = "لطفا آدرس ایمیل خود را به درستی وارد کنید!";
	
	} else {
		
		$tell = trim(strip_tags($_REQUEST['tell']));
		$cell = trim(strip_tags($_REQUEST['cell']));
		$position_region_id = trim(strip_tags($_REQUEST['position_region_id']));

		$address = trim(strip_tags($_REQUEST['address']));
		$im_a = trim(strip_tags($_REQUEST['im_a']));
		$work_at = trim(strip_tags($_REQUEST['work_at']));
		$gender = trim(strip_tags($_REQUEST['gender']));

		if(!dbq(" UPDATE `users` SET 
			`name`='$name',
			`username`='$username',
			`tell`='$tell',
			`cell`='$cell',
			`position_region_id`='$position_region_id',
			`address`='$address',
			`im_a`='$im_a',
			`work_at`='$work_at',
			`gender`='$gender'
			WHERE `id`='$uid' LIMIT 1 ")){
			$prompt = "error on ".__LINE__;
		} else {
			$prompt = "اطلاعات شما با موفقیت بروز شد.";
		}

		$profile_pic = fileupload_upload( array("id"=>$uid, "input"=>"profile_pic") );
		if($profile_pic[0]){
			dbs("users", array("profile_pic"=>$profile_pic[0]) , array("id"=>$uid) );
		}
	}

	echo "<div style='width: 70%; margin: 100px auto 110px auto;' class='convbox'>$prompt</div>";
	
}






