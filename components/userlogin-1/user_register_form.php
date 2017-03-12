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
	# actions
	switch ($_REQUEST['do']) {
		case 'saveNew':
			if( user_register_do() ){
				return true;
			}
			break;
	}

	#
	# form
	if( is_component('userloginverify') and !userloginverify_check() ){
		return userloginverify();

	} else {

		if( is_component('userloginverify') ){
			if( $qpop = qpop('result_of_userloginverify_check') ){
				$qpop = explode( ':', $qpop );
				$qp_column = $qpop[0];
				$qp_value = $qpop[1];
				if(! in_array( $qp_column, ['email', 'cell'] ) ){
					ed();
				}
				$userloginverify_hidden = '[!"hidden:username"=>"'.$_REQUEST['username'].'"!]';
				$userloginverify_hidden.= '[!"hidden:hash"=>"'.$_REQUEST['hash'].'"!]';
				$userloginverify_hidden.= '[!"hidden:processed_hash"=>"'.str_enc( $qp_column.':'.md5x($qp_value,8) ).'"!]';

			} else {
				ed();
			}
		}

		# -------------------------------------------------
		echo listmaker_form('
			
			[!"table" => "user@" , "action" => "'.layout_link(58).'" , "mobile_login" => "'.(userlogin_username_mobile ? 1 : 0).'" !]

				<?=token_make()?>

				'.$userloginverify_hidden.'
				
				<div class="head">'.__('ثبت نام').'</div>
				<div class="register">'.
					__('اگر قبلآ ثبت نام کرده اید %%وارد شوید%%', ['<a target="_top" href="'.layout_link(60).'">','</a>'] ).'
				</div>
				
				[!"name:name*"=>$_REQUEST["name"],"prompt"=>qpop("user_register_form_name")!]
				[!"number:cell"=>$_REQUEST["cell"],"prompt"=>qpop("user_register_form_cell")!]

				[!"email:email'.( userlogin_username_mobile ? '/required=1' : '' ).'"=>$_REQUEST["email"],"prompt"=>qpop("user_register_form_email")!]
				[!"password:password*","prompt"=>qpop("user_register_form_password")!]

				<div class="terms">'.__('شما با کلیک کردن روی دکمه ثبت نام موافقت می کنید که تمامی %%قوانین سایت%% پذیرفته اید.',[ '<a target="_top" href="'.layout_link(6).'">','</a>' ] ).'</div>
				
			[!"submit:'.__('ثبت نام').'"!]

		');
		# -------------------------------------------------


		if( is_component('userloginverify') ){
			if( $qp_column ){
				?>
				<script>
					$('#lmfe_formee11cb_<?=$qp_column?>').val('<?=$qp_value?>').attr('readonly', '1');
				</script>
				<?
			}
		}

		if( is_component('userloginoauth') ){
			echo userloginoauth_form();
		}

	}

}




