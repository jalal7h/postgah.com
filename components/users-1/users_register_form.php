<?
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
	}

	echo lmfo([
		'table' => 'users@' ,
		'action'=>'./register_do' ,
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__.($_REQUEST['popup'] ?" popup" :'') ,
		'target'=>'_top' ,
	]);

	echo lmfe([
	
		'<div class="container">'.
			'<div class="d02">ثبت نام</div>'.
			'<div class="d05">اگر قبلآ ثبت نام کرده اید <a target="_top" href="./login">وارد شوید</a></div>',

			[ 'name:name*' ],
			[ 'number:cell' ],
			[ 'email:username*' ],
			[ 'password:password*' ],

			'<div class="d04">شما با کلیک کردن روی دکمه ثبت نام موافقت می کنید که تمامی <a target="_top" href="./terms">قوانین سایت</a> پذیرفته اید.</div>',
		
			[ 'submit:ثبت نام.bgSameAsBG' ],

		"</div>".
		"<img src=\""._URL."/image_list/signature.png\" class=\"the_key\" />\n",
		
		( is_component('user_weblogin') ? user_weblogin_form() : '' ) ,

	]);

	echo lmfc();

}




