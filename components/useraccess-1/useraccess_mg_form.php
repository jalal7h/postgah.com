<?

function useraccess_mg_form(){

	echo lmfo([
		'table' => 'user' ,
		'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp'].'_list',
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'switch' => 'do',
		'autocomplete' => 'off',
	]);

	#
	# var
	$user_id = intval($_REQUEST['id']);
	$access_list.= "<div class='left'>\n";
	foreach ($GLOBALS['cmp'] as $component_func => $component_name) {
		
		# 
		# flag
		if( $user_id ){
			$flag = dbn( dbq(" SELECT * FROM `useraccess` WHERE `user_id`='$user_id' AND `component`='$component_func' LIMIT 1 ") );
		}

		# 
		# access list
		$access_list.= "
		<label>
			<input type='checkbox' name='access_list[]' value='$component_func' ".($flag?'checked':'')." />
			".$component_name."
		</label>\n";

	}
	$access_list.= "</div>\n";

	echo lmfe([
		
		'<div class="right">',
			['text:name*','inDiv'],
			['email:username*','inDiv'],
			['text:management_title*','inDiv'],
			( $user_id ? ['password:password','inDiv'] : ['password:password*','inDiv'] ),
			['text:cell.numeric','inDiv'],
		'</div>',
		
		$access_list ,

		"<hr>",
		
		['submit:'.__('ثبت'),'inDiv'],

	]);

	echo lmfc();

	if( $user_id ){
		?>
		<script>
			jQuery(document).ready(function($) {
				$('#lmfe_useraccess_mg_form_username').prop('disabled',true);
			});
			setTimeout( function(){
				$('.useraccess_mg_form input[type="password"]').val('');			
			} , 100);
		</script>
		<?
	}

}









