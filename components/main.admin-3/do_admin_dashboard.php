<?

function do_admin_dashboard(){

	echo '<div class="dashboard">';

	if( $func = $_REQUEST['cp'] ){
		
		if( $func=='cat_management' and $_REQUEST['l'] ){
			$global_switch_complex = true;
		
		} else if( $func=='linkify_mg' and $_REQUEST['l'] ){
			$global_switch_complex = true;
		
		} else if( array_key_exists( $func, $GLOBALS['cmp'] ) ) {
			$global_switch_complex = true;
		} else {
			$global_switch_complex = false;
		}

		if(! $global_switch_complex ){
			e(__FUNCTION__,__LINE__);

		} else if(! function_exists($func) ){
			e(__FUNCTION__,__LINE__);

		} else if( is_component('useraccess') and (! useraccess(admin_logged(), $func) ) ){
			echo "<div style='margin: 100px auto 0 auto; width: 80%; box-shadow: 0 0 30px #ddd;' class='convbox'>".__('دسترسی شما مجاز نیست !')."</div>";

		} else {
			$func();
		}
	
	} else {
		do_admin_widgets();
	}

	echo '</div>';

}




