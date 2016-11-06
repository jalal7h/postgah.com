<?

function users_changepassword_form(){
	
	echo "<div class=".__FUNCTION__."_container >
		<div class=d01>".__('تغییر %%',[lmtc('users:password')])."</div>";

	switch( $_REQUEST['do2'] ){
		
		case 'save':
			return users_changepassword_save();

		default :
			echo "<form id=".__FUNCTION__." method=post action='./?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&do2=save' onsubmit='return checkform_uchform();' name=uchform >
			<input type='hidden' name='email' value='$email'>
			<input type='hidden' name='h' value='".$_REQUEST['h']."'>

					<div>
						<span>".__('%% فعلی',[lmtc('users:password')])."</span>
						<input placeholder='".__('Old password',[lmtc('users:password')] )."' type='password' name='old_password' />
					</div>
					
					<div>
						<span>".__('%% جدید',[lmtc('users:password')])."</span>
						<input placeholder='".__('New password',[lmtc('users:password')] )."' type='password' id='password1' />
					</div>
					
					<div>
						<span>".__('تکرار %%',[lmtc('users:password')])."</span>
						<input placeholder='".__('Repeat password',[lmtc('users:password')] )."' type='password' id='password2' name='password' />
					</div>
					
					<div>
						<span></span>
						<input type='submit' class='submit_button' value='".__('تغییر %%',[lmtc('users:password')])."' />
					</div>
					
			</form>";
			?>
			<script>
			function checkform_uchform(){
				
				if( uchform.old_password.value=='' ){
					alert("<?=__('لطفا %% قبلی را وارد کنید',[lmtc('users:password')])?>");
				
				} else if( document.getElementById("password1").value == '' ){
					alert("<?=__('لطفا %% جدید را وارد کنید.',[lmtc('users:password')])?>");
				
				} else if( document.getElementById("password1").value!=document.getElementById("password2").value){
					alert("<?=__('%% مطابقت ندارد!',[lmtc('users:password')])?>");
				
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

