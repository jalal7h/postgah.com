<?

# jalal7h@gmail.com
# 2016/07/09
# 1.2

function users_register_do(){
	
	if(!$username = strtolower(trim($_REQUEST['username']))){
		echo "<script>alert('لطفا آدرس ایمیل خود را وارد کنید.'); history.go(-1);</script>";
		die();
	
	} else if(!$password = trim($_REQUEST['password'])){
		echo "<script>alert('لطفا آدرس ایمیل خود را وارد کنید.'); history.go(-1);</script>";
		die();
	
	} else if(!$name = trim($_REQUEST['name'])){
		echo "<script>alert('لطفا آدرس ایمیل خود را وارد کنید.'); history.go(-1);</script>";
		die();
	}

	if( hash_password ){
		$raw_password = $password;
		$password = md5x( $password, 20 );
	}

	$cell = trim($_REQUEST['cell']);

	if( user_logged() ){
		?>
		<script>location.href = '<?=_URL?>/userpanel';</script>
		<?
		die();
	
	} else if(!$rs = dbq(" SELECT COUNT(*) FROM `users` WHERE `username`='$username' LIMIT 1 ")){
		echo "<script>alert('اختلال در پایگاه داده'); history.go(-1);</script>";
	
	} else if(dbr($rs,0,0)=='1'){
		echo "<script>alert('نام کاربری / آدرس ایمیل مورد نظر قبلا ثبت شده است'); history.go(-1);</script>";
	
	} else if(!dbq(" INSERT INTO `users` (`username`,`password`,`name`,`cell`) VALUES ('$username','$password','$name','$cell') ")){
		echo "<script>alert('اختلال در ثبت نام'); history.go(-1);</script>";
	
	} else {

		# 
		# loging in client
		$_SESSION['uid'] = table("users", $username, "id", "username");

		#
		# sending email to client after registration
		if( is_component('texty') ){
			
			$vars['main_title'] = setting('main_title');
			$vars['password'] = $raw_password;

			echo texty( 'users_register_do' , $vars );
			
		}
		
		return true;
	}

	die();
}

