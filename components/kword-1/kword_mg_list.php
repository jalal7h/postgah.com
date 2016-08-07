<?

# jalal7h@gmail.com
# 2016/05/13
# Version 1.0

function kword_mg_list(){

	switch ($_REQUEST['do']) {

		case 'fileSave':
			kword_mg_fileSave();
			break;

		case 'form':
			kword_mg_form();
			break;

		case 'saveNew':
			kword_mg_saveNew();
			break;

		case 'saveEdit':
			kword_mg_saveEdit();
			break;

		case 'removeSelected':
			if( sizeof($_REQUEST['kword_mg_list_checkbox']) ){
				foreach ($_REQUEST['kword_mg_list_checkbox'] as $k => $id) {
					listmaker_remove( 'kword' , $id );
				}
			}
			break;

		case 'remove':
			kword_mg_remove();
			break;
			
	}

	echo '<div class="'.__FUNCTION__.'_wrap">';

	###################################################################################
	# the new version 1.2

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['class'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `kword` WHERE 1 ORDER BY `id` DESC ";
	$list['tdd'] = 5; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['modify_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp'].'_form&id=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['remove_url'] = true; // link dokme hazf
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array("head"=>kword_mg_list_checkbox_head(), "content" => 'kword_mg_list_checkbox($rw)');
	$list['list_array'][] = array("head"=>lmtc("kword:kword"), "content" => '$rw[\'kword\']');

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("kword");

	#
	# echo result
	echo listmaker_list( $list );
	
	#
	########################################################################################

	#
	# remove button
	echo "<div id='".__FUNCTION__."_remove_selected'>حذف موارد انتخاب شده</div>";
	?>
	<script type="text/javascript">
		$('#listmaker_list_kword_mg_list_form').prop('action', './?page=admin&cp=<?=$_REQUEST['cp']?>&p=<?=$_REQUEST['p']?>&do=removeSelected');
	</script>
	<?

	#
	# new form
	kword_mg_form();


	echo '</div>';
}


function kword_mg_list_checkbox_head(){
	return "<input type=\"checkbox\" id=\"kword_mg_list_checkbox_head\" value=\"1\" />";
}


function kword_mg_list_checkbox( $rw ){
	return "<input type=\"checkbox\" name=\"kword_mg_list_checkbox[]\" value=\"".$rw['id']."\" />";
}



















