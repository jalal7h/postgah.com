<?

# jalal7h@gmail.com
# 2017/03/12
# 2.0

add_layer( 'user_register_form', 'فرم ثبت نام', 'center' );
add_action( 'user_register_form' );

function user_register_form(){
	
	#
	# return if already logged
	if( user_logged() ){
		jsgo( layout_link(14) );
	}

	#
	# form
	# agar niaz be verify e user hast, va hanuz verify nashode
	if( is_component('userregisterverify') and !userregisterverify_check() ){
		return userregisterverify();

	} else {


		if( is_component('userregisterverify') ){

			if( $qpop = qpop('result_of_userregisterverify_check') ){
				$qpop = explode( ':', $qpop );
				$qp_column = $qpop[0];
				$qp_value = $qpop[1];
				if(! in_array( $qp_column, ['email', 'cell'] ) ){
					ed();
				}
				$userregisterverify_hidden = '[!"hidden:username"=>"'.$_REQUEST['username'].'"!]';

			# age chizi push nashode, error bede
			} else {
				userregisterverify_retry( $_REQUEST['username'] );
			}

		}


		#
		# actions
		switch ($_REQUEST['do']) {
			case 'saveNew':
				# age sabtenam be dorosti anjam shode, bezan birun, age na form ro neshun bede
				# age doros anjam nashode, qpush kon moshkel ro, k tuye form 'prompt' beshe ruye element
				if( user_register_do() ){
					return true;
				}
				break;
		}


		# the form
		# -------------------------------------------------
		echo listmaker_form('
			
			[!"table" => "user@" , "action" => "'.layout_link(58).'" , "mobile_login" => "'.(userlogin_username_mobile ? 1 : 0).'" !]

				<?=token_make()?>

				'.$userregisterverify_hidden.'
				
				<div class="head">'.__('ثبت نام').'</div>
				<div class="register">'.
					__('اگر قبلآ ثبت نام کرده اید %%وارد شوید%%', ['<a target="_top" href="'.layout_link(60).'">','</a>'] ).'
				</div>
				
				[!"name:name*"=>$_REQUEST["name"],"prompt"=>qpop("user_register_form_name")!]
				[!"number:cell.placeholder_fix"=>$_REQUEST["cell"],"prompt"=>qpop("user_register_form_cell")!]

				[!"email:email.placeholder_fix'.( userlogin_username_mobile ? '/required=1' : '' ).'"=>$_REQUEST["email"],"prompt"=>qpop("user_register_form_email")!]
				[!"password:password.placeholder_fix*","prompt"=>qpop("user_register_form_password")!]

				<div class="terms">'.__('شما با کلیک کردن روی دکمه ثبت نام موافقت می کنید که تمامی %%قوانین سایت%% پذیرفته اید.',[ '<a target="_top" href="'.layout_link(6).'">','</a>' ] ).'</div>
				
			[!"submit:'.__('ثبت نام').'"!]

		');
		# -------------------------------------------------


		# age niaz be verify hast, sotun e username, readonly beshe
		if( is_component('userregisterverify') ){
			if( $qp_column ){
				?>
				<script>
					$('#lmfe_formee11cb_<?=$qp_column?>').val('<?=$qp_value?>').attr('readonly', '1');
				</script>
				<?
			}
		}


		# age oAuth faal hast, form esh load beshe
		if( is_component('userloginoauth') ){
			echo userloginoauth_form();
		}


	}

}




