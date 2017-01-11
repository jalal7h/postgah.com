<?php

# jalal7h@gmail.com
# 2017/01/09
# 1.0

add_layer( 'user_login_form_side', 'فرم ورود به محیط کاربری', 'side' );

function user_login_form_side(){
	
	if( user_logged() ){
		jsgo( layout_link(14) );
	}

	?>
	<form autocomplete="off" method="post" action="<?=layout_link(60)?>" class="<?=__FUNCTION__?>" >

		<div class="head" ><?=__('ورود کاربر')?></div>

		<input type="hidden" name="do" value="login_do"/>
		<input type="hidden" name="refer" value="<?=$_SERVER['HTTP_REFERER']?>" />

		<div class="input_w"><input autocomplete="off" type="text" name="username" placeholder="<?=lmtc('user:username')?>" dir="ltr" value="<?=trim(strip_tags($_REQUEST['username']))?>" /></div>
		
		<div class="input_w"><input autocomplete="off" type="password" name="password" placeholder="<?=__("کلمه عبور")?>" dir="ltr" /></div>

		<label class="remmeber_w"><input type="checkbox" name="remember" value="1" /> <?=__('Remember')?></label>

		<div>
			<input type="submit" class="btn btn-default" value="<?=__('ورود')?>" />
			<a class="signup" href="<?=layout_link(58)?>">Sign up now</a>
		</div>

		<div class="forgot_w"><a href="<?=layout_link(63)?>" ><?=__('کلمه عبورام را فراموش کرده ام')?></a></div>

	</form>
	<?

}

