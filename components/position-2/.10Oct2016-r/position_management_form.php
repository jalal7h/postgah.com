<?

function position_management_form(){

	$parent = position_management_getParent();

	if(! $id = $_REQUEST['id'] ){

	} else if(! $rw = table('position', $id) ){

	} else {
		?>
		<form class="<?=__FUNCTION__?>" method="post" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&func=position_management_list&type=<?=$rw['type']?>&id=<?=$id?>&do=saveEdit">
			
			<input type="text" name="name" value="<?=$rw['name']?>" />
			
			<?
			# 
			# select box in new form
			if( $parent['type'] ){
				
				$list['paging_select'] = [
					'parent' => position_options( $parent['type'] , 
					$array=false )];
				
				echo "<select name='parent' id='position_management_list_new_parent'>";
				echo implode('',$list['paging_select']);
				echo "</select>";
				echo "<script>$('#position_management_list_new_parent').val('".$rw['parent']."')</script>";
			
			} else {
				echo "<input type='hidden' name='parent' id='position_management_list_new_parent' value='".$parent['default_value']."' />";
			}
			?>

			<hr>

			<input type="submit" class="submit_button" value="ثبت"/>

		</form>

		<script type="text/javascript">
			$(document).ready(function($) {
				$('.listmaker_tabmenu > a[href*="<?=$_REQUEST['type']?>"]').first()
					.removeClass('listmaker_tabmenu_normal')
					.addClass('listmaker_tabmenu_current');
			});
		</script>
		<?
	}

}

