<?

$GLOBALS['userpanel_item'][ 95 ] = [ 'user_changepassword_form', 'تغییر رمز عبور', '13e' ];

function user_changepassword_form(){
	
	echo "<div class=".__FUNCTION__."_container >
		<div class=d01>".__('تغییر %%',[lmtc('user:password')])."</div>";

	switch( $_REQUEST['do2'] ){
		
		case 'save':
			return user_changepassword_save();

		default :
			echo "<form id=".__FUNCTION__." method=post action='./?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&do2=save' onsubmit='return checkform_uchform();' name=uchform >
			<input type='hidden' name='email' value='$email'>
			<input type='hidden' name='h' value='".$_REQUEST['h']."'>

					<div>
						<span>".__('کلمه عبور فعلی')."</span>
						<input type='password' name='old_password' />
					</div>
					
					<div>
						<span>".__('کلمه عبور جدید')."</span>
						<input type='password' id='password1' />
					</div>
					
					<div>
						<span>".__('تکرار کلمه عبور')."</span>
						<input type='password' id='password2' name='password' />
					</div>
					
					<div>
						<span></span>
						<input type='submit' class='submit_button' value='".__('تغییر کلمه عبور')."' />
					</div>
					
			</form>";
			?>
			<script>
			function checkform_uchform(){
				
				if( uchform.old_password.value=='' ){
					alert("<?=__('لطفا کلمه عبور قبلی را وارد کنید')?>");
				
				} else if( document.getElementById("password1").value == '' ){
					alert("<?=__('لطفا کلمه عبور جدید را وارد کنید.')?>");
				
				} else if( document.getElementById("password1").value!=document.getElementById("password2").value){
					alert("<?=__('کلمه عبور مطابقت ندارد!')?>");
				
				} else {
					return true;
				}

				return false;

			}
			</script>
			<?

	}

	echo "</div>";

}

