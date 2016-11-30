<?

# jalal7h@gmail.com
# 2016/11/01
# 1.2

$GLOBALS['block_layers']['user_register_form'] = 'فرم ثبت نام';
$GLOBALS['do_action'][] = 'user_register_form';

function user_register_form(){
	
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
				"table" => "user@" ,
				"action" => "./register_do",
				"name" => "'.__FUNCTION__.'" ,
				"class" => "'.__FUNCTION__.($_REQUEST['popup'] ?" popup" :'').'" ,
				"target" => "_top" ,
			!]

				<?=token_make()?>
				
				'.( is_component('user_emailverifybeforesignup') ? user_emailverifybeforesignup_formHiddenInput() : '' ).'

				<div class="container">
					<div class="d02">'.__('ثبت نام').'</div>
					<div class="d05">'.
						__('اگر قبلآ ثبت نام کرده اید %%وارد شوید%%', ['<a target="_top" href="./login">','</a>'] ).'
					</div>
					
					[!"name:name*"!]
					[!"number:cell"!]

					'.( is_component('user_emailverifybeforesignup')
						? user_emailverifybeforesignup_formEmailInputTag()
						: '[!"email:username*"!]' ).'

					[!"password:password*"!]

					<div class="d04">'.__('شما با کلیک کردن روی دکمه ثبت نام موافقت می کنید که تمامی %%قوانین سایت%% پذیرفته اید.',[ '<a target="_top" href="<?=_URL?>/terms">','</a>' ] ).'</div>
					
					[!"submit:'.__('ثبت نام').'.bgSameAsBG"!]
	
				</div>
				<img src="<?=_URL?>/image_list/signature.png" class="the_key" />

				'.( is_component('user_weblogin') ? user_weblogin_form() : '' ).'

			[!close!]

		');
		# -------------------------------------------------

	}

}




