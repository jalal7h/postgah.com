<?

# jalal7h@gmail.com
# 2017/01/09
# 1.4

add_layer( 'user_register_form', 'فرم ثبت نام', 'center' );
add_action( 'user_register_form' );

function user_register_form(){
	
	switch ($_REQUEST['do']) {
		case 'saveNew':
			return user_register_do();
	}


	if( user_logged() ){
		jsgo( layout_link(14) );
		
	} else if( is_component('user_emailverifybeforesignup') and !user_emailverifybeforesignup_check() ){
		return user_emailverifybeforesignup();

	} else {

		# -------------------------------------------------
		echo listmaker_form('
			
			[!
				"table" => "user@" ,
				"action" => "'.layout_link(58).'",
				"name" => "'.__FUNCTION__.'" ,
				"class" => "'.__FUNCTION__.($_REQUEST['popup'] ?" popup" :'').'" ,
				"target" => "_top" ,
			!]

				<?=token_make()?>
				
				'.( is_component('user_emailverifybeforesignup') ? user_emailverifybeforesignup_formHiddenInput() : '' ).'

				<div class="container">
					<div class="head">'.__('ثبت نام').'</div>
					<div class="register">'.
						__('اگر قبلآ ثبت نام کرده اید %%وارد شوید%%', ['<a target="_top" href="'.layout_link(60).'">','</a>'] ).'
					</div>
					
					[!"name:name*"!]
					[!"number:cell"!]

					'.( is_component('user_emailverifybeforesignup')
						? user_emailverifybeforesignup_formEmailInputTag()
						: '[!"email:username*"!]' ).'

					[!"password:password*"!]

					<div class="terms">'.__('شما با کلیک کردن روی دکمه ثبت نام موافقت می کنید که تمامی %%قوانین سایت%% پذیرفته اید.',[ '<a target="_top" href="'.layout_link(6).'">','</a>' ] ).'</div>
					
					[!"submit:'.__('ثبت نام').'"!]
				</div>
		');
		# -------------------------------------------------

		if( is_component('userloginoauth') ){
			echo userloginoauth_form();
		}

	}

}




