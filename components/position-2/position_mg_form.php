<?

# jalal7h@gmail.com
# 2016/10/09
# 1.0

function position_mg_form(){

	if(! $id = $_REQUEST['id'] ){
		dg();

	} else if(! $rw = table('position', $id) ){
		dg();
		
	} else {

		$parent_type = position_get_higher( $rw['type'] );

		?>
		<form class="<?=__FUNCTION__?>" method="post" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&func=position_mg_list&type=<?=$rw['type']?>&id=<?=$id?>&do=saveEdit">
			
			<input type="text" name="name" value="<?=$rw['name']?>" />
			
			<?
			# 
			# select box in new form
			if( $parent_type ){
				
				$list['paging_select'] = [ 'parent' => position_options($parent_type, $array=false) ];
				
				echo "<select name='parent' id='position_mg_list_new_parent'>";
				echo implode('',$list['paging_select']);
				echo "</select>";
				echo "<script>$('#position_mg_list_new_parent').val('".$rw['parent']."')</script>";
			
			} else {
				echo "<input type='hidden' name='parent' id='position_mg_list_new_parent' value='".$parent['default_value']."' />";
			}
			?>

			<hr>

			<input type="submit" class="btn btn-primary" value="<?=__('ثبت')?>"/>

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

