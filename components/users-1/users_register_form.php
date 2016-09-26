<?

# jalal7h@gmail.com
# 2016/09/26
# 1.1

$GLOBALS['block_layers']['users_register_form'] = 'فرم ثبت نام';
$GLOBALS['do_action'][] = 'users_register_form';

function users_register_form(){
	
	if( user_logged() ){
		?>
		<script type="text/javascript">
			location.href = '<?=_URL?>/userpanel';
		</script>
		<?
		die();
		
	} else if( is_component('user_emailverifybeforesignup') and !user_emailverifybeforesignup_check() ){
		return user_emailverifybeforesignup();

	} else {

		# -------------------------------------------------
		echo listmaker_form('
			
			[!
				"table" => "users@" ,
				"action" => "./register_do",
				"name" => "'.__FUNCTION__.'" ,
				"class" => "'.__FUNCTION__.($_REQUEST['popup'] ?" popup" :'').'" ,
				"target" => "_top" ,
			!]

				<?=token_make()?>
				
				'.( is_component('user_emailverifybeforesignup') ? user_emailverifybeforesignup_formHiddenInput() : '' ).'

				<div class="container">
					<div class="d02">ثبت نام</div>
					<div class="d05">اگر قبلآ ثبت نام کرده اید <a target="_top" href="./login">وارد شوید</a></div>
					
					[!"name:name*"!]
					[!"number:cell"!]

					'.( is_component('user_emailverifybeforesignup')
						? user_emailverifybeforesignup_formEmailInputTag()
						: '[!"email:username*"!]' ).'

					[!"password:password*"!]

					<div class="d04">شما با کلیک کردن روی دکمه ثبت نام موافقت می کنید که تمامی <a target="_top" href="<?=_URL?>/terms">قوانین سایت</a> پذیرفته اید.</div>
					
					[!"submit:ثبت نام.bgSameAsBG"!]
	
				</div>
				<img src="<?=_URL?>/image_list/signature.png" class="the_key" />

				'.( is_component('user_weblogin') ? user_weblogin_form() : '' ).'

			[!close!]

		');
		# -------------------------------------------------

	}

}




