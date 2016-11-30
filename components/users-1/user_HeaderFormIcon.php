<?

function user_headerLoginIcon(){
	
	if( $user_id = user_logged() ){
		
		if(! $rw = table("user", $user_id) ){
			e("err - user_headerLoginIcon - ".__LINE__);
			// die();
		}

		$c.= '
		<div class="user_headerLoginIcon">
			<a href="./login" class="box">
		 		<icon></icon>
		 		'.$rw['name'].'
		 		<div class="circle"'.($rw['profile_pic'] 
		 			? ' style="background-image:url(\'resize/50x50/'.$rw['profile_pic'].'\')" '
		 			: '' ).'></div>
		 	</a>
		 	'.( is_component('billing') 
		 		? '<div class="links">
			 		<a href="./?page=14&do=billing_userpanel_payment">'.
			 		__('موجودی شما').' : '.billing_format(billing_userCredit($user_id)).'</a>
			 	</div>'
		 		: '' ).'
		</div>';
		
	} else {
		$c.= '
		<div class="user_headerLoginIcon">
		 	<a href="./login" class="box">
		 		<icon></icon>
		 		'.__('ورود به سایت').'
		 		<div class="circle"></div>
		 	</a>
		 	<div class="links">
		 		<a href="./register">'.__('ثبت نام').'</a>
			 	<a href="./forgot">'.__('فراموشی کلمه عبور').'</a>
		 	</div>
		</div>';
	}

	return $c;

}





