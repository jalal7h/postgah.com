<?
$GLOBALS['do_action'][] = 'users_weblogin_do';

function users_weblogin_do(){
	
	$json = $_REQUEST['json'] ;
	$json = urldecode($json);
	$auth = json_decode( $json );
	$json = mysql_real_escape_string( $json );

	// var_dump($auth);die();

	if(! $auth->email ){
		$auth->email = $auth->auth_id;
	}

	$username = strtolower(trim( $auth->email ));
	$password = substr( md5( U().$auth->email ), 4, 16 );
	
	if(! $name = trim($auth->name) ){
		$name = trim($auth->firstname)." ".trim($auth->lastname);
	}

	if($auth->avatar){
		
		$profile_pic = md5($auth->email) . strrchr($auth->avatar, ".");
		$profile_pic = "data/profile_pic/" . $profile_pic;
		
		if(! copy( trim($auth->avatar) , $profile_pic ) ){
			echo "cant copy ".trim($auth->avatar)."\n";
			$profile_pic = "";
		
		} else if( filesize($profile_pic) < 500 ){
			unlink($profile_pic);
			$profile_pic = "";
		
		} else {
			
			$mime = mime_content_type($profile_pic);
			$mime = explode("/", $mime);
			
			if( $mime[0]!='image' ){
				unlink($profile_pic);
				$profile_pic = "";
			
			} else {
				$extn = substr( strrchr($profile_pic, ".") , 1 );
				$profile_pic_nnme = substr( $profile_pic, 0, -1*strlen($extn) );
				$profile_pic_nnme.= $mime[1];
				rename( $profile_pic , $profile_pic_nnme );
				$profile_pic = $profile_pic_nnme;
			}
		}
	}

	$gender = trim($auth->gender);

	#
	# register
	if(! table("users", $username, null, "username") ){
				
		if(! dbq(" INSERT INTO `users` (`username`,`password`,`name`,`profile_pic`,`gender`, `auth`) VALUES ('$username','$password','$name','$profile_pic','$gender', '$json' ) ") ){
			e( __FUNCTION__, __LINE__, dbe() );
			var_dump($auth);
			die();
		
		} else {

			#
			# sending email to client after registration
			if( is_component('texty') ){

				$vars = array(
					"main_title"=>tab__temp("main_title"),
					"user_name"=>$name,
					"username"=>$username,
					"password"=>$password,
					"_URL"=>_URL,
				);

				echo texty( "users_register_do" , $vars, $username );

			}
			
			#
			# congragulating cient
			// echo template_engine("users_register_do");
		}

	#
	# login
	} else {
		if(! dbq(" UPDATE `users` SET `auth`='$json',`profile_pic`='$profile_pic' WHERE `username`='$username' LIMIT 1 ") ){
			e(__FUNCTION__ .":". __LINE__ );
		}
		
	}
	
	#
	# login
	$_SESSION['uid'] = table("users", $username, "id", "username");
	
	#
	# redirect
	echo "<script>location.href='"._URL."/userpanel';</script>";
	die();

}


