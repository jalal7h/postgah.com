<?

// $_SESSION['uid'] = null;

function users_headerLoginIcon(){
	
	if( $uid = user_logged() ){
		
		if(!$rw = table("users", $uid)){
			e("err - users_headerLoginIcon - ".__LINE__);
			// die();
		}

		$c.= '
		<div class="users_headerLoginIcon">
			<a href="./login" class="box">
		 		<icon></icon>
		 		'.$rw['name'].'
		 		<div class="circle"'.($rw['profile_pic'] 
		 			?' style="background-image:url(\'resize/50x50/'.$rw['profile_pic'].'\')" '
		 			:'').'></div>
		 	</a>
		 	'.(is_component('billing') 
		 		?'<div class="links">
			 		<a href="./?page=14&do=billing_userpanel_payment">موجودی شما : '.number_format(billing_userCredit($uid)).' ریال</a>
			 	</div>'
		 		:'').'
		</div>';
		
	} else {
		$c.= '
		<div class="users_headerLoginIcon">
		 	<a href="./login" class="box">
		 		<icon></icon>
		 		ورود به سایت
		 		<div class="circle"></div>
		 	</a>
		 	<div class="links">
		 		<a href="./register">ثبت نام</a>
			 	<a href="./forgot">فراموشی کلمه عبور</a>
		 	</div>
		</div>';
	}

	return $c;
}

